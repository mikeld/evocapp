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