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