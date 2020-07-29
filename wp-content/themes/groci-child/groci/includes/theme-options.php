<?php

if ( ! class_exists( 'OT_Loader' )){
	function ot_get_option() {
		return false;
	}

	function get_option_tree() {
		return false;
	}
}


add_filter( 'ot_google_fonts_api_key', 'groci_ot_google_fonts_api_key' ); 
function groci_ot_google_fonts_api_key( $key ) {
 return "AIzaSyB4osDvWNL8xP6-EXeclr0_VnhCtG6_Yz0";
}

/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => esc_html__('General Config','groci'),
      ),
	  
      array(
        'id'          => 'header_settings',
        'title'       => esc_html__('Header Settings','groci'),
      ),

	  array(
        'id'          => 'shop_settings',
        'title'       => esc_html__('Shop Settings','groci'),
      ), 
	  
      array(
        'id'          => 'color_settings',
        'title'       => esc_html__('Color Settings','groci'),
      ),

      array(
        'id'          => 'blog_settings',
        'title'       => esc_html__('Blog Settings','groci'),
      ), 

      array(
        'id'          => 'breadcrumb_settings',
        'title'       => esc_html__('Breadcrumb Settings','groci'),
      ),	  
	  
      array(
        'id'          => 'google_fonts',
        'title'       => esc_html__('Google Fonts','groci'),
      ),

      array(
        'id'          => 'typography',
        'title'       => esc_html__('Typography','groci'),
      ),
	  
	  array(
		'id'          => 'map_settings',
		'title'       => esc_html__('Map Settings','groci'),
	  ),
	  
      array(
        'id'          => 'copyright',
        'title'       => esc_html__('Footer / Copyright','groci'),
      )	  
	
    ),
    'settings'        => array(
	
      array(
        'label'       => esc_html__( 'Logo', 'groci' ),
        'id'          => 'tab_logo',
        'type'        => 'tab',
        'section'     => 'general'
      ),
	  array(
        'id'          => 'groci_logo',
        'label'       => esc_html__('Logo Image','groci'),
        'desc'        => esc_html__('Upload your own logo.','groci'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  
      array(
        'id'          => 'groci_logo_size',
        'label'       => esc_html__( 'Logo Size', 'groci' ),
        'desc'        => esc_html__( 'You can set logo width.', 'groci' ),
        'std'         => '250',
        'type'        => 'numeric-slider',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '50,400,1',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	 
	  array(
        'id'          => 'groci_logotext',
        'label'       => esc_html__('Logo Text','groci'),
        'desc'        => esc_html__('Add Logo Text','groci'),
        'std'         => 'groci',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	
	  
	  array(
		'label'       => esc_html__( 'Top Header', 'groci' ),
		'id'          => 'tab_top_header',
		'type'        => 'tab',
		'section'     => 'header_settings'
	  ),
	  
	  array(
        'id'          => 'groci_top_header',
        'label'       => esc_html__( 'On/Off Top Header', 'groci' ),
        'desc'        => esc_html__('Disable or Enable Top Header','groci' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
      array(
        'id'          => 'groci_top_header_text',
        'label'       => esc_html__('Title','groci'),
        'desc'        => esc_html__('Add description text for the header.','groci'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'condition'   => 'groci_top_header:is(on)',
      ),
	  
      array(
        'id'          => 'groci_top_header_url',
        'label'       => esc_html__('Link','groci'),
        'desc'        => esc_html__('Add an url for the title.','groci'),
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'condition'   => 'groci_top_header:is(on)',
      ),

	  array(
        'id'          => 'groci_top_header_bg_first',
        'label'       => esc_html__('Background Color First','groci'),
        'desc'        => esc_html__('Set background color.','groci'),
        'std'         => '#171b20',
        'type'        => 'colorpicker',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'condition'   => 'groci_top_header:is(on)',
      ),

	  array(
        'id'          => 'groci_top_header_bg_second',
        'label'       => esc_html__('Background Color Second','groci'),
        'desc'        => esc_html__('Set background color.','groci'),
        'std'         => '#343a40',
        'type'        => 'colorpicker',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'condition'   => 'groci_top_header:is(on)',
      ),

	  array(
        'id'          => 'groci_top_header_color',
        'label'       => esc_html__('Font Color','groci'),
        'desc'        => esc_html__('Set font color.','groci'),
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'condition'   => 'groci_top_header:is(on)',

      ),
	  
	  array(
		'label'       => esc_html__( 'Middle Header', 'groci' ),
		'id'          => 'tab_middle_header',
		'type'        => 'tab',
		'section'     => 'header_settings'
	  ),

	  array(
        'id'          => 'groci_middle_header_search',
        'label'       => esc_html__( 'On/Off Search Form', 'groci' ),
        'desc'        => esc_html__('Disable or Enable Search Form on Middle Header','groci' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'groci_middle_header_cart',
        'label'       => esc_html__( 'On/Off Cart', 'groci' ),
        'desc'        => esc_html__('Disable or Enable Cart on Middle Header','groci' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  
	  array(
		'label'       => esc_html__( 'Bottom Header', 'groci' ),
		'id'          => 'tab_bottom_header',
		'type'        => 'tab',
		'section'     => 'header_settings'
	  ),

	  array(
        'id'          => 'groci_sticky_header',
        'label'       => esc_html__( 'On/Off Sticky Header', 'groci' ),
        'desc'        => esc_html__('Disable or Enable Sticky Header','groci' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  array(
        'id'          => 'groci_bottom_header_bg',
        'label'       => esc_html__('Background','groci'),
        'desc'        => esc_html__('Set background color.','groci'),
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

	  array(
        'id'          => 'groci_bottom_header_color',
        'label'       => esc_html__('Font Color','groci'),
        'desc'        => esc_html__('Set font color.','groci'),
        'std'         => '#666',
        'type'        => 'colorpicker',
        'section'     => 'header_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  
	  array(
		'label'       => esc_html__( 'Layouts', 'groci' ),
		'id'          => 'tab_shop_layouts',
		'type'        => 'tab',
		'section'     => 'shop_settings'
	  ),
	  
      array(
        'id'          => 'woocommerce_shop_layout',
        'label'       => esc_html__( 'Shop Layout', 'groci' ),
        'desc'        => esc_html__( ' Left Sidebar - Right Sidebar - Full Width', 'groci' ),
        'std'         => 'left-sidebar',
        'type'        => 'radio-image',
        'section'     => 'shop_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'id'          => 'groci_shop_mobile_columns',
        'label'       => esc_html__( 'Select Mobile Column', 'groci' ),
        'desc'        => esc_html__( 'Set columns for mobile devices.The option is for product page.', 'groci' ),
        'std'         => 'col-xs-12',
        'type'        => 'select',
        'section'     => 'shop_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'col-xs-12',
            'label'       => esc_html__( '1 Column', 'groci' ),
            'src'         => ''
          ),
          array(
            'value'       => 'col-xs-6',
            'label'       => esc_html__( '2 Columns', 'groci' ),
            'src'         => ''
          ),
          array(
            'value'       => 'col-xs-4',
            'label'       => esc_html__( '3 Columns', 'groci' ),
            'src'         => ''
          ),

        )
      ),
	  
	  array(
		'label'       => esc_html__( 'Banner', 'groci' ),
		'id'          => 'tab_shop_banner',
		'type'        => 'tab',
		'section'     => 'shop_settings'
	  ),
	  
	  array(
        'id'          => 'groci_shop_banner',
        'label'       => esc_html__('Ads Image','groci'),
        'desc'        => esc_html__('Upload an image for the ads.','groci'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'shop_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  
	  array(
		'id'          => 'groci_banner_url',
		'label'       => esc_html__('Ads Url','groci'),
		'desc'        => esc_html__('Set an url for the image.','groci'),
		'std'         => '#',
		'type'        => 'text',
        'section'     => 'shop_settings',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => ''
	  ),

	  array(
		'label'       => esc_html__( 'Single Product', 'groci' ),
		'id'          => 'tab_shop_detail',
		'type'        => 'tab',
		'section'     => 'shop_settings'
	  ),
	  
	  array(
		'id'          => 'groci_featured_box_title',
		'label'       => esc_html__('Title','groci'),
		'desc'        => esc_html__('Add title for the featued box.','groci'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'shop_settings',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => ''
	  ),
	  
      array(
        'id'          => 'groci_single_product_featured_box',
        'label'       => esc_html__('Set Featured Box','groci'),
        'desc'        => esc_html__('Create Featued Box','groci'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'shop_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 

          array(
            'id'          => 'groci_featured_subtitle',
            'label'       => esc_html__('Subtitle','groci'),
            'desc'        => esc_html__('Add subtitle.','groci'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),

          array(
            'id'          => 'groci_featued_icon',
            'label'       => esc_html__('Icon Name','groci'),
            'desc'        => esc_html__('Add Your Icon : truck-fast','groci'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
      ),
	  

	  array(
		'label'       => esc_html__( 'First Color', 'groci' ),
		'id'          => 'first_color',
		'type'        => 'tab',
		'section'     => 'color_settings'
	  ),
		
	  array(
        'id'          => 'groci_main_color_first',
        'label'       => esc_html__('Gradient First Color','groci'),
        'desc'        => esc_html__('Set a color for the theme','groci'),
        'std'         => '#ff934b',
        'type'        => 'colorpicker',
        'section'     => 'color_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
		

	  array(
        'id'          => 'groci_main_color_second',
        'label'       => esc_html__('Gradient Second Color','groci'),
        'desc'        => esc_html__('Set a color for the theme','groci'),
        'std'         => '#ff5e62',
        'type'        => 'colorpicker',
        'section'     => 'color_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
		
	  array(
		'label'       => esc_html__( 'Second Color', 'groci' ),
		'id'          => 'second_color',
		'type'        => 'tab',
		'section'     => 'color_settings'
	  ),
		
	  array(
        'id'          => 'groci_second_color_first',
        'label'       => esc_html__('Gradient First Color','groci'),
        'desc'        => esc_html__('Set a color for the theme','groci'),
        'std'         => '#0cc5b7',
        'type'        => 'colorpicker',
        'section'     => 'color_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
		

	  array(
        'id'          => 'groci_second_color_second',
        'label'       => esc_html__('Gradient Second Color','groci'),
        'desc'        => esc_html__('Set a color for the theme','groci'),
        'std'         => '#2bd891',
        'type'        => 'colorpicker',
        'section'     => 'color_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

	  array(
		'label'       => esc_html__( 'Layouts', 'groci' ),
		'id'          => 'tab_layouts',
		'type'        => 'tab',
		'section'     => 'blog_settings'
	  ),
	  
      array(
        'id'          => 'layout_set',
        'label'       => esc_html__( 'Blog Layout', 'groci' ),
        'desc'        => esc_html__( ' Left Sidebar - Right Sidebar - Full Width', 'groci' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'blog_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'id'          => 'groci_breadcrumb_type',
        'label'       => esc_html__( 'Select Type', 'groci' ),
        'desc'        => esc_html__( 'Select type for breadcrumb on the page.', 'groci' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'breadcrumb_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'type1',
            'label'       => esc_html__( 'Type 1', 'groci' ),
            'src'         => ''
          ),
          array(
            'value'       => 'type2',
            'label'       => esc_html__( 'Type 2', 'groci' ),
            'src'         => ''
          ),
        )
      ),
	  	  
	  
	 array(
	    'id'          => 'body_google_fonts',
	    'label'       => esc_html__('Google Fonts','groci' ),
	    'desc'        => esc_html__('Add Google Font and after the save settings follow these steps Dashboard > Appearance > Theme Options > Typography','groci' ),
	    'std'         => '',
	    'type'        => 'google-fonts',
	    'section'     => 'google_fonts',
	    'rows'        => '',
	    'post_type'   => '',
	    'taxonomy'    => '',
	    'min_max_step'=> '',
	    'class'       => '',
	    'condition'   => '',
	    'operator'    => 'and'
	),

      array(
        'label'       => esc_html__( 'General', 'groci' ),
        'id'          => 'tab_general',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'tipigrof',
        'label'       => esc_html__( 'Body Typography', 'groci' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'groci' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H1 Title', 'groci' ),
        'id'          => 'tab_h1title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h1_tipigrof',
        'label'       => esc_html__( 'H1 Title Typography', 'groci' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'groci' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H2 Title', 'groci' ),
        'id'          => 'tab_h2title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h2_tipigrof',
        'label'       => esc_html__( 'H2 Title Typography', 'groci' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'groci' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H3 Title', 'groci' ),
        'id'          => 'tab_h3title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h3_tipigrof',
        'label'       => esc_html__( 'H3 Title Typography', 'groci' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'groci' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H4 Title', 'groci' ),
        'id'          => 'tab_h4title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h4_tipigrof',
        'label'       => esc_html__( 'H4 Title Typography', 'groci' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'groci' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H5 Title', 'groci' ),
        'id'          => 'tab_h5title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h5_tipigrof',
        'label'       => esc_html__( 'H5 Title Typography', 'groci' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'groci' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H6 Title', 'groci' ),
        'id'          => 'tab_h6title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),


      array(
        'id'          => 'h6_tipigrof',
        'label'       => esc_html__( 'H6 Title Typography', 'groci' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.','groci' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'P(Content)', 'groci' ),
        'id'          => 'tab_pcontent',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'p_tipigrof',
        'label'       => esc_html__( 'P(Content) Typography', 'groci' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.','groci' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	
	  array(
			'id'          => 'groci_mapapi',
			'label'       => esc_html__('Google Map Api Key','groci' ),
			'desc'        => esc_html__('Add your google map api key','groci' ),
			'std'         => '',
			'type'        => 'text',
			'section'     => 'map_settings',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => ''
	  ),	

      array(
        'label'       => esc_html__( 'General', 'groci' ),
        'id'          => 'tab__footer_general',
        'type'        => 'tab',
        'section'     => 'copyright'
      ),
	  
      array(
        'id'          => 'groci_copyright',
        'label'       => esc_html__('Footer Copyright','groci'),
        'desc'        => esc_html__('Footer Copyright','groci'),
        'std'         => esc_html__('Copyright 2019.KlbTheme . All rights reserved','groci'),
        'type'        => 'text',
        'section'     => 'copyright',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

      array(
        'id'          => 'groci_footer_columns',
        'label'       => esc_html__( 'Select Column', 'groci' ),
        'desc'        => esc_html__( 'Select columns for footer widgets.', 'groci' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'copyright',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '3-columns',
            'label'       => esc_html__( '3 Columns', 'groci' ),
            'src'         => ''
          ),
          array(
            'value'       => '4-columns',
            'label'       => esc_html__( '4 Columns', 'groci' ),
            'src'         => ''
          ),
          array(
            'value'       => '5-columns',
            'label'       => esc_html__( '5 Columns', 'groci' ),
            'src'         => ''
          ),

        )
      ),

      array(
        'label'       => esc_html__( 'Payment Image', 'groci' ),
        'id'          => 'payment_imagefoter',
        'type'        => 'tab',
        'section'     => 'copyright'
      ),

	  array(
        'id'          => 'groci_payment_image',
        'label'       => esc_html__('Payment Image','groci'),
        'desc'        => esc_html__('Upload an image.','groci'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'copyright',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

      array(
        'label'       => esc_html__( 'Colors', 'groci' ),
        'id'          => 'footer_color',
        'type'        => 'tab',
        'section'     => 'copyright'
      ),

      array(
        'id'          => 'groci_footer_bg_color',
        'label'       => esc_html__('Footer Background','groci' ),
        'desc'        => esc_html__('Footer Bottom Background Color', 'groci' ),
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'copyright',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

      array(
        'id'          => 'groci_footer_font_color',
        'label'       => esc_html__('Footer Font Color','groci' ),
        'desc'        => esc_html__('Footer Bottom Font Color','groci' ),
        'std'         => '#343a40',
        'type'        => 'colorpicker',
        'section'     => 'copyright',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

	
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}