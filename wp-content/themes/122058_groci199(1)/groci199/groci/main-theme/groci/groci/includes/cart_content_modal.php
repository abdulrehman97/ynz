	  <?php	global $woocommerce; ?>
      <div class="cart-sidebar">
         <div class="cart-sidebar-header">
            <h5>
               <?php esc_html_e('My Cart','groci'); ?> <span class="text-success cart-content-count">(<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'groci'), $woocommerce->cart->cart_contents_count);?>)</span> <a data-toggle="offcanvas" class="float-right" href="#"><i class="mdi mdi-close"></i>
               </a>
            </h5>
         </div>
		<div class="fl-mini-cart-content" >
		<?php woocommerce_mini_cart(); ?>
		</div>
      </div>