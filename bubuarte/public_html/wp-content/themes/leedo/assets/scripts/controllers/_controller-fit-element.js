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