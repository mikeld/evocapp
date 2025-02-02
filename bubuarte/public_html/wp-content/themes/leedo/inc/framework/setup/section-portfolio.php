<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$priority = 0;

/**
 * Portfolio Single
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sps_1',
	'section' => 'section_single_portfolio',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'work_navigation',
	'section' => 'section_single_portfolio',
	'label' => esc_html__( 'Work Navigation', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'leedo' ),
		'hide' => esc_html__( 'Hide', 'leedo' )
	),
	'default' => 'show',
) );

if ( class_exists( 'Kirki_Helper' ) ) {
	VLT_Options::add_field( array(
		'type' => 'select',
		'settings' => 'portfolio_link',
		'section' => 'section_single_portfolio',
		'label' => esc_html__( 'Portfolio Link', 'leedo' ),
		'tooltip' => esc_html__( 'For back button.', 'leedo' ),
		'priority' => $priority++,
		'transport' => 'auto',
		'multiple' => 1,
		'choices' => Kirki_Helper::get_posts(
			array(
				'posts_per_page' => 9999,
				'post_type' => 'page'
			)
		),
		'default' => '',
		'active_callback' => array(
			array(
				'setting' => 'work_navigation',
				'operator' => '==',
				'value' => 'show'
			)
		),
	) );
}