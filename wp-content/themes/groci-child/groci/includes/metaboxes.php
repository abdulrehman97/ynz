<?php

/*************************************************
## groci Metabox
*************************************************/

if ( ! function_exists( 'rwmb_meta' ) ) {
  function rwmb_meta( $key, $args = '', $post_id = null ) {
   return false;
  }
 }

add_filter( 'rwmb_meta_boxes', 'groci_register_page_meta_boxes' );

function groci_register_page_meta_boxes( $meta_boxes ) {
	
$prefix = 'klb_';
$meta_boxes = array();

/* ----------------------------------------------------- */
// Blog Post Slides Metabox
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id'		=> 'klb-blogmeta-gallery',
	'title'		=> esc_html__('Blog Post Image Slides','groci'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> esc_html__('Blog Post Slider Images','groci'),
			'desc'	=> esc_html__('Upload unlimited images for a slideshow - or only one to display a single image.','groci'),
			'id'	=> $prefix . 'blogitemslides',
			'type'	=> 'image_advanced',
		)
		
	)
);

/* ----------------------------------------------------- */
// Blog Audio Post Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'klb-blogmeta-audio',
	'title' => esc_html__('Audio Settings','groci'),
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(	
		array(
			'name'		=> esc_html__('Audio Code','groci'),
			'id'		=> $prefix . 'blogaudiourl',
			'desc'		=> esc_html__('Enter your Audio URL(Oembed) or Embed Code.','groci'),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
	)
);



/* ----------------------------------------------------- */
// Blog Video Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'klb-blogmeta-video',
	'title'		=> esc_html__('Blog Video Settings','groci'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> esc_html__('Video Type','groci'),
			'id'		=> $prefix . 'blog_video_type',
			'type'		=> 'select',
			'options'	=> array(
				'youtube'		=> esc_html__('Youtube','groci'),
				'vimeo'			=> esc_html__('Vimeo','groci'),
				'own'			=> esc_html__('Own Embed Code','groci'),
			),
			'multiple'	=> false,
			'std'		=> array( 'no' )
		),
		array(
			'name'	=> groci_sanitize_data(__('Embed Code<br />(Audio Embed Code is possible, too)','groci')),
			'id'	=> $prefix . 'blog_video_embed',
			'desc'	=> groci_sanitize_data(__('Just paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>GUEZCxBcM78</strong>) you want to show, or insert own Embed Code. <br />This will show the Video <strong>INSTEAD</strong> of the Image Slider.<br /><strong>Of course you can also insert your Audio Embedd Code!</strong>','groci')),
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "40",
			'rows' 	=> "8"
		)
	)
);
 

return $meta_boxes;
}
