(function ($) {
  "use strict";

	$(document).ready(function () {
 
	// ===========Category Owl Carousel============
    var objowlcarousel = $(".owl-carousel-category");
    if (objowlcarousel.length > 0) {
        objowlcarousel.owlCarousel({
            items: productcategory.displayitem,
            lazyLoad: true,
            pagination: false,
			 loop: true,
            autoPlay: productcategory.autoplay,
            navigation: true,
            stopOnHover: true,
			navigationText: ["<i class='mdi mdi-chevron-left'></i>", "<i class='mdi mdi-chevron-right'></i>"]
        });
    }

	});

})(jQuery);
