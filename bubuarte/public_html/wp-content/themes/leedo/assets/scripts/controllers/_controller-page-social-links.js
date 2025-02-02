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