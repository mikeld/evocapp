/***********************************************
 * Footer fixed effect
 ***********************************************/
(function($) {

	'use strict';

	function fixed_footer() {
		var footer = $('.vlt-footer').filter('.vlt-footer--fixed'),
			siteWrapperInner = $('.vlt-site-wrapper__inner'),
			footerHeight = footer.outerHeight();

		siteWrapperInner.css({
			'margin-bottom': footerHeight
		});
	}

	fixed_footer();
	VLTJS.debounceResize(fixed_footer);

})(jQuery);