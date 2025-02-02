/***********************************************
 * Navbar
 ***********************************************/
(function($) {

	'use strict';

	var navbarMain = $('.vlt-navbar--main');

	// sticky navbar
	var navbarHeight = navbarMain.length ? navbarMain.offset().top : 0;

	// fake navbar
	var navbarFake = $('<div class="vlt-fake-navbar">').hide();

	function _fixed_navbar() {
		navbarMain.addClass('vlt-navbar--fixed');
		navbarFake.show();
	}

	function _unfixed_navbar() {
		navbarMain.removeClass('vlt-navbar--fixed');
		navbarFake.hide();
	}

	function _on_scroll_navbar() {
		if (VLTJS.window.scrollTop() >= navbarHeight) {
			_fixed_navbar();
		} else {
			_unfixed_navbar();
		}
	}

	if (navbarMain.hasClass('vlt-navbar--sticky')) {

		VLTJS.window.on('scroll resize', _on_scroll_navbar);

		_on_scroll_navbar();

		// append fake navbar
		navbarMain.after(navbarFake);

		// fake navbar height after resize
		navbarFake.height(navbarMain.innerHeight());

		VLTJS.debounceResize(function() {
			navbarFake.height(navbarMain.innerHeight());
		});

	}

	// hide navbar on scroll

	var navbarHideOnScroll = navbarMain.filter('.vlt-navbar--hide-on-scroll');

	VLTJS.throttleScroll(function(type, scroll) {
		var start = 450;

		function _show_navbar() {
			navbarHideOnScroll.removeClass('vlt-on-scroll-hide').addClass('vlt-on-scroll-show');
		}

		function _hide_navbar() {
			navbarHideOnScroll.removeClass('vlt-on-scroll-show').addClass('vlt-on-scroll-hide');
		}

		// hide or show
		if (type === 'down' && scroll > start) {
			_hide_navbar();
		} else if (type === 'up' || type === 'end' || type === 'start') {
			_show_navbar();
		}

		// add solid color
		if (navbarMain.hasClass('vlt-navbar--transparent') && navbarMain.hasClass('vlt-navbar--sticky')) {
			scroll > navbarMain.height() ? navbarMain.addClass('vlt-navbar--solid') : navbarMain.removeClass('vlt-navbar--solid');
		}
	});

	// onepage active menu item
	if (VLTJS.html.hasClass('vlt-is--onepage-navigation')) {
		var sections = {},
			scrollThreshold = 0.5,
			parent = null,
			linkHref = null,
			topPos = null,
			target = null;

		$('.vlt-onepage-nav > li').each(function(i) {
			linkHref = $(this).find('a').attr('href').split('#')[1];
			target = $('#' + linkHref);

			if (target.length) {
				topPos = target.offset().top;
				sections[linkHref] = Math.round(topPos);
			}
		});

		function _get_section(windowPos) {
			var value = null,
				windowHeight = Math.round(VLTJS.window.height() * scrollThreshold);

			for (var section in sections) {
				if ((sections[section] - windowHeight) < windowPos) {
					value = section;
				}
			}
			return value;

		}

		function _toggle_active_class(parent) {
			$('.vlt-onepage-nav > li').removeClass('current-menu-item');
			parent.addClass('current-menu-item');
		}

		VLTJS.window.on('scroll', function() {
			var windowTop = VLTJS.window.scrollTop(),
				position = _get_section(windowTop);

			if (position !== null) {
				parent = $('.vlt-onepage-nav > li').find('a[href$="#' + position + '"]').parent('li');

				if (!parent.hasClass('current-menu-item')) {
					_toggle_active_class(parent);
				}
			}
		});
	}

})(jQuery);

/***********************************************
 * Header default
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superfish == 'undefined') {
		return;
	}

	$('.vlt-header--default ul.sf-menu:not(.vlt-onepage-nav)').superfish({
		delay: 0,
		speed: 300,
		speedOut: 300,
		cssArrows: false,
		animation: {
			opacity: 'show',
			marginTop: '0',
			visibility: 'visible'
		},
		animationOut: {
			opacity: 'hide',
			marginTop: '10px',
			visibility: 'hidden'
		}
	});

})(jQuery);

/***********************************************
 * Header fullscreen
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superclick == 'undefined') {
		return;
	}

	var menu = $('.vlt-fullscreen-navigation ul.sf-menu:not(.vlt-onepage-nav)'),
		menuOpen = $('#vlt-fullscreen-menu-open'),
		menuClose = $('#vlt-fullscreen-menu-close'),
		onepageMenu = $('.vlt-is--onepage-navigation'),
		menuIsOpen = false;

	menu.superclick({
		delay: 500,
		cssArrows: false,
		animation: {
			opacity: 'show',
			height: 'show'
		},
		animationOut: {
			opacity: 'hide',
			height: 'hide'
		},
	});

	function _close_menu() {
		$('.vlt-fullscreen-navigation-holder').removeClass('is-open');
		if (typeof VLT_MENU_TOGGLE_SOUND_CDATA != 'undefined' && typeof Howl != 'undefined') {
			new Howl({
				src: [VLT_MENU_TOGGLE_SOUND_CDATA.close],
				autoplay: true,
				loop: false,
				volume: 0.4
			});
		}
		menuIsOpen = false;
	}

	function _open_menu() {
		$('.vlt-fullscreen-navigation-holder').addClass('is-open');
		if (typeof VLT_MENU_TOGGLE_SOUND_CDATA != 'undefined' && typeof Howl != 'undefined') {
			new Howl({
				src: [VLT_MENU_TOGGLE_SOUND_CDATA.open],
				autoplay: true,
				loop: false,
				volume: 0.4
			});
		}
		menuIsOpen = true;
	}

	menuOpen.on('click', function(e) {
		e.preventDefault();
		if (!menuIsOpen) {
			_open_menu();
		} else {
			_close_menu();
		}
	});

	menuClose.on('click', function(e) {
		e.preventDefault();
		_close_menu();
	});

	onepageMenu.on('click', 'ul.sf-menu.vlt-onepage-nav a', function(e) {
		e.preventDefault();
		_close_menu();
	});

})(jQuery);

/***********************************************
 * Header slide
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superclick == 'undefined') {
		return;
	}

	var menu = $('.vlt-slide-navigation ul.sf-menu:not(.vlt-onepage-nav)'),
		menuOpen = $('#vlt-slide-menu-open'),
		menuClose = $('#vlt-slide-menu-close'),
		navbarOverlay = $('.vlt-navbar-overlay'),
		onepageMenu = $('.vlt-is--onepage-navigation'),
		menuIsOpen = false;

	menu.superclick({
		delay: 500,
		cssArrows: false,
		animation: {
			opacity: 'show',
			height: 'show'
		},
		animationOut: {
			opacity: 'hide',
			height: 'hide'
		},
	});

	function _close_menu() {
		navbarOverlay.fadeOut(150);
		$('.vlt-slide-navigation-holder').removeClass('is-open');
		if (typeof VLT_MENU_TOGGLE_SOUND_CDATA != 'undefined' && typeof Howl != 'undefined') {
			new Howl({
				src: [VLT_MENU_TOGGLE_SOUND_CDATA.close],
				autoplay: true,
				loop: false,
				volume: 0.4
			});
		}
		menuIsOpen = false;
	}

	function _open_menu() {
		navbarOverlay.fadeIn(150);
		$('.vlt-slide-navigation-holder').addClass('is-open');
		if (typeof VLT_MENU_TOGGLE_SOUND_CDATA != 'undefined' && typeof Howl != 'undefined') {
			new Howl({
				src: [VLT_MENU_TOGGLE_SOUND_CDATA.open],
				autoplay: true,
				loop: false,
				volume: 0.4
			});
		}
		menuIsOpen = true;
	}

	menuOpen.on('click', function(e) {
		e.preventDefault();
		if (!menuIsOpen) {
			_open_menu();
		} else {
			_close_menu();
		}
	});

	menuClose.on('click', function(e) {
		e.preventDefault();
		_close_menu();
	});

	navbarOverlay.on('click', function(e) {
		e.preventDefault();
		_close_menu();
	});

	onepageMenu.on('click', 'ul.sf-menu.vlt-onepage-nav a', function(e) {
		e.preventDefault();
		_close_menu();
	});

})(jQuery);

/***********************************************
 * Header aside
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superclick == 'undefined') {
		return;
	}

	$('.vlt-header--aside ul.sf-menu:not(.vlt-onepage-nav)').superclick({
		delay: 500,
		cssArrows: false,
		animation: {
			opacity: 'show',
			height: 'show'
		},
		animationOut: {
			opacity: 'hide',
			height: 'hide'
		},
	});

})(jQuery);

/***********************************************
 * Header mobile
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superclick == 'undefined') {
		return;
	}

	var menu = $('.vlt-mobile-navigation'),
		menuToggle = $('#vlt-mobile-menu-toggle'),
		onepageMenu = $('.vlt-is--onepage-navigation'),
		menuIsOpen = false;

	function _open_menu() {
		menu.slideDown();
		menuToggle.addClass('vlt-menu-burger--opened');
		menuIsOpen = true;
	}

	function _close_menu() {
		menu.slideUp();
		menuToggle.removeClass('vlt-menu-burger--opened');
		menuIsOpen = false;
	}

	menu.find('ul.sf-menu:not(.vlt-onepage-nav)').superclick({
		delay: 500,
		cssArrows: false,
		animation: {
			opacity: 'show',
			height: 'show'
		},
		animationOut: {
			opacity: 'hide',
			height: 'hide'
		},
	});

	menuToggle.on('click', function(e) {
		e.preventDefault();

		if (!menuIsOpen) {
			_open_menu();
		} else {
			_close_menu();
		}

	});

	onepageMenu.on('click', 'ul.sf-menu.vlt-onepage-nav a', function(e) {
		e.preventDefault();
		_close_menu();
	});

})(jQuery);