/***********************************************
 * Subscribe form
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.ajaxChimp == 'undefined') {
		return;
	}

	// check if object defined
	if (typeof VLT_SUBSCRIBE_CDATA == 'undefined') {
		return;
	}

	$.ajaxChimp.translations.leedo = {
		'submit': VLT_SUBSCRIBE_CDATA.subscribe_submit,
		0: VLT_SUBSCRIBE_CDATA.subscribe_string_0,
		1: VLT_SUBSCRIBE_CDATA.subscribe_string_1,
		2: VLT_SUBSCRIBE_CDATA.subscribe_string_2,
		3: VLT_SUBSCRIBE_CDATA.subscribe_string_3,
		4: VLT_SUBSCRIBE_CDATA.subscribe_string_4,
		5: VLT_SUBSCRIBE_CDATA.subscribe_string_5
	};

	$('.vlt-subscribe-form').each(function() {
		var $form = $(this);

		$form.on('submit', function() {
			$form.addClass('mc-loading');
		});

		$form.ajaxChimp({
			language: 'leedo',
			label: $form.find('.vlt-alert'),
			callback: function(resp) {
				$form.removeClass('mc-loading');
				$form.toggleClass('mc-valid', (resp.result === 'success'));
				$form.toggleClass('mc-invalid', (resp.result === 'error'));
				if (resp.result === 'success') {
					$form.find('input[type="email"]').val('');
				}
				setTimeout(function() {
					$form.removeClass('mc-valid mc-invalid');
					$form.find('input[type="email"]').focus();
				}, 4500);
			}
		});
	});

})(jQuery);