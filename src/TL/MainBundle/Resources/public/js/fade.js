jQuery(document).ready(function () {
	/*=================================== FADE EFFECT ===================================*/
	if (jQuery.browser.msie && jQuery.browser.version < 7) return; /* Don't execute code if it's IE6 or below cause it doesn't support it. */
	
	// Fade image 
	
	jQuery('.if-pf-container li .if-pf-img, .flexslider-carousel li .if-pf-img').mouseenter(function(){
		jQuery(this).find('div.rollover').stop().animate({"opacity":0.75}, 500, 'easeOutCubic');
		jQuery(this).find('a.image').stop().animate({"left":"50%","opacity":0.90}, 500, 'easeOutCubic');
		jQuery(this).find('a.zoom').stop().animate({"left":"50%","opacity":0.90}, 500, 'easeOutCubic');
	});
	jQuery('.if-pf-container li .if-pf-img, .flexslider-carousel li .if-pf-img').mouseleave(function(){
		jQuery(this).find('div.rollover').stop().animate({"opacity":0}, 500, 'easeOutCubic');
		jQuery(this).find('a.image').stop().animate({"left":"-10%","opacity":0}, 500, 'easeOutCubic');
		jQuery(this).find('a.zoom').stop().animate({"left":"110%","opacity":0}, 500, 'easeOutCubic');
	});
	
	/*=================================== PRETTYPHOTO ===================================*/
	jQuery('a[data-rel]').each(function() {jQuery(this).attr('rel', jQuery(this).data('rel'));});
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',gallery_markup:'',slideshow:2000});
	jQuery('.flexslider-carousel').flexslider({
		animation: "slide",
		animationLoop: true,
		directionNav: true,
		controlNav: false,
		itemWidth: 197,
		itemMargin: 0,
		minItems: 2,
		maxItems: 4
	  });
});