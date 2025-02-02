<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$footer_class = 'vlt-footer vlt-footer--style-5';

$acf_footer = leedo_get_theme_mod( 'page_custom_footer', true );

if ( leedo_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

?>

<footer class="<?php echo leedo_sanitize_class( $footer_class ); ?>">
	<div class="container">

		<div class="text-center">

			<?php if ( leedo_get_theme_mod( 'footer_style-5_content' ) ) : ?>
				<div class="vlt-footer-content vlt-footer-content--style-2">
					<?php echo leedo_get_theme_mod( 'footer_style-5_content' ); ?>
				</div>
				<!-- .vlt-footer-content -->
			<?php endif; ?>

			<?php if ( leedo_get_theme_mod( 'footer_social_list' ) ) : ?>
				<ul class="vlt-footer-socials vlt-footer-socials--style-2 vlt-display-1">
					<?php

						$socialIcons = leedo_get_social_icons();

						foreach ( leedo_get_theme_mod( 'footer_social_list' ) as $socialItem ) :
							foreach ( $socialIcons as $key => $socialIcon ) {
								if ( $socialItem['social_icon'] == $key ) {
									echo '<li><a href="' . esc_url( $socialItem['social_url'] ) . '" target="_blank">' . $socialIcon . '</a></li>';
								}
							}
						endforeach;
					?>
				</ul>
				<!-- /.vlt-footer-socials -->
			<?php endif; ?>

			<?php if ( leedo_get_theme_mod( 'footer_copyright' ) ) : ?>
				<div class="vlt-footer-copyright"><?php echo leedo_get_theme_mod( 'footer_copyright' ); ?></div>
				<!-- /.vlt-footer-copyright -->
			<?php endif; ?>

		</div>
		<!-- /.text-center -->

	</div>
</footer>
<!-- /.vlt-footer -->