<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Required plugins
 */
if ( ! function_exists( 'leedo_tgm_plugins' ) ) {
	function leedo_tgm_plugins() {

		$source = 'http://vlthemes.com/plugins/';

		$plugins = array(
			array(
				'name' => esc_html__( 'Kirki', 'leedo' ),
				'slug' => 'kirki',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Leedo Helper Plugin', 'leedo' ),
				'slug' => 'leedo_helper_plugin',
				'source' => esc_url( $source . 'leedo_helper_plugin.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Advanced Custom Fields PRO', 'leedo' ),
				'slug' => 'advanced-custom-fields-pro',
				'source' => esc_url( $source . 'advanced-custom-fields-pro.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'WPBakery Page Builder', 'leedo' ),
				'slug' => 'js_composer',
				'source' => esc_url( $source . 'js_composer.zip' ),
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Templatera', 'leedo' ),
				'slug' => 'templatera',
				'source' => esc_url( $source . 'templatera.zip' ),
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Revolution Slider', 'leedo' ),
				'slug' => 'revslider',
				'source' => esc_url( $source . 'revslider.zip' ),
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Ultimate Addons for Visual Composer', 'leedo' ),
				'slug' => 'Ultimate_VC_Addons',
				'source' => esc_url( $source . 'Ultimate_VC_Addons.zip' ),
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Envato Market', 'leedo' ),
				'slug' => 'envato-market',
				'source' => esc_url( $source . 'envato-market.zip' ),
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Visual Portfolio', 'leedo' ),
				'slug' => 'visual-portfolio',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Advanced WordPress Backgrounds', 'leedo' ),
				'slug' => 'advanced-backgrounds',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Contact Form 7', 'leedo' ),
				'slug' => 'contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'WooCommerce', 'leedo' ),
				'slug' => 'woocommerce',
				'required' => false,
			),
		);

		if ( leedo_get_theme_mod( 'site_gdpr' ) == 'enable' ) {

			$plugins[] = array(
				'name' => esc_html__( 'GDPR Framework', 'leedo' ),
				'slug' => 'gdpr-framework',
				'required' => false,
			);

			$plugins[] = array(
				'name' => esc_html__( 'WP GDPR Compliance', 'leedo' ),
				'slug' => 'wp-gdpr-compliance',
				'required' => false,
			);

		}

		tgmpa( $plugins );
	}
}
add_action( 'tgmpa_register', 'leedo_tgm_plugins' );

/**
 * Print notice if helper plugin is not installed
 */
if ( ! function_exists( 'leedo_helper_plugin_notice' ) ) {
	function leedo_helper_plugin_notice() {
		if ( class_exists( 'VLThemesHelperPlugin' ) ) {
			return;
		}
		echo '<div class="notice notice-info is-dismissible"><p>' . sprintf( __( 'Please activate <strong>%s</strong> before your work with this theme.', 'leedo' ), 'Leedo Helper Plugin' ) . '</p></div>';
	}
}
add_action( 'admin_notices', 'leedo_helper_plugin_notice' );