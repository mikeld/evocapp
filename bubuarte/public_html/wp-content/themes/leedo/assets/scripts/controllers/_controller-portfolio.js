/***********************************************
 * Portfolio hover effect
 ***********************************************/
(function($) {

	'use strict';

	if (!$('div[data-vp-items-style="leedo_work_style_3"]').length) {
		return;
	}

	function portfolio_hover_effect() {

		$('div[data-vp-items-style="leedo_work_style_3"]').append('<div class="js-caption"><h4></h4></div>');

		var $portfolioGrid = $('.vp-portfolio__items-style-leedo_work_style_3'),
			$jsCaption = $('.js-caption'),
			$jsCaptionTitle = $jsCaption.find('h4');

		$portfolioGrid.on('mousemove', function(e) {
			$jsCaption.css({
				top: e.clientY,
				left: e.clientX
			});
		});

		$portfolioGrid.find('.vp-portfolio__item-overlay').on({
			mouseenter: function() {
				$jsCaption.removeClass('js-caption--active');
				$jsCaptionTitle.text($(this).find('.vp-portfolio__item-meta-title').text());
				$jsCaption.addClass('js-caption--active');
			},
			mouseleave: function() {
				$jsCaption.removeClass('js-caption--active');
			}
		});

	}

	portfolio_hover_effect();

	VLTJS.document.on('endLoadingNewItems.vpf', function(event) {
		portfolio_hover_effect();
	});

})(jQuery);