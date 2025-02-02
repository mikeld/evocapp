<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$footer_class = 'vlt-footer vlt-footer--shortcode';

$acf_footer = leedo_get_theme_mod( 'page_custom_footer', true );

if ( leedo_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

?>

<footer class="<?php echo leedo_sanitize_class( $footer_class ); ?>">
	<div class="container">
		<?php echo do_shortcode( html_entity_decode( leedo_get_theme_mod( 'footer_shortcode', $acf_footer ) ) ); ?>
	</div>
</footer>
<!-- /.vlt-footer -->