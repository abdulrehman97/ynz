<?php
/**
 * archive.php
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 * 
 */
 ?>

<?php get_header(); ?>
<section class="section-padding bg-dark inner-header klb-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="mt-0 mb-3 text-white"><?php the_archive_title(); ?></h1>
			</div>
		</div>
	</div>
</section>
	  
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

						<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

					<?php endwhile; ?>
						<?php get_template_part( 'post-format/pagination' ); ?>
					<?php else : ?>

					  <h2><?php esc_html_e('No Posts Found', 'groci') ?></h2>

					<?php endif; ?>

				</div>

			<?php } elseif( ot_get_option( 'layout_set' ) == 'full-width') { ?>
				<div class="col-md-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					   <?php  get_template_part( 'post-format/content', get_post_format() ); ?>

					<?php endwhile; ?>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<?php get_template_part( 'post-format/pagination' ); ?>
							</div>
						</div>
					<?php else : ?>

					  <h2><?php esc_html_e('No Posts Found', 'groci') ?></h2>

					<?php endif; ?>

				</div>
			<?php } else { ?>
				<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>			
					<div class="col-md-8">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
							<?php  get_template_part( 'post-format/content', get_post_format() ); ?>
	
						<?php endwhile; ?>
							<?php get_template_part( 'post-format/pagination' ); ?>
						<?php else : ?>
	
						  <h2><?php esc_html_e('No Posts Found', 'groci') ?></h2>
	
						<?php endif; ?>
	
					</div>
					
					<div class="col-md-4">
							<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							<?php } ?>
					</div>
				<?php } else { ?>
					<div class="col-md-8 offset-md-2">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
							<?php  get_template_part( 'post-format/content', get_post_format() ); ?>
	
						<?php endwhile; ?>
							<?php get_template_part( 'post-format/pagination' ); ?>
						<?php else : ?>
	
						  <h2><?php esc_html_e('No Posts Found', 'groci') ?></h2>
	
						<?php endif; ?>
	
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>