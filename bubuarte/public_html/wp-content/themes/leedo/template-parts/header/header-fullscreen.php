<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$acf_navbar = leedo_get_theme_mod( 'page_custom_navigation', true );

$header_class = 'vlt-header vlt-header--fullscreen';
$navbar_class = 'vlt-navbar vlt-navbar--main';

if ( leedo_get_theme_mod( 'navigation_opaque', $acf_navbar ) == 'enable' ) {
	$header_class .= ' vlt-header--opaque';
}

if ( leedo_get_theme_mod( 'navigation_transparent', $acf_navbar ) == 'enable' ) {
	$navbar_class .= ' vlt-navbar--transparent';
}

if ( leedo_get_theme_mod( 'navigation_transparent_always', $acf_navbar ) == 'enable' ) {
	$navbar_class .= ' vlt-navbar--transparent-always';
}

if ( leedo_get_theme_mod( 'navigation_sticky', $acf_navbar ) == 'enable' ) {
	$navbar_class .= ' vlt-navbar--sticky';

	if ( leedo_get_theme_mod( 'navigation_hide_on_scroll', $acf_navbar ) == 'enable' ) {
		$navbar_class .= ' vlt-navbar--hide-on-scroll';
	}

}

if ( leedo_get_theme_mod( 'navigation_white_text_on_top', $acf_navbar ) == 'enable' ) {
	$navbar_class .= ' vlt-navbar--white-text-on-top';
}

?>

<div class="hidden-md-down">

	<header class="<?php echo leedo_sanitize_class( $header_class ); ?>">

		<div class="<?php echo leedo_sanitize_class( $navbar_class ); ?>">
			<div class="container">

				<div class="vlt-navbar-inner">

					<div class="vlt-navbar-inner--left">

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-navbar-logo">
							<?php if ( leedo_get_theme_mod( 'header_fullscreen_logo' ) ) : ?>
								<img src="<?php echo leedo_get_theme_mod( 'header_fullscreen_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="black">
								<img src="<?php echo leedo_get_theme_mod( 'header_fullscreen_logo_white' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="white">
							<?php else: ?>
								<h2><?php bloginfo( 'name' ); ?></h2>
							<?php endif; ?>
						</a>
						<!-- .vlt-navbar-logo -->

					</div>
					<!-- /.vlt-navbar-inner--left -->

					<div class="vlt-navbar-inner--right">
						<div class="d-flex align-items-center">

							<a href="#" id="vlt-fullscreen-menu-open" class="vlt-menu-burger">
								<span class="line line-one"><span></span></span>
								<span class="line line-two"><span></span></span>
								<span class="line line-three"><span></span></span>
							</a>
							<!-- /.vlt-menu-burger -->

							<?php get_template_part( 'template-parts/header/partials/partial', 'header-cart-icon' ); ?>

						</div>
					</div>
					<!-- /.vlt-navbar-inner--right -->

				</div>
				<!-- /.vlt-navbar-inner -->

			</div>
		</div>
		<!-- /.vlt-navbar -->

	</header>
	<!-- /.vlt-header--fullscreen -->

	<div class="vlt-fullscreen-navigation-holder">

		<?php echo do_shortcode( html_entity_decode( leedo_get_theme_mod( 'header_fullscreen_awb_shortcode' ) ) ); ?>

		<div class="vlt-navbar vlt-navbar--white-text-on-top">
			<div class="container">

				<div class="vlt-navbar-inner">

					<div class="vlt-navbar-inner--left">

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-navbar-logo">
							<?php if ( leedo_get_theme_mod( 'header_fullscreen_logo' ) ) : ?>
								<img src="<?php echo leedo_get_theme_mod( 'header_fullscreen_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="black">
								<img src="<?php echo leedo_get_theme_mod( 'header_fullscreen_logo_white' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="white">
							<?php else: ?>
								<h2><?php bloginfo( 'name' ); ?></h2>
							<?php endif; ?>
						</a>
						<!-- .vlt-navbar-logo -->

					</div>
					<!-- /.vlt-navbar-inner--left -->

					<div class="vlt-navbar-inner--right">

						<a href="#" id="vlt-fullscreen-menu-close" class="vlt-menu-burger vlt-menu-burger--opened">
							<span class="line line-one"><span></span></span>
							<span class="line line-two"><span></span></span>
							<span class="line line-three"><span></span></span>
						</a>
						<!-- /.vlt-menu-burger -->

					</div>
					<!-- /.vlt-navbar-inner--right -->

				</div>
				<!-- /.vlt-navbar-inner -->

			</div>
		</div>
		<!-- /.vlt-navbar -->

		<nav class="vlt-fullscreen-navigation">
			<?php get_template_part( 'template-parts/header/partials/partial', 'primary-menu' ); ?>
		</nav>
		<!-- /.vlt-fullscreen-navigation -->

	</div>
	<!-- /.vlt-fullscreen-navigation-holder -->

</div>
<!-- ./hidden-md-down -->