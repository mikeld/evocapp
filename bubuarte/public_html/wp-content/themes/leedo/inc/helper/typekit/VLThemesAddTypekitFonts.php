<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

if ( ! class_exists( 'VLThemesAddTypekitFonts' ) ) {
	class VLThemesAddTypekitFonts {

		/**
		 * [__construct]
		 * @param string $typekit_id
		 */
		public function __construct() {

			$theme_info = wp_get_theme();
			$this->theme_version = $theme_info[ 'Version' ];
			$this->typekit_id = leedo_get_theme_mod( 'typekit_id' );

			add_action( 'wp_enqueue_scripts', array( $this, 'load_typekit' ) );

		}

		public function load_typekit() {
			wp_enqueue_style( 'typekit', 'https://use.typekit.net/' . esc_attr( $this->sanitize_typekit_id( $this->typekit_id ) ) .'.css', array(), $this->theme_version );
		}

		/**
		 * [sanitize_typekit_id]
		 * @param string $typekit_id
		 * @return string
		 */
		public function sanitize_typekit_id( $typekit_id ) {
			return preg_replace( '/[^0-9a-z]+/', '', $typekit_id );
		}

	}

	if ( leedo_get_theme_mod( 'typekit' ) == 'enable' ) {
		new VLThemesAddTypekitFonts;
	}
}