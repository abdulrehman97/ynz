<?php
/**
 * woocommerce-single.php
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
	  
	<section class="shop-single section-padding pt-3">
		<div class="container">
			<div class="row">
				<?php woocommerce_content(); ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>