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