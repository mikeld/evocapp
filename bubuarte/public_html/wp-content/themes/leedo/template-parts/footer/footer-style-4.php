<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$footer_class = 'vlt-footer vlt-footer--style-4';

$acf_footer = leedo_get_theme_mod( 'page_custom_footer', true );

if ( leedo_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

?>

<footer class="<?php echo leedo_sanitize_class( $footer_class ); ?>">
	<div class="container">

		<div class="vlt-footer-inner">

			<?php if ( leedo_get_theme_mod( 'footer_copyright' ) ) : ?>
				<div class="vlt-footer-copyright"><?php echo leedo_get_theme_mod( 'footer_copyright' ); ?></div>
				<!-- /.vlt-footer-copyright -->
			<?php endif; ?>

			<?php if ( leedo_get_theme_mod( 'footer_social_list' ) ) : ?>
				<div class="vlt-footer-socials vlt-footer-socials--style-1">
					<?php
						foreach ( leedo_get_theme_mod( 'footer_social_list' ) as $socialItem ) :
							$class = 'vlt-social-icon vlt-social-icon--style-3';
							$class .= ' ' . str_replace( 'fa fa-', '', $socialItem['social_icon'] );
							echo '<a href="' . esc_url( $socialItem['social_url'] ) . '" target="_blank" class="' . leedo_sanitize_class( $class ) . '"><i class="' . leedo_sanitize_class( $socialItem['social_icon'] ) . '"></i></a>';
						endforeach;
					?>
				</div>
				<!-- /.vlt-footer-socials -->
			<?php endif; ?>

		</div>

	</div>
</footer>
<!-- /.vlt-footer -->