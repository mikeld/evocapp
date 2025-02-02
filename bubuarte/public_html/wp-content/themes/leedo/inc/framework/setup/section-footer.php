<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$priority = 0;

/**
 * Footer general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_1',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_show',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Show', 'leedo' ),
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
	'settings' => 'footer_layout',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Layout', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'hide' => esc_html__( 'Hide', 'leedo' ),
		'style-1' => esc_html__( 'Style 1', 'leedo' ),
		'style-2' => esc_html__( 'Style 2', 'leedo' ),
		'style-3' => esc_html__( 'Style 3', 'leedo' ),
		'style-4' => esc_html__( 'Style 4', 'leedo' ),
		'style-5' => esc_html__( 'Style 5', 'leedo' ),
		'style-6' => esc_html__( 'Style 6', 'leedo' ),
		'widgetized' => esc_html__( 'Widgetized', 'leedo' ),
		'shortcode' => esc_html__( 'Shortcode', 'leedo' ),
	),
	'default' => 'style-1',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_fixed',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Fixed', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'footer_copyright',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Copyright', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '<p>© 2018 Leedo WordPress Theme. All rights reserved.</p>',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_2',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Socials', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'footer_social_list',
	'section' => 'section_footer_general',
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
	'default' => ''
) );

/**
 * Footer style 1
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs1_1',
	'section' => 'section_footer_style_1',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'footer_style-1_logo',
	'section' => 'section_footer_style_1',
	'label' => esc_html__( 'Logo', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'footer_style-1_logo_height',
	'section' => 'section_footer_style_1',
	'label' => esc_html__( 'Logo Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-footer.vlt-footer--style-1 .vlt-footer-logo img',
			'property' => 'height'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs1_2',
	'section' => 'section_footer_style_1',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Styles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'footer_style-1_background',
	'section' => 'section_footer_style_1',
	'label' => esc_html__( 'Footer Background', 'leedo' ),
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
			'element' => '.vlt-footer.vlt-footer--style-1',
		),
	),
) );

/**
 * Footer style 2
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs2_1',
	'section' => 'section_footer_style_2',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'footer_style-2_content',
	'section' => 'section_footer_style_2',
	'label' => esc_html__( 'Footer Content', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs2_2',
	'section' => 'section_footer_style_2',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Styles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'footer_style-2_background',
	'section' => 'section_footer_style_2',
	'label' => esc_html__( 'Footer Background', 'leedo' ),
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
			'element' => '.vlt-footer.vlt-footer--style-2',
		),
	),
) );

/**
 * Footer style 3
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs3_1',
	'section' => 'section_footer_style_3',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'footer_style-3_content',
	'section' => 'section_footer_style_3',
	'label' => esc_html__( 'Footer Content', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs3_2',
	'section' => 'section_footer_style_3',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Styles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'footer_style-3_background',
	'section' => 'section_footer_style_3',
	'label' => esc_html__( 'Footer Background', 'leedo' ),
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
			'element' => '.vlt-footer.vlt-footer--style-3',
		),
	),
) );

/**
 * Footer style 4
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs4_1',
	'section' => 'section_footer_style_4',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Styles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'footer_style-4_background',
	'section' => 'section_footer_style_4',
	'label' => esc_html__( 'Footer Background', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'background-color' => '#f0f0f0',
		'background-image' => '',
		'background-repeat' => 'no-repeat',
		'background-position' => 'center center',
		'background-size' => 'cover',
		'background-attachment' => 'scroll',
	),
	'output' => array(
		array(
			'element' => '.vlt-footer.vlt-footer--style-4',
		),
	),
) );

/**
 * Footer style 5
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs5_1',
	'section' => 'section_footer_style_5',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'footer_style-5_content',
	'section' => 'section_footer_style_5',
	'label' => esc_html__( 'Footer Content', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs5_2',
	'section' => 'section_footer_style_5',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Styles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'footer_style-5_background',
	'section' => 'section_footer_style_5',
	'label' => esc_html__( 'Footer Background', 'leedo' ),
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
			'element' => '.vlt-footer.vlt-footer--style-5',
		),
	),
) );

/**
 * Footer style 6
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs6_1',
	'section' => 'section_footer_style_6',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'footer_style-6_logo',
	'section' => 'section_footer_style_6',
	'label' => esc_html__( 'Logo', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'footer_style-6_logo_height',
	'section' => 'section_footer_style_6',
	'label' => esc_html__( 'Logo Height', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-footer.vlt-footer--style-6 .vlt-footer-logo img',
			'property' => 'height'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfs6_2',
	'section' => 'section_footer_style_6',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Styles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'footer_style-6_background',
	'section' => 'section_footer_style_6',
	'label' => esc_html__( 'Footer Background', 'leedo' ),
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
			'element' => '.vlt-footer.vlt-footer--style-6',
		),
	),
) );

/**
 * Footer widgetized
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfw_1',
	'section' => 'section_footer_widgetized',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Columns', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'footer_widgetized_1_size',
	'section' => 'section_footer_widgetized',
	'label' => esc_attr__( 'Widget 1 Size', 'leedo' ),
	'priority' => $priority++,
	'choices' => array(
		'min' => '0',
		'max' => '12',
		'step' => '1',
	),
	'default' => 4,
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'footer_widgetized_2_size',
	'section' => 'section_footer_widgetized',
	'label' => esc_attr__( 'Widget 2 Size', 'leedo' ),
	'priority' => $priority++,
	'choices' => array(
		'min' => '0',
		'max' => '12',
		'step' => '1',
	),
	'default' => 1,
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'footer_widgetized_3_size',
	'section' => 'section_footer_widgetized',
	'label' => esc_attr__( 'Widget 3 Size', 'leedo' ),
	'priority' => $priority++,
	'choices' => array(
		'min' => '0',
		'max' => '12',
		'step' => '1',
	),
	'default' => 3,
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'footer_widgetized_4_size',
	'section' => 'section_footer_widgetized',
	'label' => esc_attr__( 'Widget 4 Size', 'leedo' ),
	'priority' => $priority++,
	'choices' => array(
		'min' => '0',
		'max' => '12',
		'step' => '1',
	),
	'default' => 4,
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfw_2',
	'section' => 'section_footer_widgetized',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Styles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'footer_widgetized_background',
	'section' => 'section_footer_widgetized',
	'label' => esc_html__( 'Footer Background', 'leedo' ),
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
			'element' => '.vlt-footer.vlt-footer--widgetized',
		),
	),
) );

/**
 * Footer shortcode
 */
VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'footer_shortcode',
	'section' => 'section_footer_shortcode',
	'label' => esc_html__( 'Shortcode', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );