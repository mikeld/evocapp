/***********************************************
 * FAQ
 ***********************************************/
(function($) {

	'use strict';

	$('.vlt-faq-container').each(function() {
		var container = $(this),
			item = container.find('.vlt-faq-item');

		item.eq(0).addClass('vlt-faq-item--active');

		item.on('click', '.vlt-faq-item__header', function() {
			var $this = $(this),
				parentItem = $this.parent('.vlt-faq-item'),
				content = parentItem.find('.vlt-faq-item__content');

			if (parentItem.hasClass('vlt-faq-item--active')) {
				return;
			}

			item.removeClass('vlt-faq-item--active');
			parentItem.addClass('vlt-faq-item--active');

			item.find('.vlt-faq-item__content').slideUp(300);
			content.slideDown(300);
		});

	});

})(jQuery);