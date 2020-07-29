<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package nirmala
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class('card border-0'); ?> id="post-<?php the_ID(); ?>">

<div class="border-bottom pb-12px">
	
	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'post-thumbnail', array( 'class' => 'mb-3 d-block mx-auto' ) ); ?></a>
	<?php } ?>

	<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h3>' ); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta small mb-2">
		<?php nirmala_posted_on(); ?>
	</div>
	<?php endif; ?>

	<div class="excerpt">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer small">
		<?php nirmala_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</div>

</article>
