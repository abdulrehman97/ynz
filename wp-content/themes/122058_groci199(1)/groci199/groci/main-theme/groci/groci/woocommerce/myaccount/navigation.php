<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>
<div class="row">
	<div class="col-lg-9 mx-auto">
		<div class="row no-gutters"> <!-- the row will be closed in myaccount.php -->

			<div class="col-md-4">
				<div class="card account-left">
					<div class="user-profile-header">
						<?php
							$author_bio_avatar_size = apply_filters( 'act_author_bio_avatar_size', 100 );
							echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
						<?php $current_user = wp_get_current_user(); ?>
						<h5 class="mb-1 text-secondary"><strong><?php esc_html_e('Hi','groci'); ?> </strong> <?php echo esc_html($current_user->user_firstname).' '. esc_html($current_user->user_lastname); ?></h5>
					</div>
					<div class="list-group">
						<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
							<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>  list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-account-outline"></i>  <?php echo esc_html( $label ); ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
					 

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
