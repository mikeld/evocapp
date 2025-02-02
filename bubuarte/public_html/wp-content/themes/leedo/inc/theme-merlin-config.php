<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

$wizard = new Merlin(

	$config = array(
		'directory' => 'merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url' => 'merlin', // The wp-admin page slug where Merlin WP loads.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode' => LEEDO_DEVELOPMENT, // Enable development mode for testing.
		'license_step' => false, // EDD license activation step.
		'license_required' => false, // Require the license activation step.
		'license_help_url' => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url' => '', // EDD_Theme_Upater_Admin remote_api_url.
		'edd_item_name' => '', // EDD_Theme_Upater_Admin item_name.
		'edd_theme_slug' => '', // EDD_Theme_Upater_Admin item_slug.
	),
	$strings = array(
		'admin-menu' => esc_html__( 'Theme Setup', 'leedo' ),
		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s' => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'leedo' ),
		'return-to-dashboard' => esc_html__( 'Return to the dashboard', 'leedo' ),
		'ignore' => esc_html__( 'Disable this wizard', 'leedo' ),
		'btn-skip' => esc_html__( 'Skip', 'leedo' ),
		'btn-next' => esc_html__( 'Next', 'leedo' ),
		'btn-start' => esc_html__( 'Start', 'leedo' ),
		'btn-no' => esc_html__( 'Cancel', 'leedo' ),
		'btn-plugins-install' => esc_html__( 'Install', 'leedo' ),
		'btn-child-install' => esc_html__( 'Install', 'leedo' ),
		'btn-content-install' => esc_html__( 'Install', 'leedo' ),
		'btn-import' => esc_html__( 'Import', 'leedo' ),
		'btn-license-activate' => esc_html__( 'Activate', 'leedo' ),
		'btn-license-skip' => esc_html__( 'Later', 'leedo' ),
		/* translators: Theme Name */
		'license-header%s' => esc_html__( 'Activate %s', 'leedo' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'leedo' ),
		/* translators: Theme Name */
		'license%s' => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'leedo' ),
		'license-label' => esc_html__( 'License key', 'leedo' ),
		'license-success%s' => esc_html__( 'The theme is already registered, so you can go to the next step!', 'leedo' ),
		'license-json-success%s' => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'leedo' ),
		'license-tooltip' => esc_html__( 'Need help?', 'leedo' ),
		/* translators: Theme Name */
		'welcome-header%s' => esc_html__( 'Welcome to %s', 'leedo' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'leedo' ),
		'welcome%s' => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'leedo' ),
		'welcome-success%s' => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'leedo' ),
		'child-header' => esc_html__( 'Install Child Theme', 'leedo' ),
		'child-header-success' => esc_html__( 'You\'re good to go!', 'leedo' ),
		'child' => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'leedo' ),
		'child-success%s' => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'leedo' ),
		'child-action-link' => esc_html__( 'Learn about child themes', 'leedo' ),
		'child-json-success%s' => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'leedo' ),
		'child-json-already%s' => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'leedo' ),
		'plugins-header' => esc_html__( 'Install Plugins', 'leedo' ),
		'plugins-header-success' => esc_html__( 'You\'re up to speed!', 'leedo' ),
		'plugins' => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'leedo' ),
		'plugins-success%s' => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'leedo' ),
		'plugins-action-link' => esc_html__( 'Advanced', 'leedo' ),
		'import-header' => esc_html__( 'Import Content', 'leedo' ),
		'import' => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'leedo' ),
		'import-action-link' => esc_html__( 'Advanced', 'leedo' ),
		'ready-header' => esc_html__( 'All done. Have fun!', 'leedo' ),
		/* translators: Theme Author */
		'ready%s' => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'leedo' ),
		'ready-action-link' => esc_html__( 'Extras', 'leedo' ),
		'ready-big-button' => esc_html__( 'View your website', 'leedo' ),
		'ready-link-1' => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__( 'Explore WordPress', 'leedo' ) ),
		'ready-link-2' => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://vlthemes.ticksy.com/', esc_html__( 'Get Theme Support', 'leedo' ) ),
		'ready-link-3' => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'leedo' ) ),
	)
);

/**
 * Demo import
 */
if ( ! function_exists( 'leedo_demo_import_files' ) ) {
	function leedo_demo_import_files() {
		return array(
			array(
				'import_file_name' => esc_html__( 'Demo Import', 'leedo' ),
				'local_import_file' => LEEDO_REQUIRE_DIRECTORY . 'inc/demo/demo-content.xml',
				'local_import_widget_file' => LEEDO_REQUIRE_DIRECTORY . 'inc/demo/widgets.wie',
				'local_import_customizer_file' => LEEDO_REQUIRE_DIRECTORY . 'inc/demo/customizer.dat'
			),
		);
	}
}
add_filter( 'merlin_import_files', 'leedo_demo_import_files' );
add_filter( 'pt-ocdi/import_files', 'leedo_demo_import_files' );

/**
 * After setup function
 */
if ( ! function_exists( 'leedo_after_import_setup' ) ) {
	function leedo_after_import_setup() {

		global $wp_rewrite;

		// Set menus
		$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
			'primary-menu' => $primary_menu->term_id,
			'footer-menu' => $footer_menu->term_id
		) );

		// Set pages
		$front_page = get_page_by_title( 'Homepage 01' );
		if ( isset( $front_page->ID ) ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page->ID );
		}

		// Update option
		update_option( 'date_format', 'd F Y' );

		// Update permalink
		$wp_rewrite->set_permalink_structure( '/%postname%/' );

		// Update BSF Global Scripts
		if ( function_exists( 'bsf_update_option' ) ) {
			bsf_update_option( 'ultimate_global_scripts', 'enable' );
		}

		// Import Revolution Slider
		if ( class_exists( 'RevSlider' ) ) {
			$revo_slider = new RevSlider();

			$slider_aliases = $revo_slider->getAllSliderAliases();
			$slider_array = array(
				'landing',
				'homepage-01',
				'homepage-02',
				'homepage-03',
				'homepage-04',
				'homepage-08',
				'homepage-13',
				'homepage-14',
				'homepage-15'
			);

			foreach ( $slider_array as $slider ) {
				if ( ! in_array( $slider, $slider_aliases ) ) {
					$path = LEEDO_REQUIRE_DIRECTORY . 'inc/demo/sliders/'. $slider .'.zip';
					if ( file_exists( $path ) ) {
						$revo_slider->importSliderFromPost( true, true, $path );
					}
				}
			}
		}

	}
}
add_action( 'merlin_after_all_import', 'leedo_after_import_setup' );
add_action( 'pt-ocdi/after_import', 'leedo_after_import_setup' );

/**
 * WPBakery set as theme
 */
if ( ! function_exists( 'leedo_vc_set_as_theme' ) ) {
	function leedo_vc_set_as_theme() {

		if ( function_exists( 'vc_set_default_editor_post_types' ) ) {
			vc_set_default_editor_post_types( array(
				'page',
				'post',
				'portfolio',
				'product'
			) );
		}

		if ( function_exists( 'vc_set_as_theme' ) ) {
			vc_set_as_theme( $disable_updater = true );
		}

	}
}
add_action( 'vc_before_init', 'leedo_vc_set_as_theme' );