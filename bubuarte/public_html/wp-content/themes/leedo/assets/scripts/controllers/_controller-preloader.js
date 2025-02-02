/***********************************************
 * Preloader
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof NProgress != 'undefined') {
		NProgress.start();
	}

	VLTJS.window.on('load', function() {
		VLTJS.window.trigger('vlt.preloader_done');
		setTimeout(function() {
			VLTJS.html.addClass('vlt-is-page-loaded');
			if (typeof NProgress != 'undefined') {
				NProgress.done();
			}
		}, 500);
	});

})(jQuery);