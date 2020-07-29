<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 * 
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( "charset" ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<?php if(ot_get_option('groci_login_button') == 'on'){ ?>
		<?php get_template_part('includes/login_button_modal'); ?> 
	<?php } ?>
	
	<?php if(ot_get_option('groci_top_header') == 'on'){ ?>
      <div class="navbar-top pt-2 pb-2">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                   <a href="<?php echo esc_url(ot_get_option('groci_top_header_url'));?>" class="mb-0 text-white">
                   	<?php echo groci_sanitize_data(ot_get_option('groci_top_header_text')); ?>
				   </a>
               </div>
               <div class="col-md-6 text-right top-right-menu">
					<?php 
					   wp_nav_menu(array(
					   'theme_location' => 'top-right-menu',
					   'container' => '',
					   'fallback_cb' => 'show_top_menu',
					   'menu_id' => '',
					   'menu_class' => 'nav-top-right list-inline t-md-right',
					   'echo' => true,
					   'depth' => 0 
						)); 
					 ?>
               </div>
            </div>
         </div>
      </div>

	<?php } ?>

	<?php if(ot_get_option('groci_sticky_header') == "on"){ ?>
		<?php $menutype = 'fixed-menu'?>
	<?php } else { ?>
		<?php $menutype = 'static-menu'?>
	<?php } ?>

	<nav class="navbar navbar-light navbar-expand-lg bg-dark bg-faded osahan-menu <?php echo esc_attr($menutype); ?> klb-middle">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-3 klb-clear order-xs-first">
				<?php if (ot_get_option( "groci_logo" )) { ?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
						<img src="<?php echo esc_url(ot_get_option( "groci_logo" )); ?>" alt="<?php bloginfo("name"); ?>" >
					</a>
				<?php } elseif (ot_get_option( "groci_logotext" )) { ?>
					<a class="navbar-brand klb-logo-text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
						<?php echo esc_html(ot_get_option( "groci_logotext" )); ?>
					</a>
				<?php } else { ?>
					<a class="navbar-brand klb-logo-text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
						<?php esc_html_e("Groci","groci"); ?>
					</a>
				<?php } ?>


				</div>

				<div class="col-xs-12 col-md-6">
					<?php if(ot_get_option('groci_middle_header_search') == 'on'){ ?>
					<div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">
						<div class="top-categories-search">
							<?php get_product_search_form(); ?>
						</div>
					</div>
					<?php } ?>
				</div>

				<div class="col-xs-6 col-md-3 klb-main-nav-right order-xs-second">
					<div class="my-lg-0">
						<ul class="list-inline main-nav-right">
							<?php if(ot_get_option('groci_middle_header_cart') == 'on') { ?>
								<?php global $woocommerce; ?>
								<li class="list-inline-item cart-btn">
									<a href="#" data-toggle="offcanvas" class="btn btn-link border-none"><i class="mdi mdi-cart"></i> <?php esc_html_e('My Cart','groci'); ?> <small class="cart-value cart-contents"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'groci'), $woocommerce->cart->cart_contents_count);?></small></a>
								</li>
							<?php } ?>
						</ul>
					</div>

					<button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			</div>
		</div>
	</nav>

	<nav class="navbar navbar-expand-lg navbar-light osahan-menu-2 pad-none-mobile <?php echo esc_attr($menutype); ?>">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarText">
				<?php 
				wp_nav_menu(array(
				"theme_location" => "main-menu",
				"container" => "",
				"fallback_cb" => "show_top_menu",
				"menu_id" => "",
				"menu_class" => "navbar-nav mr-auto mt-2 mt-lg-0 margin-auto",
				"echo" => true,
				"walker" => new groci_description_walker(),
				"depth" => 0 
				)); 
				?>
			</div>
		</div>
	</nav>