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

<article <?php post_class( 'vlt-post vlt-post--style-masonry' ); ?>>

	<?php if ( $opts['post_masonry_thumbnail'] ) : ?>
		<div class="vp-portfolio__item-img-wrap">
			<div class="vp-portfolio__item-img">
				<?php
				if ( $args['url'] ) {
					?>
					<a href="<?php echo esc_url( $args['url'] ); ?>">
						<?php echo wp_kses( $args['image'], $args['image_allowed_html'] ); ?>
					</a>
					<?php
				} else {
					echo wp_kses( $args['image'], $args['image_allowed_html'] );
				}
				?>
			</div>
		</div>
		<!-- /.vp-portfolio__item-img-wrap -->
	<?php endif; ?>