<?php
    /*
    Plugin Name: Klb Shortcode
    Plugin URI: http://themeforest.net/user/klbtheme/portfolio
    Description: Plugin for displaying theme shortcodes.
    Author: KlbTheme
    Version: 1.5.4
    Author URI: http://themeforest.net/user/klbtheme/portfolio
    */
	
	
	require_once('inc/klb-shortcode.php');
	require_once('inc/style.php');	
	require_once('inc/aq_resizer.php');	
	require_once('inc/post_view.php');	

	
	if ( ! function_exists( 'klbshortcode' ) ) {
		function klbshortcode() {
		}
	}

/*----------------------------
  Load Languages
 ----------------------------*/
function klb_shortcode_load_plugin_textdomain() {
	load_plugin_textdomain( 'klb-shortcode', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'klb_shortcode_load_plugin_textdomain' );
