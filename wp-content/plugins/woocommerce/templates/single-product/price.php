<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
<?php
//class="btn btn-secondary btn-lg single_add_to_cart_button button alt"
$_arr = get_post_meta( $product->id , '_product_attributes' );
echo "<span class='btn btn-secondary btn-lg single_add_to_cart_button button alt'><a target='_blank' href='".($_arr[0]['amazon-link']['value'])."' class='btn-secondary'> Buy from Amazon</a></span> &nbsp;  &nbsp; ";
echo "<span class='btn btn-secondary btn-lg single_add_to_cart_button button alt'><a  target='_blank'  href='".($_arr[0]['e-bay-link']['value'])."' class='btn-secondary'>Buy from Ebay</a></span>";
//$result = wc_display_product_attributes( $product );
//exit;
?>
