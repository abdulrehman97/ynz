<?php

/**
 * page.php
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 */
?>

<?php get_header(); ?>
	  <?php if(ot_get_option('groci_breadcrumb_type') == 'type2'){ ?>	
		  <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white klb-breadcrumb2">
	         <div class="container">
	            <div class="row">
	               <div class="col-md-12">
						<?php echo groci_breadcrubms(); ?>
	               </div>
	            </div>
	         </div>
	      </section>
	  <?php } else { ?>
	      <section class="section-padding bg-dark inner-header klb-breadcrumb">
	         <div class="container">
	            <div class="row">
	               <div class="col-md-12 text-center">
	                  <h1 class="mt-0 mb-3 text-white"><?php the_title(); ?></h1>
						 <?php echo groci_breadcrubms(); ?>
	               </div>
	            </div>
	         </div>
	      </section>
	  <?php } ?>

	<?php $content = ''; ?>
	<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
		  <?php $content .= get_the_content(); ?>
	<?php  endwhile; ?>
	<?php endif; ?> 
	
   <?php if ( class_exists( 'woocommerce' ) ) { ?>

   <?php if (is_cart()) { ?>
	<section class="cart-page section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php while(have_posts()) : the_post(); ?>
					<?php the_content (); ?>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
   <?php } elseif (is_checkout()) { ?>
	<section class="checkout-page section-padding">
		<div class="container">

				<?php while(have_posts()) : the_post(); ?>
					<?php the_content (); ?>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<?php endwhile; ?>

		</div>
	</section>
   <?php } elseif (is_account_page()) { ?>	
	<section class="account-page section-padding">
		<div class="container">

				<?php while(have_posts()) : the_post(); ?>
					<?php the_content (); ?>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<?php endwhile; ?>

		</div>
	</section>
   <?php } elseif( has_shortcode( $content, 'vc_row' )) { ?>
	  
		<?php while(have_posts()) : the_post(); ?>
			<?php the_content (); ?>
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
		<?php endwhile; ?>
		
	<?php } else { ?>
	<section class="section-padding ">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php while(have_posts()) : the_post(); ?>
					<div class="klb-post card mb-4">
						<div class="card-body">
							<?php the_content (); ?>
							<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						</div>
					</div>
				<?php endwhile; ?>
				
				<?php comments_template(); ?>    
				
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
	<?php } else { ?>
	<section class="section-padding ">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php while(have_posts()) : the_post(); ?>
					<div class="klb-post card mb-4">
						<div class="card-body">
							<?php the_content (); ?>
							<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						</div>
					</div>
				<?php endwhile; ?>
				
				<?php comments_template(); ?>    
				
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
<?php get_footer(); ?>