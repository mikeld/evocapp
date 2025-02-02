<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Register sidebars
 */
if ( ! function_exists( 'leedo_register_sidebar' ) ) {
	function leedo_register_sidebar() {

		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'leedo' ),
			'id' => 'blog_sidebar',
			'description' => esc_html__( 'Blog Widget Area', 'leedo' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );

		for ( $i = 1; $i <= 4; $i++ ) {
			register_sidebar( array(
				'name' => sprintf( esc_html__( 'Footer Sidebar: %s Column', 'leedo' ), $i ),
				'id' => sanitize_key( 'footer_sidebar_' . $i ),
				'description' => esc_html__( 'Footer Widget Area', 'leedo' ),
				'before_widget' => '<div id="%1$s" class="vlt-widget vlt-widget--white %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="vlt-widget__title vlt-widget__title--white">',
				'after_title' => '</h5>'
			) );
		}

		if ( LEEDO_WOOCOMMERCE ) {
			register_sidebar( array(
				'name' => esc_html__( 'Shop Sidebar', 'leedo' ),
				'id' => 'shop_sidebar',
				'description' => esc_html__( 'Shop Widget Area', 'leedo' ),
				'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="vlt-widget__title">',
				'after_title' => '</h5>'
			) );
		}

	}
}
add_action( 'widgets_init', 'leedo_register_sidebar' );

/**
 * Before site wrapper action
 */
if ( ! function_exists( 'leedo_before_site' ) ) {
	function leedo_before_site() {

		$class = 'vlt-site-wrapper';

		switch ( leedo_get_theme_mod( 'preloader_style' ) ) {
			case 'none':
				break;
			case 'image':
				echo '<div class="vlt-site-preloader"><div class="image"><img src="' . leedo_get_theme_mod( 'preloader_image' ) . '" alt="' . get_bloginfo( 'name' ) . '"></div></div>';
				break;
			case 'cube':
				echo '<div class="vlt-site-preloader"><div class="cube"><span></span><span></span><span></span><span></span></div></div>';
				break;
			case 'signal':
				echo '<div class="vlt-site-preloader"><div class="signal"><span></span><span></span><span></span><span></span><span></span></div></div>';
				break;
			case 'spinner':
				echo '<div class="vlt-site-preloader"><div class="spinner"><span></span></span></div></div>';
				break;
		}

		echo '<div class="' . leedo_sanitize_class( $class ) . '">';

	}
}
add_action( 'leedo/before_site', 'leedo_before_site' );

/**
 * After site wrapper action
 */
if ( ! function_exists( 'leedo_after_site' ) ) {
	function leedo_after_site() {
		echo '</div>';
	}
}
add_action( 'leedo/after_site', 'leedo_after_site' );

/**
 * Before site wrapper inner action
 */
if ( ! function_exists( 'leedo_before_main_content' ) ) {
	function leedo_before_main_content() {

		$class = 'vlt-site-wrapper__inner';

		echo '<div class="' . leedo_sanitize_class( $class ) . '">';
	}
}
add_action( 'leedo/before_main_content', 'leedo_before_main_content' );

/**
 * After site wrapper inner action
 */
if ( ! function_exists( 'leedo_after_main_content' ) ) {
	function leedo_after_main_content() {
		echo '</div>';
	}
}
add_action( 'leedo/after_main_content', 'leedo_after_main_content' );

/**
 * Back to top
 */
if ( ! function_exists( 'leedo_site_back_to_top' ) ) {
	function leedo_site_back_to_top() {
		$acf_back_to_top = leedo_get_theme_mod( 'page_custom_back_to_top', true );
		if ( leedo_get_theme_mod( 'back_to_top', $acf_back_to_top ) == 'show' ) {
			echo '<a href="#" class="vlt-btn vlt-btn--secondary vlt-btn--effect vlt-btn--go-top hidden"><span><i class="leedo-chevron-up"></i></span></a>';
		}
	}
}
add_action( 'leedo/site_backtotop', 'leedo_site_back_to_top' );

/**
 * Change admin logo
 */
if ( ! function_exists( 'leedo_change_admin_logo' ) ) {
	function leedo_change_admin_logo() {
		if ( ! leedo_get_theme_mod( 'login_logo_image' ) ) {
			return;
		}
		$image_url = leedo_get_theme_mod( 'login_logo_image' );
		$image_w = leedo_get_theme_mod( 'login_logo_image_width' );
		$image_h = leedo_get_theme_mod( 'login_logo_image_height' );
		echo '<style type="text/css">
			h1 a {
				background: transparent url(' . esc_url( $image_url ) . ') 50% 50% no-repeat !important;
				width:' . esc_attr( $image_w ) . '!important;
				height:' . esc_attr( $image_h ) . '!important;
				background-size: cover !important;
			}
		</style>';
	}
}
add_action( 'login_head', 'leedo_change_admin_logo' );

/**
 * Prints Tracking code
 */
if ( ! function_exists( 'leedo_print_tracking_code' ) ) {
	function leedo_print_tracking_code() {
		$tracking_code = leedo_get_theme_mod( 'tracking_code' );
		if ( ! empty( $tracking_code ) ) {
			echo '' . $tracking_code;
		}
	}
}
add_action( 'wp_head', 'leedo_print_tracking_code' );