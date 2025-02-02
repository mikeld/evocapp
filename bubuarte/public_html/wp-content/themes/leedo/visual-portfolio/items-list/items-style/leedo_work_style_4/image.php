<?php
/**
 * Item image template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="vp-portfolio__item-img-wrap">
	<div class="vp-portfolio__item-img">
		<?php echo wp_kses( $args['image'], $args['image_allowed_html'] ); ?>
		<?php if ( $args['url'] ) : ?>
			<a href="<?php echo esc_url( $args['url'] ); ?>" class="vp-portfolio__item-overlay">
				<?php if ( $opts['work_style_4_style'] == 'style-1' ) : ?>
					<span class="vlt-watch-trailer">
						<i class="leedo-play-button"></i> <?php esc_html_e( 'Watch Trailer', 'leedo' ); ?>
					</span>
				<?php else: ?>
					<span class="vlt-video-link"><i class="fa fa-play"></i></span>
				<?php endif; ?>
			</a>
		<?php endif; ?>
	</div>
</div>
