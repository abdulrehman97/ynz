<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card blog mb-4">
		<div class="blog-header">	
			<?php echo get_post_meta($post->ID, 'klb_blogaudiourl', true); ?>
		</div>
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
			<?php the_excerpt(); ?>
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
		</div>
	</div>
</article>