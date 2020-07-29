<?php
/**
 * searchform.php
 * @package WordPress
 * @subpackage groci
 * @since groci 1.0
 * 
 */
 ?>
<form id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<div class="input-group">
	   <input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search For', 'groci') ?>" class="form-control" autocomplete="off">
	   <div class="input-group-append">
		  <button type="submit" class="btn btn-secondary"><?php esc_html_e('Search','groci'); ?> <i class="mdi mdi-arrow-right"></i></button>
	   </div>
	</div>
</form>
