<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 * 
 */
 ?>		
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )|| is_active_sidebar( 'footer-5' )) { ?>
		<section class="section-padding footer bg-white border-top">
			<div class="container">
				<div class="row">

					<?php if(ot_get_option('groci_footer_columns') == '3-columns'){ ?>
						<div class="col-md-4">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						<div class="col-md-4">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						<div class="col-md-4">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					<?php } elseif(ot_get_option('groci_footer_columns') == '4-columns'){ ?>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
					<?php } else { ?>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						<div class="col-md-2">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						<div class="col-md-2">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
						<div class="col-md-2">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-5' ); ?>
						</div>
					<?php } ?>

				</div>
			</div>
		</section>
	<?php } ?>
	
	<section class="pt-4 pb-4 footer-bottom">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-6 col-sm-6">
					<p class="mt-1 mb-0 klbcopyright">
						<?php if(ot_get_option( 'groci_copyright' )){ ?>
							<?php echo groci_sanitize_data(ot_get_option( 'groci_copyright' )); ?>
						<?php } else { ?>
							<?php esc_html_e('Copyright 2020.KlbTheme . All rights reserved','groci'); ?>
						<?php } ?>
					</p>
				</div>
				<div class="col-lg-6 col-sm-6 text-right">
					<?php if(ot_get_option('groci_payment_image')){ ?>
						<img alt="<?php esc_attr_e('payment-image','groci'); ?>" src="<?php echo esc_url(ot_get_option('groci_payment_image')); ?>">
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	  
	<?php if(ot_get_option('groci_middle_header_cart') == 'on') { ?>
		<?php get_template_part('includes/cart_content_modal'); ?> 
	<?php } ?>

	<?php wp_footer(); ?>
   </body>
</html>