<?php
if (!defined('ABSPATH')) exit;
if (defined('ENV') && ENV == true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
require_once dirname(__FILE__) . '/Amazon/MarketplaceWebService/Samples/.config.inc.php';
include_once AMWSCPF_PATH . '/core/classes/invoker.php';

Class Amazon_Orders extends CPF_Amazon_Main
{

    private $marketplace_id;
    private $allowedMarketplace;
    private $from_date;
    public $aws_key;
    public $secret_key;
    public $mws_auth_token;

    public function __construct($country = null)
    {
        parent::__construct($country);
    }

    public function setupCredentials()
    {
        $defaultAccount = parent::get_default_account();
        if ($defaultAccount) {
            $this->marketplace_id = $defaultAccount->marketplace_id;
            $this->initialize($defaultAccount->id);
            $this->allowedMarketplace = maybe_unserialize($defaultAccount->allowed_markets);
            $this->aws_key = $defaultAccount->access_key_id;
            $this->secret_key = $defaultAccount->secret_key;
            $this->mws_auth_token = $defaultAccount->mws_auth_token;
            $this->from_date = $defaultAccount->last_ordered;
            return true;
        }
        return false;
    }

    public function getOrders($days)
    {
        if ($this->setupCredentials()) {
            $orders = $this->summonTheOrders($this->allowedMarketplace, $this->from_date, $days);
            if (is_array($orders) && count($orders) > 0) {
                if ($this->manageOrders($orders))
                    return true;
            }
            return false;
        } else {
            echo "Default account not set, please specify the default account first.";
            return false;
        }
    }

    public function manageOrders($orders = array())
    {
        foreach ($orders as $key => $order) {
            //$items = parent::list_items('028-5264648-0461164');
            $items = parent::list_items('$order->order_id');
            parent::saveOrder($order, maybe_serialize($items), $cron = false);
        }
        return true;
    }

    public function create_amazon_order()
    {
        if ($this->setupCredentials()) {
            global $wpdb;
            $table = $wpdb->prefix . "amwscp_orders";
            //$sql = $wpdb->prepare("SELECT * FROM $table WHERE order_id = %s", ['028-5264648-0461164']);
            $sql = $wpdb->prepare("SELECT * FROM $table WHERE sync_state = %s AND woo_order_created = %s", ['INCOMPLETE', '0']);
            $orders = $wpdb->get_results($sql);
            if (count($orders) > 0) {
                foreach ($orders as $key => $order) {
                    $checkifOrderExists = $this->checkWoocommerceOrderById($order->post_id);
                    if ($order->woo_order_created == 0 && $checkifOrderExists == false) {
                        $post_id = $this->createWooOrder($order);
                        if ($post_id) {
                            $data = ['sync_state' => 'COMPLETED', 'post_id' => $post_id, 'woo_order_created' => '1'];
                            $wpdb->update($table, $data, ['id' => $order->id]);
                        }
                    } else {
                        $wooOrder = $this->deleteItemsForUpdate($order->post_id);
                        if ($wooOrder) {
                            $this->UpdateWooOrder($wooOrder, $order);
                        } else {
                            return false;
                        }
                    }
                }
                return true;
            }
            return false;
        }
        return false;
    }

    public function deleteItemsForUpdate($oid)
    {
        $order = wc_get_order($oid);
        if ($order) {
            $items = $order->get_items();
            foreach ($items as $key => $product) {
                $item_id = $key;
                try {
                    wc_delete_order_item($item_id);
                } catch (Exception $e) {
                    error_log(json_encode($e));
                }
            }
            return $order;
        }
        return false;
    }

    public function UpdateWooOrder($ord, $orders)
    {
        global $woocommerce;
        $order_detail = maybe_unserialize($orders->data);
        $billingAddress = parent::getBillingAddress($order_detail);
        $shippingAddress = parent::getShippingAddress($order_detail);
        $order_status = $order_detail->OrderStatus;
        if (!($order_status = get_option('amwscp_' . str_replace(' ', '_', $order_status)))) {
            if (!($order_status = get_option('amwscp_universal_status'))) {
                $order_status = $order_detail->OrderStatus;
            }
        }
        $items = maybe_unserialize($orders->items);
        if (empty($items)) {
            $items = $this->getAmazonOrderById($orders->order_id);
            parent::updateOrder($orders->order_id, maybe_serialize($items));
        }
        if (is_array($items) && count($items) > 0) {
            $atleastoneProduct = false;
            $ord_id = $ord->get_id();
            foreach ($items as $key => $item) {
                $wooProductId = parent::getItemBySKU($item->SellerSKU);
                if ($wooProductId) {
                    $atleastoneProduct = true;
                    try {
                        $product = wc_get_product($wooProductId);
                        $ord->add_product($product, $item->QuantityOrdered);
                    } catch (WC_Data_Exception $exception) {
                        error_log(json_encode($exception));
                        continue;
                    }

                    if (isset($item->ShippingPrice->Amount)) {

                        if (count($ord->get_items('shipping')) <= 0) {
                            if (class_exists('WC_Order_Item_Shipping')) {
                                $vat = get_option('amwscp_custom_vat_amount') ? get_option('amwscp_custom_vat_amount') : 20;
                                $shipping = new WC_Order_Item_Shipping();

                                /**
                                 * Handeling WC_Data_Exception
                                 * */
                                try {
                                    $shipping->set_method_title("Amazon shipping rate");
                                    $shipping->set_method_id("amazon_flat_rate:77"); // set an existing Shipping method rate ID

                                    /**
                                     * $shipping->set_total($item->ShippingPrice->Amount); // (optional)
                                     * $shipping->set_taxes(['total' => [0]]);
                                     * $shipping->set_total_tax(0);
                                     */

                                    $shipping->set_total($this->getShippingValueWithoutVat($item->ShippingPrice->Amount, $vat));
                                } catch (WC_Data_Exception $exception) {
                                    error_log(json_encode($exception));
                                }

                                //$item->calculate_taxes($calculate_tax_for);
                                $ord->add_item($shipping);
                                $ord->calculate_totals();
                            }
                        }
                    }
                } else {
                    if ($atleastoneProduct === true) {
                        $ord->set_address($shippingAddress, 'shipping');
                        $ord->set_address($billingAddress, 'billing');
                        $ord->update_status($order_status);
                    } else {
                        wp_delete_post($ord_id, true);
                    }
                }
            }

            if ($atleastoneProduct === true) {
                $ord->set_address($shippingAddress, 'shipping');
                $ord->set_address($billingAddress, 'billing');
                $ord->update_status($order_status);
                $ord->save();
                return $ord_id;
            }
        }
    }

    public function createWooOrder($amazonOrder)
    {
        global $woocommerce;
        $order_detail = maybe_unserialize($amazonOrder->data);
        $billingAddress = parent::getBillingAddress($order_detail);
        $shippingAddress = parent::getShippingAddress($order_detail);
        $order_status = $order_detail->OrderStatus;
        if (!($order_status = get_option('amwscp_' . str_replace(' ', '_', $order_status)))) {
            if (!($order_status = get_option('amwscp_universal_status'))) {
                $order_status = $order_detail->OrderStatus;
            }
        }
        $items = maybe_unserialize($amazonOrder->items);
        if (empty($items)) {
            $items = $this->getAmazonOrderById($amazonOrder->order_id);
            /*$amazonOrder->AmazonOrderId = $amazonOrder->order_id;
            $amazonOrder->PurchaseDate = $amazonOrder->date_created;
            $amazonOrder->OrderStatus = $amazonOrder->status;*/
            parent::updateOrder($amazonOrder->order_id, maybe_serialize($items));
        }

        if (is_array($items) && count($items) > 0) {
            $atleastoneProduct = false;
            $ord = wc_create_order();
            $ord_id = $ord->get_id();
            foreach ($items as $key => $item) {
                $wooProductId = parent::getItemBySKU($item->SellerSKU);
                if ($wooProductId) {
                    $atleastoneProduct = true;
                    try {
                        $product = wc_get_product($wooProductId);
                        $ord->add_product($product, $item->QuantityOrdered);
                    } catch (WC_Data_Exception $exception) {
                        error_log(json_encode($exception));
                        continue;
                    }

                    if (isset($item->ShippingPrice->Amount)) {

                        if (count($ord->get_items('shipping')) <= 0) {
                            if (class_exists('WC_Order_Item_Shipping')) {
                                $vat = get_option('amwscp_custom_vat_amount') ? get_option('amwscp_custom_vat_amount') : 20;
                                $shipping = new WC_Order_Item_Shipping();

                                /**
                                 * Handeling WC_Data_Exception
                                 * */
                                try {
                                    $shipping->set_method_title("Amazon shipping rate");
                                    $shipping->set_method_id("amazon_flat_rate:77"); // set an existing Shipping method rate ID

                                    /**
                                     * $shipping->set_total($item->ShippingPrice->Amount); // (optional)
                                     * $shipping->set_taxes(['total' => [0]]);
                                     * $shipping->set_total_tax(0);
                                     */

                                    $shipping->set_total($this->getShippingValueWithoutVat($item->ShippingPrice->Amount, $vat));
                                } catch (WC_Data_Exception $exception) {
                                    error_log(json_encode($exception));
                                }

                                //$item->calculate_taxes($calculate_tax_for);
                                $ord->add_item($shipping);
                                $ord->calculate_totals();
                            }
                        }
                    }
                } else {

                    if ($atleastoneProduct === true) {
                        $ord->set_address($shippingAddress, 'shipping');
                        $ord->set_address($billingAddress, 'billing');
                        $ord->update_status($order_status);
                    } else {
                        wp_delete_post($ord_id, true);
                    }

                }
            }

            return true;
        }

        return false;
    }

    public function updateAmazonOrder()
    {
        $incompleteOrders = parent::getIncompleteOrderData();
        if (is_array($incompleteOrders) && count($incompleteOrders) > 0) {
            foreach ($incompleteOrders as $key => $incompleteOrder) {
                $wooOrder = $this->deleteItemsForUpdate($incompleteOrder->post_id);
                if ($wooOrder) {
                    parent::updateOrderData($incompleteOrder->order_id, parent::getRecentOrderStatus($incompleteOrder->id));
                    return $this->UpdateWooOrder($wooOrder, $incompleteOrder);
                } else {
                    return false;
                }
            }
        }
    }

    public function getAmazonOrderById($aoi)
    {
        $items = parent::list_items($aoi);
        return $items;
    }
}
