<?php
/**
 * single.php
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 * 
 */
 ?>

<?php get_header(); ?>

<section class="blog-page section-padding">
	<div class="container">
		<div class="row">
			<?php if( ot_get_option( 'layout_set' ) == 'left-sidebar') { ?>
				<div class="col-md-4">
					<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					<?php } ?>
				</div>

				<div class="col-md-8">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php  get_template_part( 'post-format/single', get_post_format() ); ?>

					<?php endwhile; ?>
					
					<?php else : ?>

					  <h2><?php esc_html_e('No Posts Found', 'groci') ?></h2>

					<?php endif; ?>
					
					<?php comments_template(); ?>

				</div>
			<?php } elseif( ot_get_option( 'layout_set' ) == 'full-width') { ?>
				<div class="col-md-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					   <?php  get_template_part( 'post-format/single', get_post_format() ); ?>

					<?php endwhile; ?>
					
					<?php else : ?>

					  <h2><?php esc_html_e('No Posts Found', 'groci') ?></h2>

					<?php endif; ?>
					
					<?php comments_template(); ?>

				</div>
			<?php } else { ?>
				<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>			
					<div class="col-md-8">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
							<?php  get_template_part( 'post-format/single', get_post_format() ); ?>
	
						<?php endwhile; ?>
						<?php else : ?>
	
						  <h2><?php esc_html_e('No Posts Found', 'groci') ?></h2>
	
						<?php endif; ?>
						
						<?php comments_template(); ?>
	
					</div>
					
					<div class="col-md-4">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
					</div>
				<?php } else { ?>
					<div class="col-md-8 offset-md-2">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
							<?php  get_template_part( 'post-format/single', get_post_format() ); ?>
	
						<?php endwhile; ?>
						<?php else : ?>
	
						  <h2><?php esc_html_e('No Posts Found', 'groci') ?></h2>
	
						<?php endif; ?>
						
						<?php comments_template(); ?>
	
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>