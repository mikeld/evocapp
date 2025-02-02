<?php
/**
 * Default pagination template.
 *
 * @var $args
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<ul class="<?php echo esc_attr( $args['class'] ); ?> vp-pagination__style-leedo" data-vp-pagination-type="<?php echo esc_attr( $args['type'] ); ?>">
	<li class="vp-pagination__item">
		<a class="vp-pagination__load-more vlt-btn vlt-btn--primary vlt-btn--lg vlt-btn--effect" href="<?php echo esc_url( $args['next_page_url'] ); ?>">
			<span><?php echo esc_html( $args['text_load'] ); ?></span>
			<span class="vp-pagination__load-more-loading"><i class="fa fa-spinner fa-spin"></i><?php echo esc_html( $args['text_loading'] ); ?></span>
			<span class="vp-pagination__load-more-no-more"><?php echo esc_html( $args['text_end_list'] ); ?></span>
		</a>
	</li>
</ul>