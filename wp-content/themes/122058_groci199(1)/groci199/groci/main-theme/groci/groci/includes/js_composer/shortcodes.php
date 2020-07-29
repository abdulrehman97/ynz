<?php
/*-----------------------------------------------------------------------------------*/
/*	Shortcode Filter
/*-----------------------------------------------------------------------------------*/

vc_remove_element( "vc_gmaps");
vc_remove_element( "vc_wp_search");
vc_remove_element(  "vc_wp_meta" );
vc_remove_element(  "vc_wp_recentcomments" );
vc_remove_element(  "vc_wp_calendar" );
vc_remove_element(  "vc_wp_pages" );
vc_remove_element(  "vc_wp_tagcloud" );
vc_remove_element(  "vc_wp_custommenu" );
vc_remove_element(  "vc_wp_text" );
vc_remove_element(  "vc_wp_posts" );
vc_remove_element(  "vc_wp_categories" );
vc_remove_element(  "vc_wp_archives" );
vc_remove_element(  "vc_wp_rss" );
vc_remove_element(  "vc_progress_bar" );
vc_remove_element(  "vc_message" );
vc_set_as_theme( $disable_updater = false ); 
vc_is_updater_disabled();

function groci_vc_remove_woocommerce() {
        vc_remove_element( 'woocommerce_cart' );
        vc_remove_element( 'woocommerce_checkout' );
        vc_remove_element( 'woocommerce_order_tracking' );
        vc_remove_element( 'woocommerce_my_account' );
        vc_remove_element( 'recent_products' );
        vc_remove_element( 'featured_products' );
        vc_remove_element( 'product' );
        vc_remove_element( 'products' );
        vc_remove_element( 'add_to_cart' );
        vc_remove_element( 'add_to_cart_url' );
        vc_remove_element( 'product_page' );
        vc_remove_element( 'product_category' );
        vc_remove_element( 'product_categories' );
        vc_remove_element( 'sale_products' );
        vc_remove_element( 'best_selling_products' );
        vc_remove_element( 'top_rated_products' );
        vc_remove_element( 'product_attribute' );
        vc_remove_element( 'related_products' );

}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'groci_vc_remove_woocommerce', 11 );
// Hook for frontend editor.
add_action( 'vc_load_shortcode', 'groci_vc_remove_woocommerce', 11 );

/*-----------------------------------------------------------------------------------*/
/* groci Style
/*-----------------------------------------------------------------------------------*/

$attributes = array(

	array(
		'type' => 'css_editor',
		'param_name' => 'klb_responsive',
		'heading' => esc_html__( 'XS Responsive option', 'groci' ),
		'description' => esc_html__( 'These settings are worked for xsmall devices.', 'groci' ),
		'group' => esc_html__('Responsive Design','groci'),
	),

);
vc_add_params( 'vc_column', $attributes );


/*-----------------------------------------------------------------------------------*/
/*	Groci Title
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_title_integrateWithVC' );
function groci_title_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Title", "groci" ),
      "base" => "title",
	  "category" => "Groci",
      "params" => array(
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "groci"),
            "param_name" => "title",
            "description" => esc_html__("Set a title.", "groci"),
			"admin_label" => true,
        ),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Subtitle", "groci"),
            "param_name" => "subtitle",
            "description" => esc_html__("Set a subtitle.", "groci"),
        ),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Text Align', 'groci' ),
			'param_name' => 'textalign',
			'value' => array(
				esc_html__( 'Select Align', 'groci' ) => 'select-align',
				esc_html__( 'Left', 'groci' ) => 'text-left',
				esc_html__( 'Center', 'groci' ) => 'text-center',					
				esc_html__( 'Right', 'groci' ) => 'text-right',					
			),			
			'description' => esc_html__( 'Select text align.', 'groci' ),
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Title extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Groci Slider
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_slider_integrateWithVC' );
function groci_slider_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Slider", "groci" ),
      "base" => "slider",
	  "category" => "Groci",
      "params" => array(
				
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Slides', 'groci' ),
			'param_name' => 'values',
			'group' => esc_html__('Slides','groci'),
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'title here', 'groci' )
				)
			) ) ),
			'params' => array(
			
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'groci' ),
					'param_name' => 'image_url',
					'description' => esc_html__( 'Upload a image.', 'groci' ),
				),
				
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'groci' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Add an url for the image.', 'groci' ),
				),
			
			),
		),
		
		
      ),
   ) );
}
class WPBakeryShortCode_Slider extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	Groci Product Category Carousel
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_product_category_carousel_integrateWithVC' );
function groci_product_category_carousel_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Product Category Carousel", "groci" ),
      "base" => "category_carousel",
	  "category" => "Groci",
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Exclude Categories", "groci"),
            "param_name" => "exclude",
            "description" => esc_html__("Seperate category ids with comma.", "groci"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Display Items", "groci"),
            "param_name" => "itemcount",
            "description" => esc_html__("The number of items you want to see on the screen. Default: 8", "groci"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("AutoPlay", "groci"),
            "param_name" => "autoplaycount",
            "description" => esc_html__("Auto play time out. Default: 2000", "groci"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Image Width", "groci"),
            "param_name" => "width",
            "description" => esc_html__("You can set width for the images.", "groci"),
        ),
		  
        array(
            "type" => "textfield",
            "heading" => esc_html__("Image Height", "groci"),
            "param_name" => "height",
            "description" => esc_html__("You can set height for the images.", "groci"),
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_Product_Category_Carousel extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Groci Product Category List
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_product_category_list_integrateWithVC' );
function groci_product_category_list_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Product Category List", "groci" ),
      "base" => "category_list",
	  "category" => "Groci",
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Exclude Categories", "groci"),
            "param_name" => "exclude",
            "description" => esc_html__("Seperate category ids with comma.", "groci"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "groci"),
            "param_name" => "title",
            "description" => esc_html__("Set the title", "groci"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Image Width", "groci"),
            "param_name" => "width",
            "description" => esc_html__("You can set width for the images.", "groci"),
        ),
		  
        array(
            "type" => "textfield",
            "heading" => esc_html__("Image Height", "groci"),
            "param_name" => "height",
            "description" => esc_html__("You can set height for the images.", "groci"),
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_Product_Category_List extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	Groci Latest Products Carousel
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_latest_products_carousel_integrateWithVC' );
function groci_latest_products_carousel_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Latest Products Carousel", "groci" ),
      "base" => "latest_products_carousel",
	  "category" => "Groci",
      "params" => array(
	  
		array(
			'type' => 'loop',
			'heading' => esc_html__('Latest Products', 'groci'),
			'param_name' => 'build_query',
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 4 * 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'product', 'hidden' => true),
				'categories' => array('hidden' => true),
				'tags' => array('hidden' => true),
				
			),
			'description' => esc_html__('Create latest products loop.', 'groci')
		),

		array(
			'type' => 'checkbox',
			'param_name' => 'best_selling',
			'heading' => esc_html__( 'Activate Best Selling?', 'groci' ),
			'description' => esc_html__( 'You want to list best selling products?', 'groci' ),
			'value' => array( esc_html__( 'Yes', 'groci' ) => 'yes' ),
		),
		  
		array(
			'type' => 'checkbox',
			'param_name' => 'on_sale',
			'heading' => esc_html__( 'Activate on Sale?', 'groci' ),
			'description' => esc_html__( 'You want to list on sale products?', 'groci' ),
			'value' => array( esc_html__( 'Yes', 'groci' ) => 'yes' ),
		),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "groci"),
            "param_name" => "title",
            "description" => esc_html__("Set a title.", "groci"),
			"admin_label" => true,
			"group" => 'Header',
        ),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title Strong", "groci"),
            "param_name" => "title_strong",
            "description" => esc_html__("Set a title as strong.", "groci"),
			"group" => 'Header',
        ),
		
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Strong Title Background', 'groci' ),
			'param_name' => 'titlestrong_bg',
			'description' => esc_html__( 'Set background color for the strong title.', 'groci' ),
			"group" => 'Header',
		),
		
		array(
			'type' => 'vc_link',
			'heading' => esc_html__( 'URL (Link)', 'groci' ),
			'param_name' => 'link',
			'description' => esc_html__( 'Add button for the header area.', 'groci' ),
			"group" => 'Header',
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Latest_Products_Carousel extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	Groci Latest Products Grid
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_latest_products_grid_integrateWithVC' );
function groci_latest_products_grid_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Latest Products Grid", "groci" ),
      "base" => "latest_products_grid",
	  "category" => "Groci",
      "params" => array(
	  
		array(
			'type' => 'loop',
			'heading' => esc_html__('Latest Products', 'groci'),
			'param_name' => 'build_query',
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 4 * 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'product', 'hidden' => true),
				'categories' => array('hidden' => true),
				'tags' => array('hidden' => true),
				
			),
			'description' => esc_html__('Create latest products loop.', 'groci')
		),

		array(
			'type' => 'checkbox',
			'param_name' => 'best_selling',
			'heading' => esc_html__( 'Activate Best Selling?', 'groci' ),
			'description' => esc_html__( 'You want to list best selling products?', 'groci' ),
			'value' => array( esc_html__( 'Yes', 'groci' ) => 'yes' ),
		),
		  
		array(
			'type' => 'checkbox',
			'param_name' => 'on_sale',
			'heading' => esc_html__( 'Activate on Sale?', 'groci' ),
			'description' => esc_html__( 'You want to list on sale products?', 'groci' ),
			'value' => array( esc_html__( 'Yes', 'groci' ) => 'yes' ),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns', 'groci' ),
			'param_name' => 'column_count',
			'value' => array(
				esc_html__( 'Select Column', 'groci' ) => 'select-column',
				esc_html__( 'Column 2', 'groci' ) => 'col-md-6',						
				esc_html__( 'Column 3', 'groci' ) => 'col-md-4',						
				esc_html__( 'Column 4', 'groci' ) => 'col-md-3',						
			),			
			'description' => esc_html__( 'Set column count for the coupons.', 'groci' ),
			'group' => 'Columns',
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Mobile Columns', 'groci' ),
			'param_name' => 'mobile_column_count',
			'value' => array(
				esc_html__( 'Select Column', 'groci' ) => 'select-column',
				esc_html__( 'Column 1', 'groci' ) => 'col-xs-12',						
				esc_html__( 'Column 2', 'groci' ) => 'col-xs-6',												
			),			
			'description' => esc_html__( 'Set column count for mobile devices.', 'groci' ),
			'group' => 'Columns',
		),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "groci"),
            "param_name" => "title",
            "description" => esc_html__("Set a title.", "groci"),
			"admin_label" => true,
			"group" => 'Header',
        ),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title Strong", "groci"),
            "param_name" => "title_strong",
            "description" => esc_html__("Set a title as strong.", "groci"),
			"group" => 'Header',
        ),
		
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Strong Title Background', 'groci' ),
			'param_name' => 'titlestrong_bg',
			'description' => esc_html__( 'Set background color for the strong title.', 'groci' ),
			"group" => 'Header',
		),
		
		array(
			'type' => 'vc_link',
			'heading' => esc_html__( 'URL (Link)', 'groci' ),
			'param_name' => 'link',
			'description' => esc_html__( 'Add button for the header area.', 'groci' ),
			"group" => 'Header',
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Latest_Products_Grid extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Groci Icon Box
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_icon_box_integrateWithVC' );
function groci_icon_box_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Icon Box", "groci" ),
      "base" => "icon_box",
	  "category" => "Groci",
      "params" => array( 
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library', 'groci' ),
			'value' => array(
				esc_html__( 'Select Icon Type', 'groci' ) => 'select-type',
				esc_html__( 'Font Awesome', 'groci' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'groci' ) => 'openiconic',
				esc_html__( 'Typicons', 'groci' ) => 'typicons',
				esc_html__( 'Entypo', 'groci' ) => 'entypo',
				esc_html__( 'Linecons', 'groci' ) => 'linecons',
				esc_html__( 'Mono Social', 'groci' ) => 'monosocial',
				esc_html__( 'Material Design', 'groci' ) => 'materialdesign',
			),
			'param_name' => 'type',
			'description' => esc_html__( 'Select icon library.', 'groci' ),
			'dependency' => array(
				'element' => 'use_image',
				'is_empty' => true,
			),
		),

		
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'groci' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome',
			),
			'description' => esc_html__( 'Select icon from library.', 'groci' ),	
		),
		

		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'groci' ),
			'param_name' => 'icon_openiconic',
			'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => esc_html__( 'Select icon from library.', 'groci' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'groci' ),
			'param_name' => 'icon_typicons',
			'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => esc_html__( 'Select icon from library.', 'groci' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'groci' ),
			'param_name' => 'icon_entypo',
			'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'groci' ),
			'param_name' => 'icon_linecons',
			'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => esc_html__( 'Select icon from library.', 'groci' ),
		),
		
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'groci' ),
			'param_name' => 'icon_monosocial',
			'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'monosocial',
			),
			'description' => esc_html__( 'Select icon from library.', 'groci' ),
		),
		
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'groci' ),
			'param_name' => 'icon_materialdesign',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'materialdesign',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'materialdesign',
			),
			'description' => esc_html__( 'Select icon from library.', 'groci' ),
		),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "groci"),
            "param_name" => "title",
            "description" => esc_html__("Set a title.", "groci"),
			"admin_label" => true,
        ),
		
        array(
            "type" => "textarea",
            "heading" => esc_html__("Content", "groci"),
            "param_name" => "contentm",
            "description" => esc_html__("Set the content.", "groci"),
        ),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Box Type', 'groci' ),
			'param_name' => 'type_box',
			'value' => array(
				esc_html__( 'Select Box Type', 'groci' ) => 'select-box-type',
				esc_html__( 'Type 1', 'groci' ) => 'type_1',
				esc_html__( 'Type 2', 'groci' ) => 'type_2',										
			),			
			'description' => esc_html__( 'Select box type.', 'groci' ),
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Icon_Box extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Groci Team Box
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_team_box_integrateWithVC' );
function groci_team_box_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Team Box", "groci" ),
      "base" => "team_box",
	  "category" => "Groci",
      "params" => array(
	  
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'groci' ),
			'param_name' => 'image_url',
			'description' => esc_html__( 'Upload an image.', 'groci' ),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Name", "groci"),
			"param_name" => "name",
			"description" => esc_html__("Add the person name.", "groci"),
			"admin_label" => true,
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Position", "groci"),
			"param_name" => "position",
			"description" => esc_html__("Add the person job.", "groci"),
		),
		
		array(
			"type" => "textarea",
			"heading" => esc_html__("Content", "groci"),
			"param_name" => "contentm",
			"description" => esc_html__("Add content for the box.", "groci"),
		),



      ),
   ) );
}
class WPBakeryShortCode_Team_Box extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Groci Google Map
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_map_integrateWithVC' );
function groci_map_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Google Map", "groci" ),
      "base" => "map_container",
	  "category" => "Groci",
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Latitude", "groci"),
            "param_name" => "latitude",
            "description" => esc_html__("Add latitude for google map", "groci")
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Longitude', 'groci' ),
            'param_name' => 'longitude',
            "description" => esc_html__("Add longitude for google map", "groci"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Zoom', 'groci' ),
            'param_name' => 'zoom',
            "description" => esc_html__("Adjust zoom for google map", "groci"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Height', 'groci' ),
            'param_name' => 'height',
            "description" => esc_html__("Adjust height for google map", "groci"),
        ),

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'groci' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'groci' ),
        ),


      ),
   ) );
}
class WPBakeryShortCode_Map extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Groci Contact Details
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'groci_contact_detail_integrateWithVC' );
function groci_contact_detail_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Groci Contact Details", "groci" ),
      "base" => "contact_details",
	  "category" => "Groci",
      "params" => array(
	  
		array(
			"type" => "textfield",
			"heading" => esc_html__("Widget Title", "groci"),
			"param_name" => "widget_title",
			"description" => esc_html__("Add title.", "groci"),
			"admin_label" => true,
			'group' => esc_html__('Details','groci'),
		),
				
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Details', 'groci' ),
			'param_name' => 'values',
			'group' => esc_html__('Details','groci'),
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'title here', 'groci' )
				)
			) ) ),
			'params' => array(
			
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'groci' ),
					'param_name' => 'icon_materialdesign',
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'materialdesign',
						'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => esc_html__( 'Select icon from library.', 'groci' ),
				),
				
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title", "groci"),
					"param_name" => "title",
					"description" => esc_html__("Add title.", "groci"),
					"admin_label" => true
				),

				array(
					"type" => "textarea",
					"heading" => esc_html__("Contentm", "groci"),
					"param_name" => "contentm",
					"description" => esc_html__("Add content.", "groci"),
				),
			
			),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Social Title", "groci"),
			"param_name" => "social_title",
			"description" => esc_html__("Add title.", "groci"),
			"admin_label" => true,
			'group' => esc_html__('Social','groci'),
		),
				
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Social', 'groci' ),
			'param_name' => 'social',
			'group' => esc_html__('Social','groci'),
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'title here', 'groci' )
				)
			) ) ),
			'params' => array(
			
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'groci' ),
					'param_name' => 'icon_materialdesign_social',
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'materialdesign',
						'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => esc_html__( 'Select icon from library.', 'groci' ),
				),
				
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'groci' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Add an url for the social box.', 'groci' ),
				),
			
			),
		),
		
		
      ),
   ) );
}
class WPBakeryShortCode_Contact_Details extends WPBakeryShortCode {
}