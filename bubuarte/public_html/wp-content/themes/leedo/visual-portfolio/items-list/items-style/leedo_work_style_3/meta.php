<?php
/**
 * Item meta template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tag = 'a';
if ( ! $args['url'] ) {
	$tag = 'span';
}
?>

<<?php echo esc_html( $tag ); ?>
	<?php if ( $args['url'] ) : ?>
		href="<?php echo esc_url( $args['url'] ); ?>"
	<?php endif; ?>
		class="vp-portfolio__item-overlay">
	<div class="vp-portfolio__item-meta">
		<?php

		// Show Title.
		if ( $opts['show_title'] && $args['title'] ) {
			?>
			<h4 class="vp-portfolio__item-meta-title">
				<?php
				echo esc_html( $args['title'] );
				?>
			</h4>
			<?php
		}

		?>
	</div>
</<?php echo esc_html( $tag ); ?>>