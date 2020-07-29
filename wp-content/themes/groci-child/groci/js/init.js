jQuery.noConflict();
(function($) {
    "use strict";

jQuery(document).ready(function($){
	
/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/
	
	$('#post-formats-select input').change(checkFormat);
	$('.rwmb-input input').change(checkFormat);
	
	function checkFormat(){
		var format = $('#post-formats-select input:checked').attr('value');

		var format1 = $('#pagesettings input:checked').attr('value');
				
		//only run on the posts page
		if(typeof format != 'undefined'){
			
			$('#post-body div[id^=klb-blogmeta-]').hide();
			$('#post-body #klb-blogmeta-'+format+'').stop(true,true).fadeIn(500);
			
			$('#post-body div[id^=klb_project_]').hide();
			$('#post-body #klb_project_'+format+'').stop(true,true).fadeIn(500);
					
		}


		if(typeof format1 != 'undefined'){
			
			$('#post-body div[id^=onepage_menu_true]').hide();
			$('#post-body #onepage_menu_'+format1+'').stop(true,true).fadeIn(500);
					
		}		
	}
	
	$(window).load(function(){
		checkFormat();
	})

});

})(jQuery); // End of use strict