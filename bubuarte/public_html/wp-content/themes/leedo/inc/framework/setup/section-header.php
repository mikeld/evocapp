<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$priority = 0;

/**
 * Header general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_1',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_show',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Show', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'leedo' ),
		'hide' => esc_html__( 'Hide', 'leedo' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_type',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Layout', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'leedo' ),
		'fullscreen' => esc_html__( 'Fullscreen', 'leedo' ),
		'slide' => esc_html__( 'Slide', 'leedo' ),
		'aside' => esc_html__( 'Aside', 'leedo' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_2',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'leedo' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_opaque',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Navigation Opaque', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent_always',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent Always', 'leedo' ),
	'description' => esc_html__( 'Transparent also after page scrolled down.', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_sticky',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Sticky', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_hide_on_scroll',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Hide on Scroll', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_sticky',
			'operator' => '==',
			'value' => 'enable',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_white_text_on_top',
	'section' => 'section_header_general',
	'label' => esc_html__( 'White Text on Top', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );


if ( LEEDO_WOOCOMMERCE ) {

	VLT_Options::add_field( array(
		'type' => 'custom',
		'settings' => 'shg_3',
		'section' => 'section_header_general',
		'default' => '<div class="kirki-separator">' . esc_html__( 'WooCommerce', 'leedo' ) . '</div>',
		'priority' => $priority++,
		'active_callback' => array(
			array(
				'setting' => 'navigation_show',
				'operator' => '==',
				'value' => 'show',
			),
			array(
				'setting' => 'navigation_type',
				'operator' => '!=',
				'value' => 'aside',
			),
		),
	) );

	VLT_Options::add_field( array(
		'type' => 'select',
		'settings' => 'header_cart_icon',
		'section' => 'section_header_general',
		'label' => esc_html__( 'Cart Icon', 'leedo' ),
		'priority' => $priority++,
		'transport' => 'auto',
		'choices' => array(
			'show' => esc_html__( 'Show', 'leedo' ),
			'hide' => esc_html__( 'Hide', 'leedo' )
		),
		'default' => 'show',
		'active_callback' => array(
			array(
				'setting' => 'navigation_show',
				'operator' => '==',
				'value' => 'show',
			),
			array(
				'setting' => 'navigation_type',
				'operator' => '!=',
				'value' => 'aside',
			),
		),
	) );

}

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_4',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Menu Sounds', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'menu_toggle_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Menu Toggle Sound', 'leedo' ),
	'description' => esc_html__( 'Sounds when you open / close menu.', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'upload',
	'settings' => 'open_click_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Audio for "Open Menu"', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'menu_toggle_sound',
			'operator' => '==',
			'value' => 'enable',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'upload',
	'settings' => 'close_click_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Audio for "Close Menu"', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'menu_toggle_sound',
			'operator' => '==',
			'value' => 'enable',
		)
	),
) );

/**
 * Header default
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shd_1',
	'section' => 'section_header_default',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_default_logo',
	'section' => 'section_header_default',
	'label' => esc_html__( 'Logo', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_default_logo_white',
	'section' => 'section_header_default',
	'label' => esc_html__( 'Logo White', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_default_logo_height',
	'section' => 'section_header_default',
	'label' => esc_html__( 'Logo Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-header--default .vlt-navbar-logo img',
			'property' => 'height'
		)
	)
) );

/**
 * Header fullscreen
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shf_1',
	'section' => 'section_header_fullscreen',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'header_fullscreen_awb_shortcode',
	'section' => 'section_header_fullscreen',
	'label' => esc_html__( 'AWB Shortcode', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shf_2',
	'section' => 'section_header_fullscreen',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_fullscreen_logo',
	'section' => 'section_header_fullscreen',
	'label' => esc_html__( 'Logo', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_fullscreen_logo_white',
	'section' => 'section_header_fullscreen',
	'label' => esc_html__( 'Logo White', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_fullscreen_logo_height',
	'section' => 'section_header_fullscreen',
	'label' => esc_html__( 'Logo Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '
				.vlt-header--fullscreen .vlt-navbar-logo img,
				.vlt-fullscreen-navigation-holder .vlt-navbar-logo img
			',
			'property' => 'height'
		)
	)
) );

/**
 * Header slide
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shs_1',
	'section' => 'section_header_slide',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'header_slide_background',
	'section' => 'section_header_slide',
	'label' => esc_html__( 'Header Background', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'background-color' => '#191919',
		'background-image' => '',
		'background-repeat' => 'no-repeat',
		'background-position' => 'center center',
		'background-size' => 'cover',
		'background-attachment' => 'scroll',
	),
	'output' => array(
		array(
			'element' => '.vlt-slide-navigation-holder'
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shs_2',
	'section' => 'section_header_slide',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_slide_logo',
	'section' => 'section_header_slide',
	'label' => esc_html__( 'Logo', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_slide_logo_white',
	'section' => 'section_header_slide',
	'label' => esc_html__( 'Logo White', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_slide_logo_height',
	'section' => 'section_header_slide',
	'label' => esc_html__( 'Logo Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '
				.vlt-header--slide .vlt-navbar-logo img
			',
			'property' => 'height'
		)
	)
) );

/**
 * Header aside
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sha_1',
	'section' => 'section_header_aside',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'header_aside_background',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Header Background', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'background-color' => '#ffffff',
		'background-image' => '',
		'background-repeat' => 'no-repeat',
		'background-position' => 'center center',
		'background-size' => 'cover',
		'background-attachment' => 'scroll',
	),
	'output' => array(
		array(
			'element' => '.vlt-header--aside'
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sha_2',
	'section' => 'section_header_aside',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_aside_logo',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Logo', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_aside_logo_height',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Logo Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-aside-navigation-logo img',
			'property' => 'height'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sha_3',
	'section' => 'section_header_aside',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Socials', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'header_aside_social_list',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Social List', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__( 'social', 'leedo' )
	),
	'fields' => array(
		'social_icon' => array(
			'type' => 'select',
			'label' => esc_html__( 'Social Icon', 'leedo' ),
			'choices' => leedo_get_social_icons()
		),
		'social_url' => array(
			'type' => 'text',
			'label' => esc_html__( 'Social Url', 'leedo' )
		),
	),
	'default' => array(
		array(
			'social_icon' => 'fa fa-facebook',
			'social_url' => '#',
		),
		array(
			'social_icon' => 'fa fa-twitter',
			'social_url' => '#',
		),
		array(
			'social_icon' => 'fa fa-pinterest',
			'social_url' => '#',
		),
		array(
			'social_icon' => 'fa fa-instagram',
			'social_url' => '#',
		)
	)
) );

/**
 * Header mobile
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shm_1',
	'section' => 'section_header_mobile',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_mobile_logo',
	'section' => 'section_header_mobile',
	'label' => esc_html__( 'Logo', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_mobile_logo_height',
	'section' => 'section_header_mobile',
	'label' => esc_html__( 'Logo Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-header--mobile .vlt-navbar-logo img',
			'property' => 'height'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shm_2',
	'section' => 'section_header_mobile',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Additional', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'header_mobile_burger_position',
	'section' => 'section_header_mobile',
	'label' => esc_html__( 'Burger Position', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'left' => esc_html__( 'Left', 'leedo' ),
		'right' => esc_html__( 'Right', 'leedo' )
	),
	'default' => 'left'
) );