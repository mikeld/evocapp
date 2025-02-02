<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

define( 'LEEDO_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );
define( 'LEEDO_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'LEEDO_WOOCOMMERCE', class_exists( 'WooCommerce' ) ? true : false );
define( 'LEEDO_DEVELOPMENT', false );

/**
 * After setup theme
 */
if ( ! function_exists( 'leedo_setup' ) ) {
	function leedo_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Leedo, use a find and replace
		 * to change 'leedo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'leedo', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 9999 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array(
			'gallery',
			'link',
			'quote',
			'video',
			'audio'
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => esc_html__( 'Small', 'leedo' ),
					'shortName' => esc_html__( 'S', 'leedo' ),
					'size' => 14,
					'slug' => 'small',
				),
				array(
					'name' => esc_html__( 'Normal', 'leedo' ),
					'shortName' => esc_html__( 'M', 'leedo' ),
					'size' => 18,
					'slug' => 'normal',
				),
				array(
					'name' => esc_html__( 'Large', 'leedo' ),
					'shortName' => esc_html__( 'L', 'leedo' ),
					'size' => 28,
					'slug' => 'large',
				),
				array(
					'name' => esc_html__( 'Huge', 'leedo' ),
					'shortName' => esc_html__( 'XL', 'leedo' ),
					'size' => 38,
					'slug' => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'First', 'leedo' ),
				'slug' => 'first',
				'color' => leedo_get_theme_mod( 'accent_colors' )['first'],
			),
			array(
				'name' => esc_html__( 'Second', 'leedo' ),
				'slug' => 'second',
				'color' => leedo_get_theme_mod( 'accent_colors' )['second'],
			),
			array(
				'name' => esc_html__( 'Third', 'leedo' ),
				'slug' => 'third',
				'color' => leedo_get_theme_mod( 'accent_colors' )['third'],
			),
			array(
				'name' => esc_html__( 'Fourth', 'leedo' ),
				'slug' => 'fourth',
				'color' => leedo_get_theme_mod( 'accent_colors' )['fourth'],
			),
			array(
				'name' => esc_html__( 'Gray', 'leedo' ),
				'slug' => 'gray',
				'color' => '#999999',
			),
			array(
				'name' => esc_html__( 'White', 'leedo' ),
				'slug' => 'white',
				'color' => '#ffffff',
			)
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// WooCommerce
		if ( LEEDO_WOOCOMMERCE ) {
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-slider' );
			add_theme_support( 'woocommerce', array(
				'thumbnail_image_width' => 600,
				'gallery_thumbnail_image_width' => 150,
				'single_image_width' => 600,
			) );
		}

		// register nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'leedo' ),
			'mobile-menu' => esc_html__( 'Mobile Menu', 'leedo' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'leedo' ),
		) );

		// 800x600
		add_image_size( 'leedo-800x600_crop', 800, 600, true );
		add_image_size( 'leedo-800x600', 800 );

		// 1280x720
		add_image_size( 'leedo-1280x720_crop', 1280, 720, true );
		add_image_size( 'leedo-1280x720', 1280 );

		// 1920x1080
		add_image_size( 'leedo-1920x1080_crop', 1920, 1080, true );
		add_image_size( 'leedo-1920x1080', 1920 );

		// 1920x960
		add_image_size( 'leedo-1920x960_crop', 1920, 960, true );

	}
}
add_action( 'after_setup_theme', 'leedo_setup' );

/**
 * Content width
 */
if ( ! function_exists( 'leedo_content_width' ) ) {
	function leedo_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'leedo/content_width', 1140 );
	}
}
add_action( 'after_setup_theme', 'leedo_content_width', 0 );

/**
 * Import ACF fields
 */
if ( ! LEEDO_DEVELOPMENT ) {
	function leedo_acf_show_admin_panel() {
		return apply_filters( 'leedo/acf_show_admin_panel', false );
	}
	add_filter( 'acf/settings/show_admin', 'leedo_acf_show_admin_panel' );
}

if ( ! LEEDO_DEVELOPMENT ) {
	require_once LEEDO_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

if ( ! function_exists( 'leedo_acf_save_json' ) ) {
	function leedo_acf_save_json( $path ) {
		$path = LEEDO_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
		return $path;
	}
}
add_filter( 'acf/settings/save_json', 'leedo_acf_save_json' );

if ( LEEDO_DEVELOPMENT ) {
	if ( ! function_exists( 'leedo_acf_load_json' ) ) {
		function leedo_acf_load_json( $paths ) {
			unset( $paths[0] );
			$paths[] = LEEDO_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
			return $paths;
		}
	}
	add_filter( 'acf/settings/load_json', 'leedo_acf_load_json' );
}

/**
 * Include Kirki fields
 */
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/customizer-helper.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';

/**
 * Required files
 */
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-required-plugins.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-enqueue.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-includes.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-merlin-config.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-functions.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-actions.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-filters.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-menus.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-portfolio.php';
require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-update.php';
if ( LEEDO_WOOCOMMERCE ) {
	require_once LEEDO_REQUIRE_DIRECTORY . 'inc/theme-woocommerce.php';
}