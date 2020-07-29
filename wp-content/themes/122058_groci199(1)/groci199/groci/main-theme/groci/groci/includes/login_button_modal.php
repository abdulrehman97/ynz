<div class="modal fade login-modal-main" id="bd-example-modal">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="login-modal">
					<div class="row">
						<div class="col-lg-6 pad-right-0">
							<?php if(ot_get_option('groci_login_button_image')){ ?>
								<div class="login-modal-left"></div>
							<?php } ?>
						</div>
						<div class="col-lg-6 pad-left-0">
							<button type="button" class="close close-top-right" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"><i class="mdi mdi-close"></i></span>
								<span class="sr-only"><?php esc_html_e('Close','groci'); ?></span>
							</button>
					
								<div class="login-modal-right">
									<div class="tab-content">
										<div class="tab-pane active" id="login" role="tabpanel">
											<?php if(!is_user_logged_in()) { ?>
												<h5 class="heading-design-h5"><?php echo esc_html(ot_get_option('groci_login_button_title')); ?></h5>
											<?php } ?>
											<?php echo do_shortcode('[login-with-ajax template="divs-only"]'); ?>
										</div>
									</div>
								</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>