<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card blog mb-4">
		<div class="blog-header">	
		   <?php  
			if (get_post_meta( get_the_ID(), 'klb_blog_video_type', true ) == 'vimeo') {  
			  echo '<iframe src="//player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" height="409" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';  
			}  
			else if (get_post_meta( get_the_ID(), 'klb_blog_video_type', true ) == 'youtube') {  
			  echo '<iframe height="450" src="//www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" allowfullscreen></iframe>';  
			}  
			else {  
				echo ' '.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).' '; 
			}  
			?>
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