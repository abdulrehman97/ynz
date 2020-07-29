<?php

/**
 * frontpage.php
 * Template name: Frontpage Template
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 */
?>

<?php get_header(); ?>
		
	<?php $content = ''; ?>
	<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
		  <?php $content .= get_the_content(); ?>
	<?php  endwhile; ?>
	<?php endif; ?> 
	
	<?php if( has_shortcode( $content, 'vc_row' )) { ?>
	  
		<?php while(have_posts()) : the_post(); ?> 
		
			<?php the_content (); ?>
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
		<?php endwhile; ?>
		
	<?php } else { ?>
		<main id="mainContent" class="main-content">
			<div class="page-container ptb-60">
                <div class="container">
					<section class="panel">
					 <?php while(have_posts()) : the_post(); ?>
						<div class="klb-post ptb-30 prl-30">
						<h3 class="h-title mb-30 t-uppercase"><?php the_title(); ?></h3>
						<?php the_content (); ?>
						<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						</div>
					 <?php endwhile; ?>
					 
					 <?php comments_template(); ?>    
				</div>
			</div>
		</main>
	<?php } ?>
   
<?php get_footer(); ?>