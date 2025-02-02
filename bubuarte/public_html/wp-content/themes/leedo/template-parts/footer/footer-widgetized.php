<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$footer_class = 'vlt-footer vlt-footer--widgetized';

$acf_footer = leedo_get_theme_mod( 'page_custom_footer', true );

if ( leedo_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

?>

<footer class="<?php echo leedo_sanitize_class( $footer_class ); ?>">
	<div class="container">

		<div class="vlt-footer-widgets">
			<div class="row">

				<?php if ( leedo_get_theme_mod( 'footer_widgetized_1_size' ) ) : ?>
					<div class="col-lg-<?php echo esc_attr( leedo_get_theme_mod( 'footer_widgetized_1_size' ) ); ?>">
						<?php
							if ( is_active_sidebar( 'footer_sidebar_1' ) ) {
								dynamic_sidebar( 'footer_sidebar_1' );
							}
						?>
					</div>
				<?php endif; ?>

				<?php if ( leedo_get_theme_mod( 'footer_widgetized_2_size' ) ) : ?>
					<div class="col-lg-<?php echo esc_attr( leedo_get_theme_mod( 'footer_widgetized_2_size' ) ); ?>">
						<?php
							if ( is_active_sidebar( 'footer_sidebar_2' ) ) {
								dynamic_sidebar( 'footer_sidebar_2' );
							}
						?>
					</div>
				<?php endif; ?>

				<?php if ( leedo_get_theme_mod( 'footer_widgetized_3_size' ) ) : ?>
					<div class="col-lg-<?php echo esc_attr( leedo_get_theme_mod( 'footer_widgetized_3_size' ) ); ?>">
						<?php
							if ( is_active_sidebar( 'footer_sidebar_3' ) ) {
								dynamic_sidebar( 'footer_sidebar_3' );
							}
						?>
					</div>
				<?php endif; ?>

				<?php if ( leedo_get_theme_mod( 'footer_widgetized_4_size' ) ) : ?>
					<div class="col-lg-<?php echo esc_attr( leedo_get_theme_mod( 'footer_widgetized_4_size' ) ); ?>">
						<?php
							if ( is_active_sidebar( 'footer_sidebar_4' ) ) {
								dynamic_sidebar( 'footer_sidebar_4' );
							}
						?>
					</div>
				<?php endif; ?>

			</div>
		</div>
		<!-- /.vlt-footer-widgets -->

		<?php if ( leedo_get_theme_mod( 'footer_copyright' ) ) : ?>
			<div class="vlt-footer-copyright"><?php echo leedo_get_theme_mod( 'footer_copyright' ); ?></div>
			<!-- /.vlt-footer-copyright -->
		<?php endif; ?>

	</div>
</footer>
<!-- /.vlt-footer -->