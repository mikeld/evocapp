<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$footer_class = 'vlt-footer vlt-footer--style-2';

$acf_footer = leedo_get_theme_mod( 'page_custom_footer', true );

if ( leedo_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

?>

<footer class="<?php echo leedo_sanitize_class( $footer_class ); ?>">
	<div class="container">

		<div class="text-center">

			<?php if ( leedo_get_theme_mod( 'footer_style-2_content' ) ) : ?>
				<div class="vlt-footer-content vlt-footer-content--style-1">
					<?php echo leedo_get_theme_mod( 'footer_style-2_content' ); ?>
				</div>
				<!-- .vlt-footer-content -->
			<?php endif; ?>

			<?php if ( leedo_get_theme_mod( 'footer_copyright' ) ) : ?>
				<div class="vlt-footer-copyright"><?php echo leedo_get_theme_mod( 'footer_copyright' ); ?></div>
				<!-- /.vlt-footer-copyright -->
			<?php endif; ?>

			<?php if ( leedo_get_theme_mod( 'footer_social_list' ) ) : ?>
				<div class="vlt-footer-socials vlt-footer-socials--style-1">
					<?php
						foreach ( leedo_get_theme_mod( 'footer_social_list' ) as $socialItem ) :
							$class = 'vlt-social-icon vlt-social-icon--style-2';
							echo '<a href="' . esc_url( $socialItem['social_url'] ) . '" target="_blank" class="' . leedo_sanitize_class( $class ) . '"><i class="' . leedo_sanitize_class( $socialItem['social_icon'] ) . '"></i></a>';
						endforeach;
					?>
				</div>
				<!-- /.vlt-footer-socials -->
			<?php endif; ?>

		</div>
		<!-- /.text-center -->

	</div>
</footer>
<!-- /.vlt-footer -->