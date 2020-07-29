<?php
/**
 * Partial template for content without title in page.php
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('mb-3'); ?> id="post-<?php the_ID(); ?>">

	<header class="d-none entry-header">

		<?php the_title( '<h1 class="entry-title border-bottom">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'd-block mx-auto mb-3' ) ); ?>

	<div class="clearfix mb-3">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

	<?php
	wp_link_pages( array(
		'before' => '<div class="multipages mt-3 py-2 border-top border-bottom">' . __( 'Pages:', 'nirmala' ),
		'after'  => '</div>',
		'link_before' => '<span class="rounded py-1 px-2 text-white">',
		'link_after' => '</span>'
	) );
	?>

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'nirmala' ), '<span class="edit-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<div class="border-bottom mb-3 d-block d-md-none"></div>
