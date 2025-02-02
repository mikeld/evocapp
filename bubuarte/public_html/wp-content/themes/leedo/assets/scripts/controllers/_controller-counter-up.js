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