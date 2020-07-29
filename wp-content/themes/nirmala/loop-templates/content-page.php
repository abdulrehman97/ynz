<?php
/**
 * Partial template for content in page.php
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'mb-3 border-bottom' ); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title border-bottom mb-12px">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'd-block mx-auto mb-3' ) ); ?>

	<div class="clearfix entry-content mb-3">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="clearfix"></div><div class="multipages mt-3 py-2 border-top border-bottom">' . __( 'Pages:', 'nirmala' ),
				'after' => '</div>',
				'link_before' => '<span class="rounded py-1 px-2 text-white">',
				'link_after' => '</span>'
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php nirmala_edit_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
