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