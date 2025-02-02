/***********************************************
 * Audio player
 ***********************************************/
(function($) {

	'use strict';

	var element = $('.vlt-audio-player');

	element.each(function() {
		var $this = $(this),
			playButton = $this.find('.vlt-audio-player__button > a'),
			isPlayed = false;

		playButton.on('click', function(e) {
			e.preventDefault();

			var clickedButton = $(this),
				clickedButtonIcon = clickedButton.find('i'),
				mejsButton = clickedButton.parents('.vlt-audio-player').find('.mejs-playpause-button');

			element.find('.vlt-audio-player__button i').removeClass('leedo-pause-button').addClass('leedo-play-button');

			if (mejsButton.hasClass('mejs-play')) {
				clickedButtonIcon.removeClass('leedo-play-button').addClass('leedo-pause-button');
				mejsButton.trigger('click');
			} else if (mejsButton.hasClass('mejs-pause')) {
				clickedButtonIcon.removeClass('leedo-pause-button').addClass('leedo-play-button');
				mejsButton.trigger('click');
			}

		});
	});

})(jQuery);