/***********************************************
 * Init third party scripts
 ***********************************************/
(function($) {

	'use strict';

	// Comments GDPR
	if ($('input[type="checkbox"][name="gdpr_terms"]:not(.activated), .wpcf7-acceptance input[type="checkbox"]:not(.activated), .vlt-subscribe-form__checkbox input[type="checkbox"]:not(.activated)').length) {
		$('input[type="checkbox"][name="gdpr_terms"]:not(.activated), .wpcf7-acceptance input[type="checkbox"]:not(.activated), .vlt-subscribe-form__checkbox input[type="checkbox"]:not(.activated)')
			.addClass('activated')
			.on('change', function(e) {
				if ($(this).get(0).checked) {
					$(this).parents('form').find('.vlt-btn').removeClass('disabled');
				} else {
					$(this).parents('form').find('.vlt-btn').addClass('disabled');
				}
			}).trigger('change');
	}

	// Jarallax
	if (typeof $.fn.jarallax !== 'undefined') {
		$('.jarallax').jarallax({
			speed: 0.8
		});
	}

	if (typeof $.fn.imagesLoaded !== 'undefined' || typeof $.fn.jarallax !== 'undefined') {
		VLTJS.body.imagesLoaded(function() {
			setTimeout(function() {
				$('[data-jarallax-element]').jarallax('onResize').jarallax('onScroll');
			}, 150);
		});
	}

	// Equal height
	if (typeof $.fn.matchHeight !== 'undefined') {
		function vlthemes_equal_height() {
			setTimeout(function() {
				$('.vc_row .vlt-services-box, .vc_row .vlt-services').matchHeight();
			}, 100);
		}
		vlthemes_equal_height();
		VLTJS.debounceResize(vlthemes_equal_height);
	}

	// Fitvids
	if (typeof $.fn.fitVids !== 'undefined') {
		VLTJS.body.fitVids();
	}

	// Widget menu
	if (typeof $.fn.superclick !== 'undefined') {
		$('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
			delay: 500,
			cssArrows: false,
			animation: {
				opacity: 'show',
				height: 'show'
			},
			animationOut: {
				opacity: 'hide',
				height: 'hide'
			},
		});
	}

	// Fancybox
	if (typeof $.fn.fancybox !== 'undefined') {
		$().fancybox({
			selector: '[data-fancybox]',
			animationEffect: 'fade',
			transitionEffect: 'slide',
			infobar: false,
			buttons: [
				'close'
			],
			btnTpl: {
				close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' +
					'<span><i class="leedo-close"></i></span>' +
					'</button>',
				arrowLeft: '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" href="javascript:;">' +
					'<span><i class="leedo-left-arrow"></i></span>' +
					'</a>',
				arrowRight: '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" href="javascript:;">' +
					'<span><i class="leedo-right-arrow"></i></span>' +
					'</a>'
			}
		});
	}

	// Remove p / br tags from contact form 7
	$('.wpcf7-form').find('p').contents().unwrap();
	$('.wpcf7-form').find('p, br').remove();

	// Sticky sidebar
	if (typeof $.fn.imagesLoaded !== 'undefined' || typeof $.fn.theiaStickySidebar !== 'undefined') {
		VLTJS.body.imagesLoaded(function() {
			var adminBarHeight = $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;
			var stickyHeaderHeight = $('.vlt-header.headroom').length ? $('.vlt-header.headroom').outerHeight() : 0;
			$('.vlt-column-sticky-content, .vlt-column-sticky-sidebar').theiaStickySidebar({
				additionalMarginTop: 60 + adminBarHeight + stickyHeaderHeight,
				additionalMarginBottom: 60
			});
			$('.vlt-shortcode-column-sticky-sidebar').theiaStickySidebar({
				containerSelector: '.vlt-shortcode-column-sticky-wrap',
				additionalMarginTop: 60 + adminBarHeight + stickyHeaderHeight,
				additionalMarginBottom: 60
			});
		});
	}

	// Fast click
	if (typeof FastClick === 'function') {
		FastClick.attach(document.body);
	}

	// Masonry blog
	$('.masonry').vlt_masonry_grid();
	VLTJS.document.on('vlt.loaded_more', function() {
		$('.masonry').vlt_masonry_grid();
	});

	// AJAX load more button
	$('.vlt-blog-posts--load-more_pagination').vlt_ajax_load_more_button();
	$('.vlt-products-list--load-more_pagination').vlt_ajax_load_more_button();

	// Quantity Woo
	VLTJS.document.on('click', '.vlt-quantity .plus, .vlt-quantity .minus', function(){
		var $this = $(this),
			$qty = $this.siblings('.qty'),
			current = parseInt($qty.val(), 10),
			min = parseInt($qty.attr('min'), 10),
			max = parseInt($qty.attr('max'), 10),
			step = parseInt($qty.attr('step'), 10);

		min = min ? min : 1;
		max = max ? max : current + step;

		if ($this.hasClass('minus') && current > min) {
			$qty.val(current - step);
			$qty.trigger('change');
		}

		if ($this.hasClass('plus') && current < max) {
			$qty.val(current + step);
			$qty.trigger('change');
		}

		return false;
	});

	// Fix particles on single product page
	if (typeof $.fn.jarallax !== 'undefined') {
		VLTJS.body.on('click', '.wc-tabs li a', function() {
			setTimeout(function() {
				$('[data-jarallax-element]').jarallax('onResize').jarallax('onScroll');
			}, 10);
		});
	}

})(jQuery);