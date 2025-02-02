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