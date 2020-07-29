<?php include_once( dirname(__FILE__).'/common_header.php' ); ?>

<style type="text/css">
	
	#AuthSettingsBox ol li {
		margin-bottom: 25px;
	}

</style>



				<form method="post" id="addAccountForm" action="<?php echo $wpl_form_action; ?>">
					<input type="hidden" name="action" value="wpla_add_account" >
                    <?php wp_nonce_field( 'wpla_add_account' ); ?>
					<input type="hidden" name="wpla_amazon_market_code" id="wpla_amazon_market_code" value="" >

					<div class="postbox" id="AddAccountBox">
						<h3 class="hndle"><span><?php echo __( 'Add Amazon Account', 'wp-lister-for-amazon' ) ?></span></h3>
						<div class="inside">

							<label for="wpla_account_title" class="text_label"><?php echo __( 'Title', 'wp-lister-for-amazon' ); ?>:</label>
							<input type="text" name="wpla_account_title" value="<?php echo @$wpla_account_title ?>" class="text_input" placeholder="Enter any name you like - for example 'Amazon US'"/>

							<label for="wpla-amazon_market_id" class="text_label"><?php echo __( 'Amazon Marketplace', 'wp-lister-for-amazon' ); ?>:</label>
							<select id="wpla-amazon_market_id" name="wpla_amazon_market_id" title="Site" class=" required-entry select">
								<option value="">-- <?php echo __( 'Please select', 'wp-lister-for-amazon' ); ?> --</option>
								<?php foreach ( $wpl_amazon_markets as $market ) : ?>
									<?php if ( in_array( $market->code, array('IN','JP','CN','BR') ) ) { continue; } ?>
									<option 
										value="<?php echo $market->id ?>" 
										<?php if ( @$wpl_text_amazon_market_id == $market->id ): ?>selected="selected"<?php endif; ?>
										<?php if ( ! $market->enabled ): ?>disabled="disabled"<?php endif; ?>
										><?php echo $market->title ?> 
										<?php if ( in_array( $market->code, array('IN','JP','CN','BR') ) ): ?>(not supported yet)<?php endif; ?>
									</option>					
								<?php endforeach; ?>
							</select>

							<div id="wpla_loading_account_fields_spinner" style="display:none; text-align: center; height: 100px; padding-top: 100px;">
								<img src="<?php echo WPLA_URL ?>/img/ajax-loader.gif"/>
							</div>

							<div id="wrap_account_details" style="display:none;">

								<div id="wrap_account_instructions_US" style="display:none; padding-left:35%;">
								<p style="padding-left:0.2em;">
									In order to add a new Amazon account to WP-Lister you need to:
									<ol>
										<li>Click on <strong>Sign in with Amazon</strong> and sign into your account as the primary user.</li>
										<li>Go to the <a href="https://sellercentral.amazon.com/apps/manage" target="_blank" id="wpla_btn_manageapps1">Manage your apps</a> page in Seller Central and click <strong>Authorize new developer</strong></li>
										<li>Enter the name <strong>WP-Lister</strong> and the Developer ID <strong>4566-1167-5522</strong>.</li>
										<li>Follow the authorization workflow until you see your seller account identifiers on the final page.</li>
										<li>Copy your <strong>Seller ID</strong> and <strong>MWS Auth Token</strong> in the fields below.</li>
										<li>Click <strong>Add new account</strong> to add the new account to WP-Lister.</li>
									</ol>
								
								</p>
								</div>

								<div id="wrap_account_instructions_EU" style="display:none; padding-left:35%;">
								<p style="padding-left:0.2em;">
									In order to add a new Amazon account to WP-Lister you need to:
									<ol>
										<li>Click on <strong>Sign in with Amazon</strong> and sign into your account as the primary user.</li>
										<li>Go to the <a href="https://sellercentral.amazon.com/apps/manage" target="_blank" id="wpla_btn_manageapps2">Manage your apps</a> page in Seller Central and click <strong>Authorize new developer</strong></li>
										<li>Enter the name <strong>WP-Lister</strong> and the Developer ID <strong>1464-3546-1406</strong>.</li>
										<li>Follow the authorization workflow until you see your seller account identifiers on the final page.</li>
										<li>Copy your <strong>Seller ID</strong> and <strong>MWS Auth Token</strong> in the fields below.</li>
										<li>Click <strong>Add new account</strong> to add the new account to WP-Lister.</li>
									</ol>
								
								</p>
								</div>

								<div id="wrap_account_instructions_AU" style="display:none; padding-left:35%;">
								<p style="padding-left:0.2em;">
									In order to add a new Amazon account to WP-Lister you need to:
									<ol>
										<li>Click on <strong>Sign in with Amazon</strong> and sign into your account as the primary user.</li>
										<li>Go to the <a href="https://sellercentral.amazon.com/apps/manage" target="_blank" id="wpla_btn_manageapps3">Manage your apps</a> page in Seller Central and click <strong>Authorize new developer</strong></li>
										<li>Enter the name <strong>WP-Lister</strong> and the Developer ID <strong>1498-4611-2787</strong>.</li>
										<li>Follow the authorization workflow until you see your seller account identifiers on the final page.</li>
										<li>Copy your <strong>Seller ID</strong> and <strong>MWS Auth Token</strong> in the fields below.</li>
										<li>Click <strong>Add new account</strong> to add the new account to WP-Lister.</li>
									</ol>
								
								</p>
								</div>

								<div id="wrap_account_instructions_AS" style="display:none; padding-left:35%;">
								<p style="padding-left:0.2em;">
									We are sorry, but WP-Lister does not currently support this Amazon marketplace. If you want to sell on this marketplace using WP-Lister, please contact support and let us know.
								</p>
								</div>

								<label for="wpla_merchant_id" class="text_label"><?php echo __( 'Seller ID', 'wp-lister-for-amazon' ); ?>:</label>
								<input type="text" name="wpla_merchant_id" id="wpla_merchant_id" value="<?php echo @$wpla_merchant_id ?>" class="text_input" placeholder="Your Seller ID should look like 'A123456BCDEFGH'" />

								<div id="wrap_account_fields_NONDEV">
									<label for="wpla_mws_auth_token" class="text_label"><?php echo __( 'MWS Auth Token', 'wp-lister-for-amazon' ); ?>:</label>
									<input type="text" name="wpla_mws_auth_token" id="wpla_mws_auth_token" value="<?php echo @$wpla_mws_auth_token ?>" class="text_input" placeholder="Your auth token should look like 'amzn.mws.abcd1234-5678-abcd-1234-abcd12345678'" />
								</div>

								<div id="wrap_account_fields_DEV" style="display:none">
									<label for="wpla_access_key_id" class="text_label"><?php echo __( 'AWS Access Key ID', 'wp-lister-for-amazon' ); ?>:</label>
									<input type="text" name="wpla_access_key_id" id="wpla_access_key_id" value="<?php echo @$wpla_access_key_id ?>" class="text_input" />

									<label for="wpla_secret_key" class="text_label"><?php echo __( 'Secret Key', 'wp-lister-for-amazon' ); ?>:</label>
									<input type="text" name="wpla_secret_key" id="wpla_secret_key" value="<?php echo @$wpla_secret_key ?>" class="text_input" />
								</div>

								<input type="hidden" name="wpla_marketplace_id" id="wpla_marketplace_id" value="<?php echo @$wpla_marketplace_id ?>" class="" />

								<p>
									<a href="#" id="wpla_btn_add_account" class="button-secondary" style="float:left;">Add new account</a>
									<a href="#" id="wpla_btn_signin" class="button-primary" style="float:right;" target="_blank">Sign in with Amazon</a>
								</p>
								<br style="clear:both" />

							</div>

						</div>
					</div>


				</form>


	<div id="debug_output" style="display:none">
		<?php // echo "<pre>";print_r($wpl_amazon_accounts);echo"</pre>"; ?>
	</div>

	<script type="text/javascript">

		function wpla_load_market_details( market_id ) {
	
	        // load market details
	        var params = {
	            action: 'wpla_load_market_details',
	            market_id: market_id,
	            _wpnonce: wpla_JobRunner_i18n.wpla_ajax_nonce
	        };
	        var jqxhr = jQuery.getJSON( ajaxurl, params )
	        .success( function( response ) { 

	            jQuery('#wpla_amazon_market_code').attr( 'value', response.code );
	            jQuery('#wpla_marketplace_id'    ).attr( 'value', response.marketplace_id );
	            jQuery('#wpla_btn_signin'        ).attr( 'href',  response.signin_url );
	            jQuery('#wpla_btn_manageapps1'   ).attr( 'href',  response.signin_url );
	            jQuery('#wpla_btn_manageapps2'   ).attr( 'href',  response.signin_url );
	            jQuery('#wpla_btn_manageapps3'   ).attr( 'href',  response.signin_url );

	            // show fields and instructions depending on region
	            if ( response.region_code == 'NA' ){
					jQuery('#wrap_account_instructions_US').show();	// America
					jQuery('#wrap_account_instructions_EU').hide();
					jQuery('#wrap_account_instructions_AU').hide();
					jQuery('#wrap_account_instructions_AS').hide();
					jQuery('#wrap_account_fields_DEV'     ).hide();
					jQuery('#wrap_account_fields_NONDEV'  ).show();
	            } else if ( response.region_code == 'EU' ){
					jQuery('#wrap_account_instructions_US').hide(); // Europe
					jQuery('#wrap_account_instructions_EU').show();
					jQuery('#wrap_account_instructions_AU').hide();
					jQuery('#wrap_account_instructions_AS').hide();
					jQuery('#wrap_account_fields_DEV'     ).hide();
					jQuery('#wrap_account_fields_NONDEV'  ).show();
	            } else if ( response.code == 'AU' ){
					jQuery('#wrap_account_instructions_US').hide(); // Australia
					jQuery('#wrap_account_instructions_EU').hide();
					jQuery('#wrap_account_instructions_AU').show();
					jQuery('#wrap_account_instructions_AS').hide();
					jQuery('#wrap_account_fields_DEV'     ).hide();
					jQuery('#wrap_account_fields_NONDEV'  ).show();
	            } else {
					jQuery('#wrap_account_instructions_US').hide();	// unsupported sites - Asia/Pacific, India, Brazil
					jQuery('#wrap_account_instructions_EU').hide();
					jQuery('#wrap_account_instructions_AU').hide();
					jQuery('#wrap_account_instructions_AS').show();
					jQuery('#wrap_account_fields_DEV'     ).hide();
					jQuery('#wrap_account_fields_NONDEV'  ).hide();
	            }

				jQuery('#wpla_loading_account_fields_spinner').slideUp(300);
				jQuery('#wrap_account_details').slideDown(300);

	        })
	        .error( function(e,xhr,error) { 
	            // alert( "There was a problem fetching the job list. The server responded:\n\n" + e.responseText ); 
	            console.log( "error", xhr, error ); 
	            console.log( e.responseText ); 
	            jQuery('#debug_output').html( e.responseText );
	        });

		}

		jQuery( document ).ready(
			function () {
		
				// amazon site selector during install: submit form on selection
				jQuery('#AddAccountBox #wpla-amazon_market_id').change( function(event, a, b) {					

					var market_id = event.target.value;
					if ( market_id ) {

						jQuery('#wrap_account_details').slideUp(300);						
						jQuery('#wpla_loading_account_fields_spinner').slideDown(300);						

						wpla_load_market_details( market_id );

					} else {
						jQuery('#wrap_account_details').slideUp(300);						
					}
					
				});

				// add new account button
				jQuery('#wpla_btn_add_account').click( function() {					
					jQuery('#addAccountForm').first().submit();
					return false;
				});

				// confirm delete
				// jQuery('#delete_account').click( function() {					
				// 	return confirm('Do you really want to do this?');				
				// });

			}
		);
	
	</script>
