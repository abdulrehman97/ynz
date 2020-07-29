<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card blog mb-4">
		<?php $images = rwmb_meta( 'klb_blogitemslides', 'type=image_advanced&size=medium' ); ?>
		<?php if($images) { ?>
		<?php wp_enqueue_script('groci-slidepost');  ?>
		<div class="blog-header">	
			<div class="post-slider owl-carousel owl-theme">
				<?php  foreach ( $images as $image ) { ?>
					<img src="<?php echo esc_url($image['full_url']); ?>" alt="<?php esc_attr_e('blogimage','groci'); ?>">
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<div class="card-body">
			<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<div class="entry-meta">
				<ul class="tag-info list-inline">
					<li class="list-inline-item"><a href="<?php the_permalink(); ?>"><i class="mdi mdi-calendar"></i>  <?php echo get_the_date(); ?></a></li>
					<?php if(has_category()){ ?>
					<li class="list-inline-item"><i class="mdi mdi-folder"></i> <?php the_category(', '); ?></li>
					<?php } ?>
					<?php the_tags( '<li class="list-inline-item"><i class="mdi mdi-tag"></i> ', ', ', ' </li>'); ?>
					<?php if ( is_sticky()) {
						printf( '<li class="list-inline-item"><i class="mdi mdi-comment-account-outline"></i> %s</li>', esc_html__( 'Featured', 'groci' ) );
					} ?>
				</ul>
			</div>
			<div class="klb-post">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			</div>
		</div>
	</div>
</article>