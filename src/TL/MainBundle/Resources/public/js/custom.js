jQuery(document).ready(function(){
	
	/*Add Class Js to html*/
	jQuery('html').addClass('js');	
								
    jQuery('#cookieAccepted').click(function() {
        
        document.cookie = "cookieAccepted=1;expires=Sat, 16 May 2999 18:40:22 GMT;" 
        jQuery(this).parent().hide();

    });

	/*=================================== MENU ===================================*/
    jQuery("ul.sf-menu").supersubs({ 
    minWidth		: 12,		/* requires em unit. */
    maxWidth		: 15,		/* requires em unit. */
    extraWidth		: 0	/* extra width can ensure lines don't sometimes turn over due to slight browser differences in how they round-off values */
                           /* due to slight rounding differences and font-family */
    }).superfish();  /* 
						call supersubs first, then superfish, so that subs are 
                        not display:none when measuring. Call before initialising 
                        containing tabs for same reason. 
					 */
					 
	/* ==== Mobile Menu ==== */				 
	/* prepend menu icon */
	jQuery('section#navigation nav').prepend('<div id="menu-icon">Menu</div>');
	
	/* toggle nav */
	jQuery("#menu-icon").click( function(){
		if(jQuery("#topnav").hasClass("navmobile")){
			jQuery("#topnav").removeClass("navmobile");
			jQuery("#topnav").css('display','none');
		}else{
			jQuery("#topnav").addClass("navmobile");
			jQuery("#topnav").css('display','block');
		}
		jQuery(this).toggleClass("active");
	});
	

	
	/*=================================== TABS AND TOGGLE ===================================*/
	/*jQuery tab */
	jQuery(".tab-content").hide(); /* Hide all content */
	jQuery("ul.tabs li:first").addClass("active").show(); /* Activate first tab */
	jQuery(".tab-content:first").show(); /* Show first tab content */
	/* On Click Event */
	jQuery("ul.tabs li").click(function() {
		jQuery("ul.tabs li").removeClass("active"); /* Remove any "active" class */
		jQuery(this).addClass("active"); /* Add "active" class to selected tab */
		jQuery(".tab-content").hide(); /* Hide all tab content */
		var activeTab = jQuery(this).find("a").attr("href"); /* Find the rel attribute value to identify the active tab + content */
		jQuery(activeTab).fadeIn(200); /* Fade in the active content */
		return false;
	});
	
	/*jQuery toggle*/
	jQuery(".toggle_container").hide();
	var isiPhone = /iphone/i.test(navigator.userAgent.toLowerCase());
	if (isiPhone){
		jQuery("h2.trigger").click(function(){
			if( jQuery(this).hasClass("active")){
				jQuery(this).removeClass("active");
				jQuery(this).next().css('display','none');
			}else{
				jQuery(this).addClass("active");
				jQuery(this).next().css('display','block');
			}
		});
	}else{
		jQuery("h2.trigger").click(function(){
			jQuery(this).toggleClass("active").next().slideToggle("slow");
		});
	}
	

	/*=================================== SOCIAL ICON ===================================*/
	jQuery('ul.sn li a').hover(
		function() {
			var iconimg = jQuery(this).children();
			iconimg.stop(true,true);
			iconimg.fadeOut(500);
		},
		function() {
			var iconimg = jQuery(this).children();
			iconimg.stop(true,true);
			iconimg.fadeIn(500);
		}
	)


});
