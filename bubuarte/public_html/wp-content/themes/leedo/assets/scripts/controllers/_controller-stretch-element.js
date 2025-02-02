/***********************************************
 * Stretch element inside column
 ***********************************************/
(function($) {

	'use strict';

	function stretch_element_inside_column() {

		var wndW = VLTJS.window.width();

		$('.wpb_column .vlt-stretch-element-inside-column').each(function() {
			const $this = $(this);
			const $row = $this.closest('.vc_row');
			const $col = $this.closest('.wpb_column');
			const rectElement = this.getBoundingClientRect();
			const rectRow = $row[0].getBoundingClientRect();
			const rectCol = $col[0].getBoundingClientRect();
			const leftElement = rectElement.left;
			const rightElement = wndW - rectElement.right;
			const leftRow = rectRow.left + (parseFloat($row.css('padding-left')) || 0);
			const rightRow = wndW - rectRow.right + (parseFloat($row.css('padding-right')) || 0);
			const leftCol = rectCol.left;
			const rightCol = wndW - rectCol.right;
			const css = {
				'margin-left': 0,
				'margin-right': 0,
			};

			if (Math.round(leftRow) === Math.round(leftCol)) {
				const ml = parseFloat($this.css('margin-left') || 0);
				css['margin-left'] = ml - leftElement;
			}

			if (Math.round(rightRow) === Math.round(rightCol)) {
				const mr = parseFloat($this.css('margin-right') || 0);
				css['margin-right'] = mr - rightElement;
			}

			$this.css(css);

		});

	}

	stretch_element_inside_column();
	VLTJS.debounceResize(stretch_element_inside_column);

})(jQuery);

/***********************************************
 * Stretch element
 ***********************************************/
(function($) {

	'use strict';

	var element = $('.vlt-stretched-element');

	if (!element.length) {
		return;
	}

	function stretch_element() {

		var wndW = VLTJS.window.width();

		element.each(function() {
			var $this = $(this);
			var rect = this.getBoundingClientRect();
			var left = rect.left;
			var right = wndW - rect.right;
			var ml = parseFloat($this.css('margin-left') || 0);
			var mr = parseFloat($this.css('margin-right') || 0);
			$this.css({
				'margin-left': ml - left,
				'margin-right': mr - right,
				'width': wndW
			});
		});

	}

	stretch_element();
	VLTJS.debounceResize(stretch_element);

})(jQuery);

/***********************************************
 * Stretch to container
 ***********************************************/
(function($) {

	'use strict';

	var element = $('[data-vc-stretch-to-container="true"]');

	if (!element.length) {
		return;
	}

	function stretch_to_container() {

		var container = element.parents('.container'),
			containerW = container.outerWidth(),
			containerOffset = container.offset().left;

		element.each(function() {
			var $this = $(this);
			var rect = this.getBoundingClientRect();
			var left = rect.left;

			var ml = parseFloat($this.css('margin-left') || 0);

			$this.css({
				'margin-left': containerOffset - left + ml,
				'width': containerW
			});

		});

	}

	stretch_to_container();
	VLTJS.debounceResize(stretch_to_container);

})(jQuery);

/***********************************************
 * Stretch to content
 ***********************************************/
(function($) {

	'use strict';

	var element = $('[data-vc-stretch-to-content="true"]');

	if (!element.length) {
		return;
	}

	function stretch_to_content() {

		var container = element.parents('.vlt-main'),
			containerW = container.outerWidth(),
			containerOffset = container.offset().left;

		element.each(function() {
			var $this = $(this);
			var rect = this.getBoundingClientRect();
			var left = rect.left;

			var ml = parseFloat($this.css('margin-left') || 0);

			$this.css({
				'margin-left': containerOffset - left + ml,
				'width': containerW
			});

		});

	}

	stretch_to_content();
	VLTJS.debounceResize(stretch_to_content);

})(jQuery);