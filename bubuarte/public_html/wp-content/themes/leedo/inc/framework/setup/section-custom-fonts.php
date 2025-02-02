<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$priority = 0;

/**
 * Custom fonts
 */
VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'custom_fonts',
	'section' => 'section_custom_fonts',
	'label' => esc_html__( 'Custom Fonts', 'leedo' ) ,
	'priority' => $priority++,
	'transport' => 'auto',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__( 'font', 'leedo' ) ,
	),
	'fields' => array(
		'font_id' => array(
			'type' => 'text',
			'label' => esc_html__( 'ID', 'leedo' ) ,
		) ,
		'font_text' => array(
			'type' => 'text',
			'label' => esc_html__( 'Text', 'leedo' ) ,
		) ,
		'font_variants' => array(
			'type' => 'select',
			'label' => esc_html__( 'Variants', 'leedo' ) ,
			'multiple' => 18,
			'choices' => array(
				'100' => esc_html__( '100', 'leedo' ) ,
				'100italic' => esc_html__( '100italic', 'leedo' ) ,
				'200' => esc_html__( '200', 'leedo' ) ,
				'200italic' => esc_html__( '200italic', 'leedo' ) ,
				'300' => esc_html__( '300', 'leedo' ) ,
				'300italic' => esc_html__( '300italic', 'leedo' ) ,
				'regular' => esc_html__( 'regular', 'leedo' ) ,
				'italic' => esc_html__( 'italic', 'leedo' ) ,
				'500' => esc_html__( '500', 'leedo' ) ,
				'500italic' => esc_html__( '500italic', 'leedo' ) ,
				'600' => esc_html__( '600', 'leedo' ) ,
				'600italic' => esc_html__( '600italic', 'leedo' ) ,
				'700' => esc_html__( '700', 'leedo' ) ,
				'700italic' => esc_html__( '700italic', 'leedo' ) ,
				'800' => esc_html__( '800', 'leedo' ) ,
				'800italic' => esc_html__( '800italic', 'leedo' ) ,
				'900' => esc_html__( '900', 'leedo' ) ,
				'900italic' => esc_html__( '900italic', 'leedo' ) ,
			)
		),
	),
	'default' => '',
) );