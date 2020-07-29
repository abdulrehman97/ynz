<?php
if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

/**
 * Plugin Name: ExportFeed: WooCommerce data feed for Amazon Marketplace
 * Plugin URI: www.exportfeed.com
 * Description: Create Amazon feeds for WooCommerce Product Feed Export :: <a target="_blank" href="http://www.exportfeed.com/tos/">How-To Click Here</a>
 * Author: ExportFeed.com
 * Version:  3.1.1.0
 * Author URI: www.exportfeed.com
 * License:  GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: exportfeed-amazonmws-feeds
 * Authors: roshanbh, sabinthapa8
 *
 * WC requires at least: 3.0.0
 * WC tested up to: 5.4
 *
 * Note: The "core" folder is shared to the Joomla component.
 * Changes to the core, especially /core/data, should be considered carefully
 * license GNU General Public License version 3 or later; see GPLv3.txt
 */

require_once ABSPATH . '/wp-admin/includes/plugin.php';
$plugin_version_data = get_plugin_data(__FILE__);
//current version: used to show version throughout plugin pages
define('AMWSCPF_VERSION', $plugin_version_data['Version']);
define('AMWSCPF_BASENAME', plugin_basename(__FILE__)); // exportfeed-woocommerce-data-feed-for-amazon-marketplace/exportfeed-to-woocommerce-data-feed-for-amazon-marketplace.php
define('AMWSCPF_PATH', realpath(dirname(__FILE__)));
define('AMWSCPF_URL', plugins_url() . '/' . basename(dirname(__FILE__)) . '/');

//functions to display cart-product-feed version and checks for updates
include_once 'amwscpf-information.php';
require_once 'amwscpf-setup.php';

//action hook for plugin activation
register_activation_hook(__FILE__, 'amwscpf_activate_plugin');
register_deactivation_hook(__FILE__, 'amwscpf_deactivate_plugin');
add_action('amwscp_plugins_loaded', 'amwscpf_activate_plugin');
$AMWSCP_DBVERSION = get_option('AMWSCP_DBVERSION');

if ($AMWSCP_DBVERSION !== AMWSCPF_VERSION) {
    do_action('amwscp_plugins_loaded');
    update_option('AMWSCP_DBVERSION', AMWSCPF_VERSION);
}

global $cp_feed_order, $cp_feed_order_reverse;

require_once 'core/classes/amazon_cron.php';
require_once 'core/crons/autoupload.php';
require_once 'core/data/feedfolders.php';
require_once 'amwscpf-order-cron.php';
require_once 'core/classes/amazon_cron_v_2.php';

if (get_option('amwscpf_feed_order_reverse') == '') {
    add_option('amwscpf_feed_order_reverse', false);
}

if (get_option('amwscpf_feed_order') == '') {
    add_option('amwscpf_feed_order', "id");
}

if (get_option('amwscpf_feed_delay') == '') {
    add_option('amwscpf_feed_delay', "43200");
}

if (get_option('amwscpf_licensekey') == '') {
    add_option('amwscpf_licensekey', "none");
}

if (get_option('amwscpf_localkey') == '') {
    add_option('amwscpf_localkey', "none");
}

if (get_option('amwscpf_interval_switch') == '') {
    add_option('amwscpf_interval_switch', false);
}

//***********************************************************
// cron schedules for Feed Updates
//***********************************************************
$switch = get_option('amwscpf_interval_switch');
if ($switch) {
    AMWSCPF_Cron::doSetup();
    AMWSCPF_Cron::scheduleUpdate();
}

/*AMWSCPF_Order_Cron::doSetup();
AMWSCPF_Order_Cron::scheduleUpdate();*/

$cronInvoker = new AMWSCP_Cron_Custom();
$cronInvoker->scheduleOrderFetchEveryFiveMinute();
$cronInvoker->scheduleOrderUpdateEveryFiveMinute();

/*AMWSCPF_Order_Cron::scheduleOrderFetchEveryFiveMinute();
AMWSCPF_Order_Cron::scheduleOrderUpdateEveryFiveMinute();*/

function auto_loader_submission()
{
    $autouploader = new Autouploader();
    if ($autouploader->feedCreater())
        $autouploader->submit();
}

add_action('amwscpf_order_import_hook', 'amwscpf_import_all_order');
add_action('amwscpf_order_import_five_min_hook', 'amwscpf_import_orders');
add_action('amwscpf_order_update_five_min_hook', 'amwscpf_update_orders');

if (class_exists('AMWSCPF_Reports_Cron')) {
    AMWSCPF_Reports_Cron::doSetupReports();
    AMWSCPF_Reports_Cron::scheduleUpdateReports();
    add_action('amwscpf_report_fetch_hook', 'fetch_all_reports');
}

$croninvoker  = new AMWSCP_ListingLoader_Cron();
$croninvoker->amwscpListingLoader();
add_filter('amwscp_listing_loader_update', 'auto_loader_submission');

//***********************************************************
// Update Feeds (Cron)
//   2014-05-09 Changed to now update all feeds... not just Google Feeds
//***********************************************************

add_action('amwscpf_update_feeds_hook', 'amwscpf_update_all_feeds');

function amwscpf_update_all_feeds($doRegCheck = true)
{
    require_once 'amwscpf-wpincludes.php'; //The rest of the required-files moved here
    require_once 'core/data/savedfeed.php';

    $amazon = new CPF_Amazon_Main();
    $amazon->importOrders($days = 1, $cron = true);

    $reg = new AMWSCPF_License();
    if ($doRegCheck && ($reg->results["status"] != "Active")) {
        return;
    }

    do_action('amwscpf_load_feed_modifier');
    add_action('amwscpf_feed_main_hook', 'amwscpf_update_feeds_step_2');
    do_action('amwscpf_feed_main_hook');
}

function amwscpf_update_feeds_step_2()
{
    global $wpdb;
    $feed_table = $wpdb->prefix . 'amwscp_feeds';
    $sql = 'SELECT id, type, filename FROM ' . $feed_table;
    $feed_ids = $wpdb->get_results($sql);
    $savedProductList = null;

    //***********************************************************
    //Build stack of aggregate providers
    //***********************************************************
    $aggregateProviders = array();

    /*
                     *
                     * @info : not needed in amazon plugin

                    foreach ($feed_ids as $this_feed_id) {

                        if ($this_feed_id->type == 'AggXml' || $this_feed_id->type == 'AggXmlGoogle' || $this_feed_id->type == 'AggCsv' || $this_feed_id->type == 'AggTxt') {
                            $providerName = $this_feed_id->type;
                            $providerFile = 'core/feeds/' . strtolower($providerName) . '/feed.php';
                            if (!file_exists(dirname(__FILE__) . '/' . $providerFile)) {
                                continue;
                            }

                            require_once $providerFile;

                            //Initialize provider data
                            $providerClass = 'AMWSCP_P' . $providerName . 'Feed';
                            $x             = new $providerClass(null);
                            $x->initializeAggregateFeed($this_feed_id->id, $this_feed_id->filename);
                            $aggregateProviders[] = $x;
                        }
                        ;
                    }

    */

    //***********************************************************
    //Main
    //***********************************************************
    foreach ($feed_ids as $index => $this_feed_id) {

        $saved_feed = new AMWSCPF_SavedFeed($this_feed_id->id);

        $providerName = $saved_feed->provider;

        //Skip any Aggregate Types
        if ($providerName == 'AggXml' || $providerName == 'AggXmlGoogle' || $providerName == 'AggCsv' || $providerName == 'AggTxt') {
            continue;
        }

        //Make sure someone exists in the core who can provide the feed
        $providerFile = 'core/feeds/' . strtolower($providerName) . '/feed.php';
        if (!file_exists(dirname(__FILE__) . '/' . $providerFile)) {
            continue;
        }

        require_once $providerFile;

        //Initialize provider data
        $providerClass = 'AMWSCP_P' . $providerName . 'Feed';
        $x = new $providerClass();
        $x->aggregateProviders = $aggregateProviders;
        $x->savedFeedID = $saved_feed->id;

        $x->productList = $savedProductList;
        $x->getFeedData($saved_feed->category_id, $saved_feed->remote_category, $saved_feed->filename, $saved_feed, $saved_feed->amazon_category, $saved_feed->remote_category,$saved_feed->variation_theme,$saved_feed->feed_product_type,$saved_feed->recommended_browse_nodes,$saved_feed->item_type_keyword);

        $savedProductList = $x->productList;
        $x->products = null;

    }

    foreach ($aggregateProviders as $thisAggregateProvider) {
        $thisAggregateProvider->finalizeAggregateFeed();
    }

    // submitting listing loader feed to amazon
    add_action('amwscpf_listing_loader_submit', 'amwscpf_amazon_update_by_listing_loader');
    do_action('amwscpf_listing_loader_submit');
}

function amwscpf_amazon_update_by_listing_loader()
{
    require_once 'core/classes/amazon_main.php';
    require_once 'core/classes/invoker.php';
    set_include_path(dirname(__FILE__) . '/core/classes/Amazon/');
    global $wpdb;

    $amazon = new CPF_Amazon_Main();

    $feedType = '_POST_FLAT_FILE_LISTINGS_DATA_';
    $type = 'auto_update';
    require_once 'MarketplaceWebService/Model/SubmitFeedRequest.php';
    $table = $wpdb->prefix . "amwscp_feeds";
    $feeds = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE remote_category = %s", ['listingloader']));
    foreach ($feeds as $key => $feed) {
        /*
         * @ INFO : Commented as it was not needed for now. May need in coming days.

         *if ($feed->previous_product_count >= $feed->product_count) {

        */
        $id = $feed->id;
        $credential_id = get_option('amwscpf_feed_id_' . $feed->id . '_credential');
        if (empty($credential_id)) {
            $credential = $amazon->get_default_account();
            $credential_id = $credential->id;
        }
        $savedFeed = $feed->url;
        $feed_content = file_get_contents($savedFeed);
        $amazon->initialize($credential_id);
        $service = $amazon->submitService();
        $feedhandle = @fopen('php://temp', 'rw+');
        fwrite($feedhandle, $feed_content);
        rewind($feedhandle);
        $request = new MarketplaceWebService_Model_SubmitFeedRequest(NULL);
        $request->setMerchant($amazon->seller_key);
        $request->setMarketplaceIdList($amazon->marketplace_key);
        if ($amazon->mws_auth_token) {
            $request->setMWSAuthToken($amazon->mws_auth_token);
        }
        $request->setFeedType($feedType);
        $request->setFeedContent($feedhandle);
        $request->setPurgeAndReplace(false);
        $request->setContentMd5(base64_encode(md5(stream_get_contents($feedhandle), true)));
        $invoker = new CPF_Invoker();
        $submit = $invoker->invokeSubmitFeed($service, $request);
        // saving the feed report
        $table = $wpdb->prefix . "amwscp_amazon_feeds";
        if ($submit->success) {
            $data = [
                'FeedSubmissionId' => $submit->FeedSubmissionId,
                // 'FeedProcessingStatus' => $submit->FeedProcessingStatus,
                'FeedType' => $submit->FeedType,
                'SubmittedDate' => $submit->SubmittedDate,
                'Status' => $submit->success,
                'type_id' => $id,
                'type' => $type,
                'account_id' => $credential_id,
                'feed_title' => $feed->filename,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $qry = $wpdb->prepare("SELECT * FROM `$table` WHERE feed_title = %s", array($feed->filename));
            $result = $wpdb->get_results($qry);
            if (is_array($result) && count($result) > 1) {
                $wpdb->query("DELETE FROM $table WHERE id NOT IN ( SELECT * FROM ( SELECT MAX(id) FROM $table GROUP BY feed_title ) temp )");
                $result = $wpdb->get_row($qry);
            } else {
                $result = $wpdb->get_row($qry);
            }
            $update = null;
            $insert = null;
            if (is_object($result) && !empty($result)) {
                $update = $wpdb->update($table, $data, array('feed_title' => $feed->filename));
            } else {
                $insert = $wpdb->insert($table, $data);
            }

            if ($insert || $update) {
                $table = $wpdb->prefix . "amwscp_feeds";
                $update = $wpdb->update($table, ['submitted' => 1], ['id' => $id]);
            }
        } /*end of if for submit success*/

        /*  } end of product count if   */

    } /*end of foreach*/
}

//***********************************************************
// Links From the Install Plugins Page (WordPress)
//***********************************************************

if (is_admin()) {

    require_once 'amwscpf-admin.php';
    $plugin = plugin_basename(__FILE__);
    add_filter("plugin_action_links_" . $plugin, 'amwscpf_manage_feeds_link');
//    add_action('init','amwscpf_order_status_unshipped');

}

// will be used in new version
/*function amwscpf_order_status_unshipped(){
register_post_status('wc-invoiced',[
'label'     => _x('Unshipped','Order Status', 'woocommerce'),
'public'    => true,
'exclude_from_search'=> false,
'show_in_admin_all_list'=> false,
'show_in_admin_status_list'=>false,
'label_count'   =>_n_noop( 'Unshipped <span class="count">(%s)</span>', 'Unshipped<span class="count">(%s)</span>', 'woocommerce' )
]);
}
add_filter( 'wc_order_statuses', 'my_new_wc_order_statuses' );
// Register in wc_order_statuses.
function my_new_wc_order_statuses( $order_statuses ) {
$order_statuses['wc-invoiced'] = _x( 'Unshipped', 'Order status', 'woocommerce' );

return $order_statuses;
}*/

function amwscpf_import_all_order()
{
    require_once 'amwscpf-wpincludes.php'; //The rest of the required-files moved here
    $amazon = new CPF_Amazon_Main();
    $amazon->importOrders($days = 1, $cron = true);
}

function amwscpf_import_orders()
{
    require_once 'amwscpf-wpincludes.php'; //The rest of the required-files moved here
    $amazon = new Amazon_Orders();
    // $amazon->getOrders($days = 45);
    $amazon->getOrders($days = 1);
}

function amwscpf_update_orders()
{
    require_once 'amwscpf-wpincludes.php'; //The rest of the required-files moved here
    $amazon = new Amazon_Orders();
    $amazon->updateAmazonOrder();
}



//***********************************************************
//Function to create feed generation link  in installed plugin page
//***********************************************************
function amwscpf_manage_feeds_link($links)
{

    $settings_link = '<a href="admin.php?page=exportfeed-amazon-amwscpf-manage-page">Manage Feeds</a>';
    array_unshift($links, $settings_link);
    return $links;

}
