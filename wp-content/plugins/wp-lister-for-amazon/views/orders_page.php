<?php include_once( dirname(__FILE__).'/common_header.php' ); ?>

<style type="text/css">

	th.column-details {
		width: 25%;
	}

</style>

<div class="wrap">
	<div class="icon32" style="background: url(<?php echo $wpl_plugin_url; ?>img/amazon-32x32.png) no-repeat;" id="wpl-icon"><br /></div>
	<h2>Amazon <?php echo __( 'Orders', 'wp-lister-for-amazon' ) ?></h2>
	<?php echo $wpl_message ?>


	<!-- show profiles table -->
	<?php $wpl_ordersTable->views(); ?>
    <!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
    <form id="profiles-filter" method="post" action="<?php echo $wpl_form_action; ?>" >
        <!-- For plugins, we also need to ensure that the form posts back to our current page -->
        <input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ) ?>" />
        <input type="hidden" name="order_status" value="<?php echo isset($_REQUEST['order_status']) ? esc_attr($_REQUEST['order_status']) : ''; ?>" />
        <input type="hidden" name="has_wc_order" value="<?php echo isset($_REQUEST['has_wc_order']) ? esc_attr($_REQUEST['has_wc_order']) : ''; ?>" />
        <!-- Now we can render the completed list table -->
		<?php $wpl_ordersTable->search_box( __( 'Search', 'wp-lister-for-amazon' ), 'order-search-input' ); ?>
        <?php $wpl_ordersTable->display() ?>
    </form>

	<br style="clear:both;"/>

	<p>
	<?php if ( get_option('wpla_cron_last_run') ) : ?>
		<?php echo __( 'Last run', 'wp-lister-for-amazon' ); ?>: 
		<?php echo human_time_diff( get_option('wpla_cron_last_run'), current_time('timestamp',1) ) ?> ago &ndash;
	<?php endif; ?>

	<?php if ( wp_next_scheduled( 'wpla_update_schedule' ) ) : ?>
		<?php echo __( 'Next scheduled update', 'wp-lister-for-amazon' ); ?>: 
		<?php echo human_time_diff( wp_next_scheduled( 'wpla_update_schedule' ), current_time('timestamp',1) ) ?>
		<?php echo wp_next_scheduled( 'wpla_update_schedule' ) < current_time('timestamp',1) ? 'ago' : '' ?>
	<?php elseif ( get_option('wpla_cron_schedule') == 'external' ) : ?>
		<?php echo __( 'Background updates are executed by an external cron job.', 'wp-lister-for-amazon' ); ?>
	<?php else: ?>
		<?php echo __( 'Automatic background updates are currently disabled.', 'wp-lister-for-amazon' ); ?>
	<?php endif; ?>
	</p>


	<form method="post" action="<?php echo $wpl_form_action; ?>">
		<div class="submit" style="padding-top: 0; float: left;">
			<?php wp_nonce_field( 'wpla_update_orders' ); ?>
			<input type="hidden" name="action" value="update_amazon_orders" />
			<input type="submit" value="<?php echo __( 'Update orders', 'wp-lister-for-amazon' ) ?>" name="submit" class="button-secondary"
				   title="<?php echo __( 'Update recent orders from Amazon.', 'wp-lister-for-amazon' ) ?>">
			&nbsp; <a href="#" onclick="jQuery('#wpla_advanced_order_options').toggle();return false;" class="button"><?php echo __( 'Options', 'wp-lister-for-amazon' ) ?></a>
		</p>

		<div id="wpla_advanced_order_options" class="submit" style="display:none; padding-top: 0; float:left; clear:both">
			<label for="wpla_number_of_days" class="text_label"><?php echo __( 'Update timespan', 'wp-lister-for-amazon' ); ?></label>
			<select name="days" id="wpla_number_of_days" 
					class="required-entry select" style="width:auto;"
					>
				<option value=""   ><?php echo __( '-- since last updated order --', 'wp-lister-for-amazon' ); ?></option>
				<option value="1"  >1  <?php echo __( 'day', 'wp-lister-for-amazon' ); ?></option>
				<option value="2"  >2  <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="3"  >3  <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="5"  >5  <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="7"  >7  <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="10" >10 <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="14" >14 <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="28" >28 <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="60" >60 <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="90" >90 <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="180">180 <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
				<option value="365">365 <?php echo __( 'days', 'wp-lister-for-amazon' ); ?></option>
			</select>
		</div>
	</form>


</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // Prevent double-clicking on the Create Order link
        $("a.wpla_link").click(function (event) {
            if ($(this).hasClass("disabled")) {
                event.preventDefault();
            }
            $(this).addClass("disabled");
        });
    });
</script>