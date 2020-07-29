<?php 
/*************************************************
## Groci Typography
*************************************************/

function groci_custom_styling() { ?>

<style type="text/css">

<?php $tipigrof = ot_get_option( 'tipigrof', array() ); ?> 
<?php if($tipigrof) { ?>
body{ 
<?php if($tipigrof['font-color'])     { echo 'color:          '.esc_attr($tipigrof['font-color']).'';      }else{ echo '';} ?>;
<?php if($tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($tipigrof['font-family']).'';     }else{ echo '';} ?>;
<?php if($tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($tipigrof['font-size']).'';       }else{ echo '';} ?>;
<?php if($tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($tipigrof['font-style']).'';      }else{ echo '';} ?>;
<?php if($tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($tipigrof['font-variant']).'';    }else{ echo '';} ?> ;
<?php if($tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($tipigrof['font-weight']).'';     }else{ echo '';} ?> ;
<?php if($tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($tipigrof['letter-spacing']).'';  }else{ echo '';} ?> ;
<?php if($tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($tipigrof['line-height']).'' ;    }else{ echo '';} ?> ;
<?php if($tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($tipigrof['text-decoration']).''; }else{ echo '';} ?> ;
<?php if($tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($tipigrof['text-transform']).'' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h1tipigrof = ot_get_option( 'h1_tipigrof', array() ); ?> 
<?php if($h1tipigrof) { ?>
h1{ 
<?php if($h1tipigrof['font-color'])     { echo 'color:          '.esc_attr($h1tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h1tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h1tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h1tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h1tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h1tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h1tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h1tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h1tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h1tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h1tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h1tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h1tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h1tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h1tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h1tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h1tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h1tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h1tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>



<?php $h2tipigrof = ot_get_option( 'h2_tipigrof', array() ); ?> 
<?php if($h2tipigrof) { ?>
h2{ 
<?php if($h2tipigrof['font-color'])     { echo 'color:          '.esc_attr($h2tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h2tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h2tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h2tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h2tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h2tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h2tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h2tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h2tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h2tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h2tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h2tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h2tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h2tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h2tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h2tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h2tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h2tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h2tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h3tipigrof = ot_get_option( 'h3_tipigrof', array() ); ?> 
<?php if($h3tipigrof) { ?>
h3{ 
<?php if($h3tipigrof['font-color'])     { echo 'color:          '.esc_attr($h3tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h3tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h3tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h3tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h3tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h3tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h3tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h3tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h3tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h3tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h3tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h3tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h3tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h3tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h3tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h3tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h3tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h3tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h3tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h4tipigrof = ot_get_option( 'h4_tipigrof', array() ); ?> 
<?php if($h4tipigrof) { ?>
h4{ 
<?php if($h4tipigrof['font-color'])     { echo 'color:          '.esc_attr($h4tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h4tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h4tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h4tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h4tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h4tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h4tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h4tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h4tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h4tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h4tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h4tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h4tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h4tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h4tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h4tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h4tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h4tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h4tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h5tipigrof = ot_get_option( 'h5_tipigrof', array() ); ?> 
<?php if($h5tipigrof) { ?>
h5{ 
<?php if($h5tipigrof['font-color'])     { echo 'color:          '.esc_attr($h5tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h5tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h5tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h5tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h5tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h5tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h5tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h5tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h5tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h5tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h5tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h5tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h5tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h5tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h5tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h5tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h5tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h5tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h5tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h6tipigrof = ot_get_option( 'h6_tipigrof', array() ); ?> 
<?php if($h6tipigrof) { ?>
h6{ 
<?php if($h6tipigrof['font-color'])     { echo 'color:          '.esc_attr($h6tipigrof['font-color']).'!important';      }else{ echo '';} ?>;
<?php if($h6tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h6tipigrof['font-family']).'!important';     }else{ echo '';} ?>;
<?php if($h6tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h6tipigrof['font-size']).'!important';       }else{ echo '';} ?>;
<?php if($h6tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h6tipigrof['font-style']).'!important';      }else{ echo '';} ?>;
<?php if($h6tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h6tipigrof['font-variant']).'!important';    }else{ echo '';} ?> ;
<?php if($h6tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h6tipigrof['font-weight']).'!important';     }else{ echo '';} ?> ;
<?php if($h6tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h6tipigrof['letter-spacing']).'!important';  }else{ echo '';} ?> ;
<?php if($h6tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h6tipigrof['line-height']).'!important' ;    }else{ echo '';} ?> ;
<?php if($h6tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h6tipigrof['text-decoration']).'!important'; }else{ echo '';} ?> ;
<?php if($h6tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h6tipigrof['text-transform']).'!important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $ptipigrof = ot_get_option( 'p_tipigrof', array() ); ?> 
<?php if($ptipigrof) { ?>
p{ 
<?php if($ptipigrof['font-color'])     { echo 'color:          '.esc_attr($ptipigrof['font-color']).'!important';      }else{ echo '';} ?>;
<?php if($ptipigrof['font-family'])    { echo 'font-family:    '.esc_attr($ptipigrof['font-family']).'!important';     }else{ echo '';} ?>;
<?php if($ptipigrof['font-size'])      { echo 'font-size:      '.esc_attr($ptipigrof['font-size']).'!important';       }else{ echo '';} ?>;
<?php if($ptipigrof['font-style'])     { echo 'font-style:     '.esc_attr($ptipigrof['font-style']).'!important';      }else{ echo '';} ?>;
<?php if($ptipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($ptipigrof['font-variant']).'!important';    }else{ echo '';} ?> ;
<?php if($ptipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($ptipigrof['font-weight']).'!important';     }else{ echo '';} ?> ;
<?php if($ptipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($ptipigrof['letter-spacing']).'!important';  }else{ echo '';} ?> ;
<?php if($ptipigrof['line-height'])    { echo 'line-height:    '.esc_attr($ptipigrof['line-height']).'!important' ;    }else{ echo '';} ?> ;
<?php if($ptipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($ptipigrof['text-decoration']).'!important'; }else{ echo '';} ?> ;
<?php if($ptipigrof['text-transform']) { echo 'text-transform: '.esc_attr($ptipigrof['text-transform']).'!important' ; }else{ echo '';} ?> ;
}
<?php } ?>


.navbar-brand img {
	width:<?php echo esc_attr(ot_get_option( 'groci_logo_size' )); ?>px;
}

.navbar-top, .footer-bottom{
     background: <?php echo esc_attr(ot_get_option( 'groci_top_header_bg_first' )); ?>;
     background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_top_header_bg_first' )); ?> 1%, <?php echo esc_attr(ot_get_option( 'groci_top_header_bg_second' )); ?> 100%);
     background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_top_header_bg_first' )); ?> 1%,<?php echo esc_attr(ot_get_option( 'groci_top_header_bg_second' )); ?> 100%);
     background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_top_header_bg_first' )); ?> 1%,<?php echo esc_attr(ot_get_option( 'groci_top_header_bg_second' )); ?> 100%);
     filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_top_header_bg_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_top_header_bg_second' )); ?>',GradientType=1 );
}


.navbar-top {
	background: <?php echo esc_attr(ot_get_option( 'groci_top_header_bg' )); ?> !important;
}

.navbar-top .text-white {
	color: <?php echo esc_attr(ot_get_option( 'groci_top_header_color' )); ?> !important;
}

section.footer.bg-white {
	background-color: <?php echo esc_attr(ot_get_option( 'groci_footer_bg_color' )); ?> !important;
}

.footer .klbfooterwidget a.text-dark {
	color: <?php echo esc_attr(ot_get_option( 'groci_footer_font_color' )); ?> !important;
}

nav.navbar.osahan-menu-2 {
	background: <?php echo esc_attr(ot_get_option( 'groci_bottom_header_bg' )); ?> !important;
}

nav.navbar.osahan-menu-2 .nav-link {
	color: <?php echo esc_attr(ot_get_option( 'groci_bottom_header_color' )); ?> !important;
}


.btn-secondary {
background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>; /* Old browsers */
background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%); 
background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}
	
.product-footer a.added_to_cart {
	background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>;
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}

.woocommerce-pagination span.page-numbers.current {
	background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> !important;
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}

.widget .price_slider_amount button.button {
	background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> !important;
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}
	
.ui-slider .ui-slider-handle {
	background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> !important;
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}
	
.woocommerce-tabs .tabs li.active a {
	background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> !important;
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}
	
.woocommerce-account .account-left .list-group a.is-active {
	background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> !important;
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}
	
.woocommerce-account .account-left .list-group a:hover {
	background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> !important;
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%) !important;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}
	
.osahan-menu-2 ul.navbar-nav li.active > .nav-link,
.osahan-menu-2 ul.navbar-nav li > .nav-link:hover {
    background: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>;
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?>',GradientType=1 );
}


.woocommerce-mini-cart__buttons a.button.wc-forward {
    background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
    background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
    background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_main_color_second' )); ?> 100%);
}
	
h3.widget-title {
    color: <?php echo esc_attr(ot_get_option( 'groci_main_color_first' )); ?>;
}
	
.page-link{
    color: <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>;
}	

.page-item.active .page-link{
	background: <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>; 
	background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); 
	background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?>',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
}	

.bg-dark {
	background: <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>; /* Old browsers */
	background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?>',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
}	
	
.text-secondary{
	color:<?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> !important;
}	
	
.product-body h5 {
    color: <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>;
}
	
.cart-list-product h5 a {
    color: <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>;
}
	
.list-group-item.active {
    background: <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> none repeat scroll 0 0;
    border-color: <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>;
}
	
.owl-theme .owl-controls .owl-buttons div{
	background: <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>; /* Old browsers */
	background: -moz-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%, <?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(-45deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(135deg, <?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?> 0%,<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr(ot_get_option( 'groci_second_color_first' )); ?>', endColorstr='<?php echo esc_attr(ot_get_option( 'groci_second_color_second' )); ?>',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
}

</style>
<?php }
add_action('wp_head','groci_custom_styling');

?>