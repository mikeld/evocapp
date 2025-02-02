<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
* Theme path image
*/
$theme_path_images = LEEDO_THEME_DIRECTORY . 'assets/img/';

/**
 * Wrapper for Kirki
 */
if ( ! class_exists( 'VLT_Options' ) ) {
	class VLT_Options {

		private static $default_options = array();

		public static function add_config( $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_config( 'leedo_customize', $args );
			}
		}

		public static function add_panel( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_panel( $name, $args );
			}
		}

		public static function add_section( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_section( $name, $args );
			}
		}

		public static function add_field( $args ) {
			if ( isset( $args ) && is_array( $args ) ) {
				if ( class_exists( 'Kirki' ) ) {
					Kirki::add_field( 'leedo_customize', $args );
				}
				if ( isset( $args['settings'] ) && isset( $args['default'] ) ) {
					self::$default_options[$args['settings']] = $args['default'];
				}
			}
		}

		public static function get_option( $name, $default = null ) {
			$value = get_theme_mod( $name, null );

			if ( $value === null ) {
				$value = isset( self::$default_options[$name] ) ? self::$default_options[$name] : null;
			}

			if ( $value === null ) {
				$value = $default;
			}

			return $value;
		}

	}
}

/**
 * Custom get_theme_mod
 */
if ( ! function_exists( 'leedo_get_theme_mod' ) ) {
	function leedo_get_theme_mod( $name = null, $use_acf = null, $postID = null, $acf_name = null ) {

		$value = null;

		if ( $name == null ) {
			return $value;
		}

		// try get value from meta box
		if ( $use_acf ) {
			$value = leedo_get_field( $acf_name ? $acf_name : $name, $postID );
		}

		// get value from options
		if ( $value == null ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		if ( is_archive() || is_search() || is_404() ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		$value = apply_filters( 'leedo/get_theme_mod', $value, $name );

		return $value;

	}
}

/**
 * Get value from acf field
 */
if ( ! function_exists( 'leedo_get_field' ) ) {
	function leedo_get_field( $name = null, $postID = null ) {

		$value = null;

		// try get value from meta box
		if ( function_exists( 'get_field' ) ) {
			if ( $postID == null ) {
				$postID = get_the_ID();
			}
			$value = get_field( $name, $postID );
		}

		return $value;

	}
}

/**
 * Include Typekit class
 */
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/helper/typekit/VLThemesAddTypekitFonts.php';

/**
 * Get social icons
 */
if ( ! function_exists( 'leedo_get_social_icons' ) ) {
	function leedo_get_social_icons() {
		$social_icons = array(
			'fa fa-twitch' => esc_html__( 'Twitch', 'leedo' ),
			'fa fa-vimeo' => esc_html__( 'Vimeo', 'leedo' ),
			'fa fa-youtube' => esc_html__( 'Youtube', 'leedo' ),
			'fa fa-facebook' => esc_html__( 'Facebook', 'leedo' ),
			'fa fa-google-plus' => esc_html__( 'Google-Plus', 'leedo' ),
			'fa fa-twitter' => esc_html__( 'Twitter', 'leedo' ),
			'fa fa-pinterest' => esc_html__( 'Pinterest', 'leedo' ),
			'fa fa-instagram' => esc_html__( 'Instagram', 'leedo' ),
			'fa fa-linkedin' => esc_html__( 'LinkedIn', 'leedo' ),
			'fa fa-behance' => esc_html__( 'Behance', 'leedo' ),
			'fa fa-odnoklassniki' => esc_html__( 'Odnoklassniki', 'leedo' ),
			'fa fa-skype' => esc_html__( 'Skype', 'leedo' ),
			'fa fa-vk' => esc_html__( 'VK', 'leedo' ),
			'fa fa-steam' => esc_html__( 'Steam', 'leedo' ),
			'fa fa-bitbucket' => esc_html__( 'Bitbucket', 'leedo' ),
			'fa fa-dropbox' => esc_html__( 'Dropbox', 'leedo' ),
			'fa fa-dribbble' => esc_html__( 'Dribbble', 'leedo' ),
			'fa fa-deviantart' => esc_html__( 'Deviantart', 'leedo' ),
			'fa fa-flickr' => esc_html__( 'Flickr', 'leedo' ),
			'fa fa-foursquare' => esc_html__( 'Foursquare', 'leedo' ),
			'fa fa-github' => esc_html__( 'Github', 'leedo' ),
			'fa fa-medium' => esc_html__( 'Medium', 'leedo' ),
			'fa fa-paypal' => esc_html__( 'PayPal', 'leedo' ),
			'fa fa-reddit' => esc_html__( 'Reddit', 'leedo' ),
			'fa fa-soundcloud' => esc_html__( 'SoundCloud', 'leedo' ),
			'fa fa-slack' => esc_html__( 'Slack', 'leedo' ),
			'fa fa-tumblr' => esc_html__( 'Tumblr', 'leedo' ),
			'fa fa-wordpress' => esc_html__( 'WordPress', 'leedo' )
		);
		return apply_filters( 'leedo/get_social_icons', $social_icons );
	}
}

/**
 * Get custom fonts
 */
if ( ! function_exists( 'leedo_add_custom_choice' ) ) {
	function leedo_add_custom_choice( $custom_choice = array() ) {

		/**
		 * [$custom_fonts]
		 * @var array
		 */
		$custom_fonts = leedo_get_theme_mod( 'custom_fonts' );

		if ( ! $custom_fonts ) {
			return $custom_choice;
		}

		/**
		 * [$children]
		 * @var array
		 */
		$children = array();

		/**
		 * [$variants]
		 * @var array
		 */
		$variants = array();

		foreach ( $custom_fonts as $key => $custom_font ) {
			$children[] = array(
				'id' => $custom_font['font_id'],
				'text' => $custom_font['font_text'],
			);
			$variants[$custom_font['font_id']] = $custom_font['font_variants'];
		}

		/**
		 * [$choices]
		 * @var array
		 */
		$choices = array(
			'fonts' => array(
				'standard' => array(
					'serif',
					'sans-serif',
				),
				'families' => array(
					'custom' => array(
						'text' => esc_html__( 'Custom Fonts', 'leedo' ),
						'children' => $children,
					),
				),
				'variants' => $variants,
			)
		);

		$choices = array_merge( $choices, $custom_choice );

		return apply_filters( 'leedo/add_custom_choice', $choices );

	}
}