<?php

/*************************************************
## Groci Sanitize
*************************************************/ 

function groci_sanitize_data( $string ) {
	$klb_allowed_tags = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array(),
				'style' => array(),
				'target' => array('_blank', '_top'),

			),
			'br' => array(),
			'em' => array(),
			'strong' => array(
				'class' => array(),
			 ),
			'div' => array(		
				  'class' => array(),
				  'id' => array(),
				  'tabindex' => array(),
				  'role' => array(),
			 ),
			'figcaption' => array(),
			'p' => array(
				'class' => array(),
			 ),
			'li' => array(
				'class' => array(),
			 ),
			'ul' => array(
				'class' => array(),
			 ),
			'span' => array(
				'class' => array(),
				'data-countdown' => array(),
				'style' => array(),
			 ),
			'h1' => array(
				'class' => array(),
			 ),
			'h2' => array(
				'class' => array(),
			 ),
			'h3' => array(
				'class' => array(),
			 ),
			'h4' => array(
				'class' => array(),
			 ),
			'h5' => array(
				'class' => array(),
			 ),			 
			'h6' => array(
				'class' => array(),
			 ),
			'i' => array(
				'class' => array(),
			 ),
			'img' => array(
				'class' => array(),
				'src' => array(),
				'width' => array(),
				'height' => array(),
				'alt' => array(),
			 ),

			 'figure' => array(
				'class' => array(),
				'data-bg-img' => array(),
			 ),
			 'del' => array(),
			 'ins' => array(),
			 'script' => array(),
			 'input' => array(
				'type' => array(),
				'name' => array(),
				'placeholder' => array(),
				'required' => array(),
				'value' => array(),
				'class' => array(),
				'id' => array(),
				'tabindex' => array(),
				'autocomplete' => array(),
			 ),
			 'button' => array(
				'class' => array(),
				'data-toggle' => array(),
				'data-target' => array(),
				'onclick' => array(),
				'aria-label' => array(),
				'data-dismiss' => array(),
			 ),
			 'form' => array(
				'class' => array(),
				'id' => array(),
				'method' => array(),
				'data-id' => array(),
				'data-name' => array(),
			 ),
			 'label' => array(
				'style' => array(),
			 ),
			 'nav' => array(
				'class' => array(),
			 ),

		);

	return wp_kses( $string, $klb_allowed_tags );
}

?>