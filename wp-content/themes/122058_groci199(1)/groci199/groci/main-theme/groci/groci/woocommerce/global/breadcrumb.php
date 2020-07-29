<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo groci_sanitize_data($wrap_before);

	foreach ( $breadcrumb as $key => $crumb ) {

		echo groci_sanitize_data($before);

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			$on_front   = get_option( 'show_on_front' );
			if ( $crumb[0] == 'Home' ) {
			echo '<a href="' . esc_url( $crumb[1] ) . '"><strong><span class="mdi mdi-home"></span> ' . esc_html( $crumb[0] ) . '</strong></a>';
			} else {
			echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
			}
		} else {
			echo esc_html( $crumb[0] );
		}

		echo groci_sanitize_data($after);

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo groci_sanitize_data($delimiter);
		}
	}

	echo groci_sanitize_data($wrap_after);

}
