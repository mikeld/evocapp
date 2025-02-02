<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
* Add config
*/
VLT_Options::add_config( array(
	'capability' => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

$first_level = 10;
$second_level = 10;

/**
 * General
 */
VLT_Options::add_panel( 'panel_general', array(
	'title' => esc_html__( 'General Options', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'section_general', array(
	'panel' => 'panel_general',
	'title' => esc_html__( 'General Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'general_site_protection', array(
	'panel' => 'panel_general',
	'title' => esc_html__( 'Site Protection', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-shield',
) );

VLT_Options::add_section( 'general_selection', array(
	'panel' => 'panel_general',
	'title' => esc_html__( 'Selection', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-underline',
) );

VLT_Options::add_section( 'general_scrollbar', array(
	'panel' => 'panel_general',
	'title' => esc_html__( 'Scrollbar', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-sort',
) );

VLT_Options::add_section( 'general_login_logo', array(
	'panel' => 'panel_general',
	'title' => esc_html__( 'Login Page', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-lock',
) );

require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-general.php';

/**
 * Header
 */
VLT_Options::add_panel( 'panel_header_general', array(
	'title' => esc_html__( 'Header Options', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-up-alt',
) );

VLT_Options::add_section( 'section_header_general', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'General Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'section_header_default', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'Header Default', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_header_fullscreen', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'Header Fullscreen', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_header_slide', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'Header Slide', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_header_aside', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'Header Aside', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_header_mobile', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'Header Mobile', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-header.php';

/**
 * Footer
 */
VLT_Options::add_panel( 'panel_footer', array(
	'title' => esc_html__( 'Footer Options', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-down-alt',
) );

VLT_Options::add_section( 'section_footer_general', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'General Options', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'section_footer_style_1', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'Footer Style 1', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_footer_style_2', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'Footer Style 2', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_footer_style_3', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'Footer Style 3', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_footer_style_4', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'Footer Style 4', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_footer_style_5', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'Footer Style 5', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_footer_style_6', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'Footer Style 6', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_footer_widgetized', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'Footer Widgetized', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

VLT_Options::add_section( 'section_footer_shortcode', array(
	'panel' => 'panel_footer',
	'title' => esc_html__( 'Footer Shortcode', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-footer.php';

/**
 * Pages
 */
VLT_Options::add_panel( 'panel_page', array(
	'title' => esc_html__( 'Page Options', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-page',
) );

VLT_Options::add_section( 'section_blog_general', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'General Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'section_blog', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Blog Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-post',
) );

VLT_Options::add_section( 'section_archive', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Archive Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-category',
) );

VLT_Options::add_section( 'section_search', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Search Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-search',
) );

VLT_Options::add_section( 'section_single_post', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Single Post', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-welcome-write-blog',
) );

VLT_Options::add_section( 'section_404', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Page 404', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-warning',
) );

require LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-pages.php';

/**
 * Portfolio
 */
VLT_Options::add_section( 'section_single_portfolio', array(
	'panel' => '',
	'title' => esc_html__( 'Portfolio Options', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-grid-view',
) );

require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-portfolio.php';

# Woocommerce

if ( LEEDO_WOOCOMMERCE ) {

	VLT_Options::add_section( 'section_woocommerce', array(
		'panel' => 'woocommerce',
		'title' => esc_html__( 'Leedo Settings', 'leedo' ),
		'priority' => $second_level++,
	) );

	require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-woocommerce.php';

}

/**
 * Typography
 */
VLT_Options::add_panel( 'panel_typography', array(
	'title' => esc_html__( 'Typography Options', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_fonts', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'General Fonts', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_text', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Text Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-text',
) );

VLT_Options::add_section( 'typography_headings', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Heading Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-textcolor',
) );

VLT_Options::add_section( 'typography_blockquote', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Blockquote Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-quote',
) );

VLT_Options::add_section( 'typography_buttons', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Button Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-links',
) );

VLT_Options::add_section( 'typography_input', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Input Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-edit',
) );

VLT_Options::add_section( 'typography_widget', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Widget Options', 'leedo' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-welcome-widgets-menus',
) );

require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-typography.php';

/**
 * Custom Fonts
 */
VLT_Options::add_section( 'section_custom_fonts', array(
	'title' => esc_html__( 'Custom Fonts', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-editor-spellcheck'
) );

require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-custom-fonts.php';

/**
 * Typekit
 */
VLT_Options::add_section( 'section_typekit', array(
	'title' => esc_html__( 'Adobe Typekit', 'leedo' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-editor-textcolor'
) );

require_once LEEDO_REQUIRE_DIRECTORY . 'inc/framework/setup/section-typekit.php';