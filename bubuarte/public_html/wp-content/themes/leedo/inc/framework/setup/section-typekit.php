<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$priority = 0;

/**
 * Typekit
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'typekit',
	'section' => 'section_typekit',
	'label' => esc_html__( 'Typekit', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'typekit_id',
	'section' => 'section_typekit',
	'label' => esc_html__( 'Typekit ID', 'leedo' ),
	'tooltip' => '<a target="_blank" href="' . esc_url( 'https://helpx.adobe.com/typekit/using/add-fonts-website.html' ) . '">' . esc_html__( 'Read More', 'leedo' ) . '</a>',
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'typekit',
			'operator' => '==',
			'value' => 'enable',
		)
	),
) );