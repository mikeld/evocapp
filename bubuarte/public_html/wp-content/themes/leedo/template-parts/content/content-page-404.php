<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

?>

<article <?php post_class( 'vlt-page vlt-page--404' ); ?>>
	<strong><?php esc_html_e( '404', 'leedo' ); ?></strong>
	<h1><?php echo leedo_get_theme_mod( 'error_title' ); ?></h1>
	<p><?php echo leedo_get_theme_mod( 'error_subtitle' ); ?></p>
	<a class="vlt-btn vlt-btn--primary vlt-btn--lg vlt-btn--effect " href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php esc_html_e( 'Back to Home', 'leedo' ); ?></span></a>
</article>
<!-- /.vlt-page -->