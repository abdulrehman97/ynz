<?php
/**
 * Search results partial template
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('card pb-12px mb-3 rounded-0 border-top-0 border-left-0 border-right-0'); ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
	<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
		<?php echo get_the_post_thumbnail( $post->ID, 'post-thumbnail', array( 'class' => 'mb-3 d-block mx-auto' ) ); ?>
	</a>
	<?php } ?>

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>'
		);
		?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta small mb-2">
				<?php nirmala_posted_on(); ?>
			</div>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

	<footer class="entry-footer small">

		<?php nirmala_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
