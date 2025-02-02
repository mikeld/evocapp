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