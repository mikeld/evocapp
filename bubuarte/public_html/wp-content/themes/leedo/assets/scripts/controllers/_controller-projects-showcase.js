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