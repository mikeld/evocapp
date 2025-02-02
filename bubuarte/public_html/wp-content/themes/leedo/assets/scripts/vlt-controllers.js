/***********************************************
 * Audio player
 ***********************************************/
(function($) {

	'use strict';

	var element = $('.vlt-audio-player');

	element.each(function() {
		var $this = $(this),
			playButton = $this.find('.vlt-audio-player__button > a'),
			isPlayed = false;

		playButton.on('click', function(e) {
			e.preventDefault();

			var clickedButton = $(this),
				clickedButtonIcon = clickedButton.find('i'),
				mejsButton = clickedButton.parents('.vlt-audio-player').find('.mejs-playpause-button');

			element.find('.vlt-audio-player__button i').removeClass('leedo-pause-button').addClass('leedo-play-button');

			if (mejsButton.hasClass('mejs-play')) {
				clickedButtonIcon.removeClass('leedo-play-button').addClass('leedo-pause-button');
				mejsButton.trigger('click');
			} else if (mejsButton.hasClass('mejs-pause')) {
				clickedButtonIcon.removeClass('leedo-pause-button').addClass('leedo-play-button');
				mejsButton.trigger('click');
			}

		});
	});

})(jQuery);
/***********************************************
 * Countdown
 ***********************************************/
(function($) {

	'use strict';


	// check if plugin defined
	if (typeof $.fn.countdown == 'undefined') {
		return;
	}

	// check if object defined
	if (typeof VLT_COUNTDOWN_CDATA == 'undefined') {
		return;
	}

	$('.vlt-countdown').each(function() {
		var $this = $(this),
			final_date = $this.data('final-date');

		$this.countdown(final_date, function(e) {
			$(this).html(e.strftime(''
				+ '<div><strong>%-D</strong><h5>' + VLT_COUNTDOWN_CDATA.days + '</h5></div>'
				+ '<div><strong>%H</strong><h5>' + VLT_COUNTDOWN_CDATA.hours + '</h5></div>'
				+ '<div><strong>%M</strong><h5>' + VLT_COUNTDOWN_CDATA.minutes + '</h5></div>'
				+ '<div><strong>%S</strong><h5>' + VLT_COUNTDOWN_CDATA.seconds + '</h5></div>'
			));
		});

	});

})(jQuery);
/***********************************************
 * Counter up
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof anime == 'undefined') {
		return;
	}

	$('.vlt-counter-up').each(function() {

		var $duration = 1500,
			$delay = 150;

		$(this).one('inview', function() {
			var $this = $(this),
				finalValue = $this.data('value') || 0,
				finalValueContainer = $this.find('strong'),
				obj = {
					count: 0
				};

			anime({
				targets: obj,
				count: finalValue,
				round: 1,
				easing: 'linear',
				duration: $duration,
				delay: $delay,
				update: function() {
					finalValueContainer.text(obj.count);
				}
			});
		});
	});

})(jQuery);
/***********************************************
 * FAQ
 ***********************************************/
(function($) {

	'use strict';

	$('.vlt-faq-container').each(function() {
		var container = $(this),
			item = container.find('.vlt-faq-item');

		item.eq(0).addClass('vlt-faq-item--active');

		item.on('click', '.vlt-faq-item__header', function() {
			var $this = $(this),
				parentItem = $this.parent('.vlt-faq-item'),
				content = parentItem.find('.vlt-faq-item__content');

			if (parentItem.hasClass('vlt-faq-item--active')) {
				return;
			}

			item.removeClass('vlt-faq-item--active');
			parentItem.addClass('vlt-faq-item--active');

			item.find('.vlt-faq-item__content').slideUp(300);
			content.slideDown(300);
		});

	});

})(jQuery);
/***********************************************
 * Fit text
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.fitText == 'undefined') {
		return;
	}

	function fit_text() {
		$('.vlt-fittext').each(function() {
			var $this = $(this),
				compressor = $this.data('comp-rate') || 1;

			$this.fitText(compressor, {
				minFontSize: $this.data('min-size') || Number.NEGATIVE_INFINITY,
				maxFontSize: $this.data('max-size') || Number.POSITIVE_INFINITY
			});
		});
	}

	VLTJS.window.trigger('resize');

	fit_text();
	VLTJS.debounceResize(fit_text);

})(jQuery);

/***********************************************
 * Fit image
 ***********************************************/
(function($) {

	'use strict';

	function fit_image() {
		$('.vlt-fit-image').each(function() {
			var $this = $(this),
				sizeMD = $this.data('size-md') || '100%',
				sizeSM = $this.data('size-sm') || $this.data('size-md') || '100%',
				wndW = VLTJS.window.width();

			if (wndW <= 767) {
				$this.css('padding-top', sizeSM);
			} else {
				$this.css('padding-top', sizeMD);
			}
		});
	}

	fit_image();
	VLTJS.debounceResize(fit_image);

})(jQuery);
/***********************************************
 * Audio link
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Howl == 'undefined') {
		return;
	}

	function audio_link() {

		$('.vlt-audio-link').each(function() {
			var $this = $(this),
				audioSrc = $this.attr('href') || '',
				audioAutoplay = $this.data('audio-autoplay') || false,
				audioLoop = $this.data('audio-loop') || false,
				audioVolume = $this.data('audio-volume') || 0.5;

			var audio = new Howl({
				src: [audioSrc],
				autoplay: audioAutoplay,
				loop: audioLoop,
				volume: audioVolume,
				onplay: function() {
					$this.removeClass('pause').addClass('play');
				},
				onpause: function() {
					$this.removeClass('play').addClass('pause');
				}
			});

			if ($this.filter('.play')) {
				$this.find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			}

			$this.on('click', function(e) {
				e.preventDefault();
				var currentButton = $(this),
					icon = currentButton.find('i');
				if (currentButton.hasClass('pause')){
					icon.removeClass('fa-play-circle').addClass('fa-pause-circle');
					audio.play();
				} else {
					icon.removeClass('fa-pause-circle').addClass('fa-play-circle');
					audio.pause();
				}
			});

		});

	}

	VLTJS.window.on('vlt.preloader_done', function() {
		audio_link();
	});

})(jQuery);
/***********************************************
 * Footer fixed effect
 ***********************************************/
(function($) {

	'use strict';

	function fixed_footer() {
		var footer = $('.vlt-footer').filter('.vlt-footer--fixed'),
			siteWrapperInner = $('.vlt-site-wrapper__inner'),
			footerHeight = footer.outerHeight();

		siteWrapperInner.css({
			'margin-bottom': footerHeight
		});
	}

	fixed_footer();
	VLTJS.debounceResize(fixed_footer);

})(jQuery);
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
/***********************************************
 * Marquee element
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof anime == 'undefined') {
		return;
	}

	$('.vlt-marquee').each(function() {
		var $this = $(this),
			direction = $this.data('direction') || 'normal',
			duration = $this.data('duration') || 10000;

		if ($this.find('.vlt-marquee__item--copy').length) {
			duration = duration * 2;
		}

		var marqueeInfiniteOriginal = anime({
			targets: $this.find('.vlt-marquee__item--original')[0],
			autoplay: true,
			translateX: [{
					value: '0%',
					delay: 0,
					duration: 0
				},
				{
					value: '-100%',
					delay: 0,
					duration: duration
				},
				{
					value: '100%',
					delay: 0,
					duration: 0
				},
				{
					value: '0%',
					delay: 0,
					duration: duration
				}
			],
			direction: direction,
			loop: true,
			delay: 0,
			easing: 'linear'
		});

		var marqueeInfiniteCopy = anime({
			targets: $this.find('.vlt-marquee__item--copy')[0],
			autoplay: true,
			translateX: [{
					value: '100%',
					delay: 0,
					duration: 0
				},
				{
					value: '0%',
					delay: 0,
					duration: duration
				},
				{
					value: '-100%',
					delay: 0,
					duration: duration
				},
				{
					value: '100%',
					delay: 0,
					duration: 0
				},
			],
			direction: direction,
			loop: true,
			easing: 'linear'
		});

	});

})(jQuery);
/***********************************************
 * Init third party scripts
 ***********************************************/
(function($) {

	'use strict';

	// Comments GDPR
	if ($('input[type="checkbox"][name="gdpr_terms"]:not(.activated), .wpcf7-acceptance input[type="checkbox"]:not(.activated), .vlt-subscribe-form__checkbox input[type="checkbox"]:not(.activated)').length) {
		$('input[type="checkbox"][name="gdpr_terms"]:not(.activated), .wpcf7-acceptance input[type="checkbox"]:not(.activated), .vlt-subscribe-form__checkbox input[type="checkbox"]:not(.activated)')
			.addClass('activated')
			.on('change', function(e) {
				if ($(this).get(0).checked) {
					$(this).parents('form').find('.vlt-btn').removeClass('disabled');
				} else {
					$(this).parents('form').find('.vlt-btn').addClass('disabled');
				}
			}).trigger('change');
	}

	// Jarallax
	if (typeof $.fn.jarallax !== 'undefined') {
		$('.jarallax').jarallax({
			speed: 0.8
		});
	}

	if (typeof $.fn.imagesLoaded !== 'undefined' || typeof $.fn.jarallax !== 'undefined') {
		VLTJS.body.imagesLoaded(function() {
			setTimeout(function() {
				$('[data-jarallax-element]').jarallax('onResize').jarallax('onScroll');
			}, 150);
		});
	}

	// Equal height
	if (typeof $.fn.matchHeight !== 'undefined') {
		function vlthemes_equal_height() {
			setTimeout(function() {
				$('.vc_row .vlt-services-box, .vc_row .vlt-services').matchHeight();
			}, 100);
		}
		vlthemes_equal_height();
		VLTJS.debounceResize(vlthemes_equal_height);
	}

	// Fitvids
	if (typeof $.fn.fitVids !== 'undefined') {
		VLTJS.body.fitVids();
	}

	// Widget menu
	if (typeof $.fn.superclick !== 'undefined') {
		$('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
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
	}

	// Fancybox
	if (typeof $.fn.fancybox !== 'undefined') {
		$().fancybox({
			selector: '[data-fancybox]',
			animationEffect: 'fade',
			transitionEffect: 'slide',
			infobar: false,
			buttons: [
				'close'
			],
			btnTpl: {
				close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' +
					'<span><i class="leedo-close"></i></span>' +
					'</button>',
				arrowLeft: '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" href="javascript:;">' +
					'<span><i class="leedo-left-arrow"></i></span>' +
					'</a>',
				arrowRight: '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" href="javascript:;">' +
					'<span><i class="leedo-right-arrow"></i></span>' +
					'</a>'
			}
		});
	}

	// Remove p / br tags from contact form 7
	$('.wpcf7-form').find('p').contents().unwrap();
	$('.wpcf7-form').find('p, br').remove();

	// Sticky sidebar
	if (typeof $.fn.imagesLoaded !== 'undefined' || typeof $.fn.theiaStickySidebar !== 'undefined') {
		VLTJS.body.imagesLoaded(function() {
			var adminBarHeight = $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;
			var stickyHeaderHeight = $('.vlt-header.headroom').length ? $('.vlt-header.headroom').outerHeight() : 0;
			$('.vlt-column-sticky-content, .vlt-column-sticky-sidebar').theiaStickySidebar({
				additionalMarginTop: 60 + adminBarHeight + stickyHeaderHeight,
				additionalMarginBottom: 60
			});
			$('.vlt-shortcode-column-sticky-sidebar').theiaStickySidebar({
				containerSelector: '.vlt-shortcode-column-sticky-wrap',
				additionalMarginTop: 60 + adminBarHeight + stickyHeaderHeight,
				additionalMarginBottom: 60
			});
		});
	}

	// Fast click
	if (typeof FastClick === 'function') {
		FastClick.attach(document.body);
	}

	// Masonry blog
	$('.masonry').vlt_masonry_grid();
	VLTJS.document.on('vlt.loaded_more', function() {
		$('.masonry').vlt_masonry_grid();
	});

	// AJAX load more button
	$('.vlt-blog-posts--load-more_pagination').vlt_ajax_load_more_button();
	$('.vlt-products-list--load-more_pagination').vlt_ajax_load_more_button();

	// Quantity Woo
	VLTJS.document.on('click', '.vlt-quantity .plus, .vlt-quantity .minus', function(){
		var $this = $(this),
			$qty = $this.siblings('.qty'),
			current = parseInt($qty.val(), 10),
			min = parseInt($qty.attr('min'), 10),
			max = parseInt($qty.attr('max'), 10),
			step = parseInt($qty.attr('step'), 10);

		min = min ? min : 1;
		max = max ? max : current + step;

		if ($this.hasClass('minus') && current > min) {
			$qty.val(current - step);
			$qty.trigger('change');
		}

		if ($this.hasClass('plus') && current < max) {
			$qty.val(current + step);
			$qty.trigger('change');
		}

		return false;
	});

	// Fix particles on single product page
	if (typeof $.fn.jarallax !== 'undefined') {
		VLTJS.body.on('click', '.wc-tabs li a', function() {
			setTimeout(function() {
				$('[data-jarallax-element]').jarallax('onResize').jarallax('onScroll');
			}, 10);
		});
	}

})(jQuery);
/***********************************************
 * Page social links
 ***********************************************/
(function($) {

	'use strict';

	var $element = $('.vlt-fixed-social-links');

	if (!$element.length) {
		return;
	}

	VLTJS.window.on('scroll resize', function() {

		$('.vlt-main').each(function() {
			var $this = $(this),
				sT = VLTJS.window.scrollTop(),
				thisH = $this.outerHeight(),
				oT = $this.offset().top,
				winH = VLTJS.window.height() / 2;

			if (sT >= winH && sT <= thisH + oT - winH) {
				$element.removeClass('is-hidden').addClass('is-visible');
			} else {
				$element.removeClass('is-visible').addClass('is-hidden');
			}
		});

	});

})(jQuery);
/***********************************************
 * Portfolio hover effect
 ***********************************************/
(function($) {

	'use strict';

	if (!$('div[data-vp-items-style="leedo_work_style_3"]').length) {
		return;
	}

	function portfolio_hover_effect() {

		$('div[data-vp-items-style="leedo_work_style_3"]').append('<div class="js-caption"><h4></h4></div>');

		var $portfolioGrid = $('.vp-portfolio__items-style-leedo_work_style_3'),
			$jsCaption = $('.js-caption'),
			$jsCaptionTitle = $jsCaption.find('h4');

		$portfolioGrid.on('mousemove', function(e) {
			$jsCaption.css({
				top: e.clientY,
				left: e.clientX
			});
		});

		$portfolioGrid.find('.vp-portfolio__item-overlay').on({
			mouseenter: function() {
				$jsCaption.removeClass('js-caption--active');
				$jsCaptionTitle.text($(this).find('.vp-portfolio__item-meta-title').text());
				$jsCaption.addClass('js-caption--active');
			},
			mouseleave: function() {
				$jsCaption.removeClass('js-caption--active');
			}
		});

	}

	portfolio_hover_effect();

	VLTJS.document.on('endLoadingNewItems.vpf', function(event) {
		portfolio_hover_effect();
	});

})(jQuery);
/***********************************************
 * Preloader
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof NProgress != 'undefined') {
		NProgress.start();
	}

	VLTJS.window.on('load', function() {
		VLTJS.window.trigger('vlt.preloader_done');
		setTimeout(function() {
			VLTJS.html.addClass('vlt-is-page-loaded');
			if (typeof NProgress != 'undefined') {
				NProgress.done();
			}
		}, 500);
	});

})(jQuery);
/***********************************************
 * Line progress bar
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof anime == 'undefined') {
		return;
	}

	$('.vlt-progress-bar').each(function() {

		var $duration = 3000,
			$delay = 150;

		$(this).one('inview', function() {
			var $this = $(this),
				finalValue = $this.data('value') || 0,
				finalValueContainer = $this.find('.percent'),
				barContainer = $this.find('.vlt-progress-bar__bar > span'),
				obj = {
					count: 0
				};

			var animateCounter = anime({
				targets: obj,
				count: finalValue,
				round: 1,
				easing: 'linear',
				duration: $duration / 2,
				delay: $delay,
				update: function() {
					finalValueContainer.text(obj.count);
				}
			});

			var animateProgress = anime({
				targets: barContainer[0],
				width: finalValue + '%',
				duration: $duration,
				delay: $delay
			});
		});
	});

})(jQuery);

/***********************************************
 * Circle progress bar
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.circleProgress == 'undefined') {
		return;
	}

	$('.vlt-progress-bar-circle').each(function() {

		var $duration = 3000,
			$delay = 150;

		$(this).one('inview', function() {
			var $this = $(this),
				finalValue = $this.data('value') || 0,
				size = $this.data('size') || 160,
				thickness = $this.data('thickness') || 4,
				fill = $this.data('bar-color') || '#ee3364',
				emptyFill = $this.data('track-color') || 'rgba(0,0,0,.1)',
				barContainer = $this.find('.vlt-progress-bar-circle__bar'),
				finalValueContainer = $this.find('.vlt-progress-bar-circle__bar > h5'),
				obj = {
					count: 0
				};

			barContainer.circleProgress({
				startAngle: -Math.PI / 2,
				value: finalValue / 100,
				size: size,
				thickness: thickness,
				fill: fill,
				emptyFill: emptyFill,
				animation: {
					duration: $duration,
					easing: 'circleProgressEasing',
					delay: $delay
				}
			});

			var animateCounter = anime({
				targets: obj,
				count: finalValue,
				round: 1,
				easing: 'linear',
				duration: $duration,
				delay: $delay,
				update: function() {
					finalValueContainer.text(obj.count);
				}
			});


		});
	});

})(jQuery);
/***********************************************
 * Projects preview
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-projects-preview .swiper-container').each(function() {

		var $this = $(this),
			parentContainer = $this.parents('.vlt-projects-preview'),
			projectsLinks = parentContainer.find('.vlt-projects-preview__links');

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');
		projectsLinks.find('li').eq(0).addClass('is-active');

		var previewProjectSlider = new Swiper(this, {
			init: false,
			loop: false,
			slidesPerView: 1,
			effect: 'fade',
			allowTouchMove: false,
			lazy: true,
			speed: 1000,
			on: {
				init: function() {
					projectsLinks.on('click', 'li', function(e) {
						e.preventDefault();
						var currentLink = $(this);
						projectsLinks.find('li').removeClass('is-active');
						currentLink.addClass('is-active');
						previewProjectSlider.slideTo(currentLink.index());
					});
				},
			}
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			previewProjectSlider.init();
		});

	});

})(jQuery);
/***********************************************
 * Projects showcase style 1
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-projects-showcase--style-1 .swiper-container').each(function() {

		var $this = $(this);

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');

		var previewProjectSlider = new Swiper(this, {
			init: false,
			lazy: true,
			loop: false,
			mousewheel: {
				releaseOnEdges: true,
			},
			slidesPerView: 3,
			speed: 1000,
			touchReleaseOnEdges: true,
			breakpoints: {
				// when window width is <= 575px
				575: {
					slidesPerView: 1
				},
				// when window width is <= 767px
				767: {
					slidesPerView: 2
				}
			}
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			previewProjectSlider.init();
		});

	});

})(jQuery);


/***********************************************
 * Projects showcase style 2
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-projects-showcase--style-2 .swiper-container').each(function() {

		var $this = $(this);

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');

		var worksSwiper = new Swiper(this, {
			init: false,
			direction: 'vertical',
			lazy: true,
			loop: false,
			parallax: true,
			mousewheel: {
				releaseOnEdges: true,
			},
			slidesPerView: 1,
			speed: 1000,
			touchReleaseOnEdges: true,
			pagination: {
				el: $this.find('.vlt-swiper-pagination'),
				clickable: true,
			}
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			worksSwiper.init();
		});

	});

})(jQuery);

/***********************************************
 * Projects showcase style 3
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-projects-showcase--style-3 .swiper-container').each(function() {

		var $this = $(this);

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');

		function render_max_slides(number) {
			if (number > 0 && number < 10) {
				return '0' + number;
			} else {
				return number;
			}
		}

		var worksSwiper = new Swiper(this, {
			init: false,
			direction: 'vertical',
			lazy: true,
			loop: false,
			parallax: true,
			mousewheel: {
				releaseOnEdges: true,
			},
			slidesPerView: 1,
			speed: 1000,
			touchReleaseOnEdges: true,
			pagination: {
				el: $this.find('.vlt-swiper-pagination .container'),
				clickable: false,
				renderBullet: function(index, className) {
					return '<span class="' + className + '">0' + (index + 1) + " - " + render_max_slides($this.find('.swiper-slide').length) + "</span>"
				}
			}
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			worksSwiper.init();
		});

	});

})(jQuery);

/***********************************************
 * Projects showcase style 4
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-projects-showcase--style-4 .swiper-container, .vlt-projects-showcase--style-6 .swiper-container').each(function() {

		var $this = $(this),
			parentContainer = $this.parents('.vlt-projects-showcase'),
			projectsLinks = parentContainer.find('.vlt-projects-showcase__links');

		// prepend
		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');
		projectsLinks.find('li').eq(0).addClass('is-active');

		var previewProjectSlider = new Swiper(this, {
			init: false,
			loop: false,
			effect: 'fade',
			lazy: true,
			slidesPerView: 1,
			allowTouchMove: false,
			speed: 1000,
			on: {
				init: function() {
					projectsLinks.on('mouseenter', 'li', function(e) {
						e.preventDefault();
						var currentLink = $(this);
						projectsLinks.find('li').removeClass('is-active');
						currentLink.addClass('is-active');
						previewProjectSlider.slideTo(currentLink.index());
					});
				},
			}
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			previewProjectSlider.init();
		});

	});

})(jQuery);

/***********************************************
 * Projects showcase style 5
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-projects-showcase--style-5 .swiper-container').each(function() {

		var $this = $(this);

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');

		function render_max_slides(number) {
			if (number > 0 && number < 10) {
				return '0' + number;
			} else {
				return number;
			}
		}

		var worksSwiper = new Swiper(this, {
			init: false,
			direction: 'vertical',
			lazy: true,
			loop: false,
			parallax: true,
			mousewheel: {
				releaseOnEdges: true,
			},
			slidesPerView: 1,
			speed: 1000,
			touchReleaseOnEdges: true,
			pagination: {
				el: $this.find('.vlt-swiper-pagination .container'),
				clickable: false,
				renderBullet: function(index, className) {
					return '<span class="' + className + '">0' + (index + 1) + " - " + render_max_slides($this.find('.swiper-slide').length) + "</span>"
				}
			}
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			worksSwiper.init();
		});

	});

})(jQuery);
/***********************************************
 * Scroll to section
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.scrollTo == 'undefined') {
		return;
	}

	$('a[href^="#"]').not('[href="#"]').on('click', function(e) {
		e.preventDefault();
		if ($(this).parents('.tabs').length) {
			return;
		}
		VLTJS.html.scrollTo($(this).attr('href'), 500);
	});

})(jQuery);

/***********************************************
 * Scroll to top
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.scrollTo == 'undefined') {
		return;
	}

	function show_btn() {
		VLTJS.html.addClass('vlt-is--show-back-to-top');
		$('.vlt-btn--go-top').removeClass('hidden').addClass('visible');
	}

	function hide_btn() {
		VLTJS.html.removeClass('vlt-is--show-back-to-top');
		$('.vlt-btn--go-top').removeClass('visible').addClass('hidden');
	}

	hide_btn();

	VLTJS.throttleScroll(function(type, scroll) {
		var offset = VLTJS.window.height() + 100;

		if ( scroll > offset) {
			if (type === 'down') {
				hide_btn();
			} else if (type === 'up') {
				show_btn();
			}
		} else {
			hide_btn();
		}

	});

	VLTJS.document.on('click', '.vlt-btn--go-top', function(e) {
		e.preventDefault();
		VLTJS.html.scrollTo(0, 500);
	});

})(jQuery);
/***********************************************
 * Site protection
 ***********************************************/
(function($) {

	'use strict';

	if (!VLTJS.html.hasClass('vlt-is--site-protection')) {
		return;
	}

	var isClicked = false;

	VLTJS.document.bind('contextmenu', function(e) {
		e.preventDefault();

		if (!isClicked) {
			$('.vlt-site-protection').addClass('vlt-site-protection--visible');
			VLTJS.body.addClass('is-right-clicked');
			isClicked = true;
		}

		VLTJS.document.on('mousedown', function() {
			$('.vlt-site-protection').removeClass('vlt-site-protection--visible');
			VLTJS.body.removeClass('is-right-clicked');
			isClicked = false;
		});

		isClicked = false;

	});

})(jQuery);
/***********************************************
 * Stretch element inside column
 ***********************************************/
(function($) {

	'use strict';

	function stretch_element_inside_column() {

		var wndW = VLTJS.window.width();

		$('.wpb_column .vlt-stretch-element-inside-column').each(function() {
			const $this = $(this);
			const $row = $this.closest('.vc_row');
			const $col = $this.closest('.wpb_column');
			const rectElement = this.getBoundingClientRect();
			const rectRow = $row[0].getBoundingClientRect();
			const rectCol = $col[0].getBoundingClientRect();
			const leftElement = rectElement.left;
			const rightElement = wndW - rectElement.right;
			const leftRow = rectRow.left + (parseFloat($row.css('padding-left')) || 0);
			const rightRow = wndW - rectRow.right + (parseFloat($row.css('padding-right')) || 0);
			const leftCol = rectCol.left;
			const rightCol = wndW - rectCol.right;
			const css = {
				'margin-left': 0,
				'margin-right': 0,
			};

			if (Math.round(leftRow) === Math.round(leftCol)) {
				const ml = parseFloat($this.css('margin-left') || 0);
				css['margin-left'] = ml - leftElement;
			}

			if (Math.round(rightRow) === Math.round(rightCol)) {
				const mr = parseFloat($this.css('margin-right') || 0);
				css['margin-right'] = mr - rightElement;
			}

			$this.css(css);

		});

	}

	stretch_element_inside_column();
	VLTJS.debounceResize(stretch_element_inside_column);

})(jQuery);

/***********************************************
 * Stretch element
 ***********************************************/
(function($) {

	'use strict';

	var element = $('.vlt-stretched-element');

	if (!element.length) {
		return;
	}

	function stretch_element() {

		var wndW = VLTJS.window.width();

		element.each(function() {
			var $this = $(this);
			var rect = this.getBoundingClientRect();
			var left = rect.left;
			var right = wndW - rect.right;
			var ml = parseFloat($this.css('margin-left') || 0);
			var mr = parseFloat($this.css('margin-right') || 0);
			$this.css({
				'margin-left': ml - left,
				'margin-right': mr - right,
				'width': wndW
			});
		});

	}

	stretch_element();
	VLTJS.debounceResize(stretch_element);

})(jQuery);

/***********************************************
 * Stretch to container
 ***********************************************/
(function($) {

	'use strict';

	var element = $('[data-vc-stretch-to-container="true"]');

	if (!element.length) {
		return;
	}

	function stretch_to_container() {

		var container = element.parents('.container'),
			containerW = container.outerWidth(),
			containerOffset = container.offset().left;

		element.each(function() {
			var $this = $(this);
			var rect = this.getBoundingClientRect();
			var left = rect.left;

			var ml = parseFloat($this.css('margin-left') || 0);

			$this.css({
				'margin-left': containerOffset - left + ml,
				'width': containerW
			});

		});

	}

	stretch_to_container();
	VLTJS.debounceResize(stretch_to_container);

})(jQuery);

/***********************************************
 * Stretch to content
 ***********************************************/
(function($) {

	'use strict';

	var element = $('[data-vc-stretch-to-content="true"]');

	if (!element.length) {
		return;
	}

	function stretch_to_content() {

		var container = element.parents('.vlt-main'),
			containerW = container.outerWidth(),
			containerOffset = container.offset().left;

		element.each(function() {
			var $this = $(this);
			var rect = this.getBoundingClientRect();
			var left = rect.left;

			var ml = parseFloat($this.css('margin-left') || 0);

			$this.css({
				'margin-left': containerOffset - left + ml,
				'width': containerW
			});

		});

	}

	stretch_to_content();
	VLTJS.debounceResize(stretch_to_content);

})(jQuery);
/***********************************************
 * Subscribe form
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.ajaxChimp == 'undefined') {
		return;
	}

	// check if object defined
	if (typeof VLT_SUBSCRIBE_CDATA == 'undefined') {
		return;
	}

	$.ajaxChimp.translations.leedo = {
		'submit': VLT_SUBSCRIBE_CDATA.subscribe_submit,
		0: VLT_SUBSCRIBE_CDATA.subscribe_string_0,
		1: VLT_SUBSCRIBE_CDATA.subscribe_string_1,
		2: VLT_SUBSCRIBE_CDATA.subscribe_string_2,
		3: VLT_SUBSCRIBE_CDATA.subscribe_string_3,
		4: VLT_SUBSCRIBE_CDATA.subscribe_string_4,
		5: VLT_SUBSCRIBE_CDATA.subscribe_string_5
	};

	$('.vlt-subscribe-form').each(function() {
		var $form = $(this);

		$form.on('submit', function() {
			$form.addClass('mc-loading');
		});

		$form.ajaxChimp({
			language: 'leedo',
			label: $form.find('.vlt-alert'),
			callback: function(resp) {
				$form.removeClass('mc-loading');
				$form.toggleClass('mc-valid', (resp.result === 'success'));
				$form.toggleClass('mc-invalid', (resp.result === 'error'));
				if (resp.result === 'success') {
					$form.find('input[type="email"]').val('');
				}
				setTimeout(function() {
					$form.removeClass('mc-valid mc-invalid');
					$form.find('input[type="email"]').focus();
				}, 4500);
			}
		});
	});

})(jQuery);
/***********************************************
 * Testimonial slider style 1
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-testimonial-slider--style-1 .swiper-container').each(function() {

		var $this = $(this);

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');

		var testimonialSlider = new Swiper(this, {
			init: false,
			loop: true,
			slidesPerView: 1,
			spaceBetween: 30,
			grabCursor: true,
			speed: 1000,
			parallax: true,
			autoHeight: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false
			},
			navigation: {
				nextEl: $this.find('.vlt-swiper-button-next'),
				prevEl: $this.find('.vlt-swiper-button-prev'),
			},
			pagination: {
				el: $this.find('.vlt-swiper-pagination'),
				clickable: true,
			},
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			testimonialSlider.init();
		});

	});

})(jQuery);

/***********************************************
 * Testimonial slider style 2
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-testimonial-slider--style-2 .swiper-container').each(function() {

		var $this = $(this);

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');

		var testimonialSlider = new Swiper(this, {
			init: false,
			loop: true,
			centeredSlides: true,
			slidesPerView: 3,
			spaceBetween: 30,
			grabCursor: true,
			speed: 1000,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false
			},
			breakpoints: {
				// when window width is <= 575px
				575: {
					slidesPerView: 1
				},
				// when window width is <= 767px
				767: {
					slidesPerView: 2
				},
				// when window width is <= 991px
				991: {
					slidesPerView: 3
				}
			},
			on: {
				init: function () {
					$('.vlt-testimonial-slider .vlt-testimonial-item--style-2 .vlt-testimonial-item__content, .vlt-testimonial-slider .vlt-testimonial-item--style-3 .vlt-testimonial-item__content').matchHeight();
				},
			},
		});


		VLTJS.window.on('vlt.preloader_done', function() {
			testimonialSlider.init();
		});

	});

})(jQuery);

/***********************************************
 * Image slider
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-image-slider .swiper-container').each(function() {

		var $this = $(this);

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');

		var imageSwiper = new Swiper(this, {
			init: false,
			slidesPerView: 1,
			grabCursor: true,
			speed: 1000,
			navigation: {
				nextEl: $this.find('.vlt-swiper-button-next'),
				prevEl: $this.find('.vlt-swiper-button-prev'),
			},
			pagination: {
				el: $this.find('.vlt-swiper-pagination'),
				clickable: true,
			},
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			imageSwiper.init();
		});

	});

})(jQuery);

/***********************************************
 * Awards slider
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	$('.vlt-awards-list .swiper-container').each(function() {

		var $this = $(this);

		$this.find('.swiper-wrapper > *').wrap('<div class="swiper-slide">');

		var testimonialSlider = new Swiper(this, {
			init: false,
			loop: false,
			slidesPerView: 'auto',
			spaceBetween: 110,
			speed: 1000,
			mousewheel: {
				releaseOnEdges: false,
			},
			freeMode: true,
		});

		VLTJS.window.on('vlt.preloader_done', function() {
			testimonialSlider.init();
		});

	});

})(jQuery);