<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$priority = 0;

/**
 * General
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_1',
	'section' => 'section_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Colors', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'body_background',
	'section' => 'section_general',
	'label' => esc_html__( 'Site Background', 'leedo' ),
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
			'element' => 'body'
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'multicolor',
	'settings' => 'accent_colors',
	'section' => 'section_general',
	'label' => esc_html__( 'Accent Colors', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'first' => esc_html__( 'First', 'leedo' ),
		'second' => esc_html__( 'Second', 'leedo' ),
		'third' => esc_html__( 'Third', 'leedo' ),
		'fourth' => esc_html__( 'Fourth', 'leedo' )
	),
	'default' => array(
		'first' => '#ee3364',
		'second' => '#00bec5',
		'third' => '#fdf4b4',
		'fourth' => '#1f0e49'
	),
	'output' => array(
		array(
			'choice' => 'first',
			'element' => ':root',
			'property' => '--p1',
			'context' => array( 'editor', 'front' ),
		),
		array(
			'choice' => 'second',
			'element' => ':root',
			'property' => '--p2',
			'context' => array( 'editor', 'front' ),
		),
		array(
			'choice' => 'third',
			'element' => ':root',
			'property' => '--p3',
			'context' => array( 'editor', 'front' ),
		),
		array(
			'choice' => 'fourth',
			'element' => ':root',
			'property' => '--p4',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_2',
	'section' => 'section_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Preloader', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'preloader_style',
	'section' => 'section_general',
	'label' => esc_html__( 'Style Preloader', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'leedo' ),
		'image' => esc_html__( 'Image', 'leedo' ),
		'cube' => esc_html__( 'Cube', 'leedo' ),
		'signal' => esc_html__( 'Signal', 'leedo' ),
		'spinner' => esc_html__( 'Spinner', 'leedo' ),
	),
	'default' => 'image'
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'preloader_image',
	'section' => 'section_general',
	'label' => esc_html__( 'Preloader Image', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . 'preloader.gif',
	'active_callback' => array(
		array(
			'setting' => 'preloader_style',
			'operator' => '==',
			'value' => 'image'
		),
		array(
			'setting' => 'preloader_style',
			'operator' => '!=',
			'value' => 'none'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'preloader_image_height',
	'section' => 'section_general',
	'label' => esc_html__( 'Preloader Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '100px',
	'output' => array(
		array(
			'element' => '.vlt-site-preloader .image img',
			'property' => 'height'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'preloader_style',
			'operator' => '==',
			'value' => 'image'
		),
		array(
			'setting' => 'preloader_style',
			'operator' => '!=',
			'value' => 'none'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'nprogress',
	'section' => 'section_general',
	'label' => esc_html__( 'Nprogress', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'disable',
	'active_callback' => array(
		array(
			'setting' => 'preloader_style',
			'operator' => '!=',
			'value' => 'none'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_3',
	'section' => 'section_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Additional', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'back_to_top',
	'section' => 'section_general',
	'label' => esc_html__( '"Back to Top" Button', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'leedo' ),
		'hide' => esc_html__( 'Hide', 'leedo' )
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'animation_on_scroll',
	'section' => 'section_general',
	'label' => esc_html__( 'Animation on scroll', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'lowercase_mode',
	'section' => 'section_general',
	'label' => esc_html__( 'Lowercase Mode', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'tracking_code',
	'section' => 'section_general',
	'label' => esc_html__( 'Tracking Code', 'leedo' ),
	'description' => esc_html__( 'Copy and paste your tracking code here.', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );

/**
 * Site Protection
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'gsp_1',
	'section' => 'general_site_protection',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Click Copyright', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'site_protection',
	'section' => 'general_site_protection',
	'label' => esc_html__( 'Site Protection', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'leedo' ),
		'hide' => esc_html__( 'Hide', 'leedo' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'site_protection_content',
	'section' => 'general_site_protection',
	'label' => esc_html__( 'Content', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'site_protection',
			'operator' => '==',
			'value' => 'show'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'gsp_2',
	'section' => 'general_site_protection',
	'default' => '<div class="kirki-separator">' . esc_html__( 'GDPR', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'site_gdpr',
	'section' => 'general_site_protection',
	'label' => esc_html__( 'GDPR Compatibility', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'site_gdpr_content',
	'section' => 'general_site_protection',
	'label' => esc_html__( 'Checkbox Content', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'html',
	),
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'site_gdpr',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

/**
 * Selection
 */
VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_text_color',
	'section' => 'general_selection',
	'label' => esc_html__( 'Selection Text Color', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#ffffff',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'color',
			'suffix' => '!important'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_background_color',
	'section' => 'general_selection',
	'label' => esc_html__( 'Selection Background Color', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true
	),
	'default' => '#ee3364',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'background-color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'background-color',
			'suffix' => '!important'
		)
	)
) );

/**
 * Scrollbar
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_scrollbar',
	'section' => 'general_scrollbar',
	'label' => esc_html__( 'Custom Scrollbar', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_track_color',
	'section' => 'general_scrollbar',
	'label' => esc_html__( 'Track Color', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_bar_color',
	'section' => 'general_scrollbar',
	'label' => esc_html__( 'Bar Color', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar-thumb',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'custom_scrollbar_width',
	'section' => 'general_scrollbar',
	'label' => esc_html__( 'Bar Width', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'min' => '0',
		'max' => '16',
		'step' => '2'
	),
	'default' => '',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'width',
			'units' => 'px'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

/**
 * Admin logo
 */
VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'login_logo_image',
	'section' => 'general_login_logo',
	'label' => esc_html__( 'Authorization Logo', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . 'vlthemes.png',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_height',
	'section' => 'general_login_logo',
	'label' => esc_html__( 'Logo Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '115px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_width',
	'section' => 'general_login_logo',
	'label' => esc_html__( 'Logo Width', 'leedo' ),
	'transport' => 'auto',
	'priority' => $priority++,
	'default' => '102px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );