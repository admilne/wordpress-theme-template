jQuery(function() {
	var	pull		= jQuery('#pull');
	    menu 		= jQuery('#main-menu');
		menuHeight	= menu.height();


	// Display menu if hamburger icon is clicked
	jQuery(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});

	// Close menu if menu is open and you have clicked outside of the menu
	jQuery(document).click(function(e) {
		// if the hamburger menu is displayed AND
		// if you havent clicked on the hamburger menu AND
		// if you havent clicked on a menu item
		if ( pull.css('display') === 'block' && ! jQuery(e.target).hasClass('pull') && ! jQuery(e.target).parent().hasClass('menu-item')) {
			menu.slideUp();
		}
	});

	// Make sure the menu isn't hidden if you resize to desktop view
	jQuery( window ).resize(function() {
		if ( pull.css('display') === 'none') {
			menu.removeAttr('style');
		}
	});

});