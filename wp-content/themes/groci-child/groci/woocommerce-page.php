<?php

/**
 * woocommerce-page.php
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 * 
 */

?>

<?php get_header(); ?>

	  <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
					<?php woocommerce_breadcrumb(); ?>
               </div>
            </div>
         </div>
      </section>


		<?php if( ot_get_option( 'woocommerce_shop_layout' ) == 'left-sidebar') { ?>
			<section class="shop-list section-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
								 <?php dynamic_sidebar( 'shop-sidebar' ); ?>
							<?php } ?> 
						</div>
						<div class="col-md-9">
							<?php if(ot_get_option('groci_shop_banner')){ ?>
						    <a href="<?php echo esc_url(ot_get_option('groci_banner_url')); ?>"><img class="img-fluid mb-3" src="<?php echo esc_url(ot_get_option('groci_shop_banner')); ?>" alt="<?php esc_attr_e('shopbanner','groci'); ?>"></a>
							<?php } ?>
							<?php woocommerce_content(); ?>
						</div>
					</div>
				</div>
			</section>
		<?php } elseif( ot_get_option( 'woocommerce_shop_layout' ) == 'right-sidebar') { ?>
			<section class="shop-list section-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<?php if(ot_get_option('groci_shop_banner')){ ?>
						    <a href="<?php echo esc_url(ot_get_option('groci_banner_url')); ?>"><img class="img-fluid mb-3" src="<?php echo esc_url(ot_get_option('groci_shop_banner')); ?>" alt="<?php esc_attr_e('shopbanner','groci'); ?>"></a>
							<?php } ?>
							<?php woocommerce_content(); ?>
						</div>
					
						<div class="col-md-3">
							<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
								 <?php dynamic_sidebar( 'shop-sidebar' ); ?>
							<?php } ?> 
						</div>
					</div>
				</div>
			</section>
		<?php } else { ?>
			<section class="shop-list section-padding">
				<div class="container">
					<div class="row">						
						<div class="col-md-12">
							<?php if(ot_get_option('groci_shop_banner')){ ?>
						    <a href="<?php echo esc_url(ot_get_option('groci_banner_url')); ?>"><img class="img-fluid mb-3" src="<?php echo esc_url(ot_get_option('groci_shop_banner')); ?>" alt="<?php esc_attr_e('shopbanner','groci'); ?>"></a>
							<?php } ?>
							<?php woocommerce_content(); ?>
						</div>
					</div>
				</div>
			</section>
		<?php } ?>
<?php get_footer(); ?>