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
	'settings' => 'sw_1',
	'section' => 'section_woocommerce',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'shop_layout',
	'section' => 'section_woocommerce',
	'label' => esc_html__( 'Shop Layout', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'style-1' => esc_html__( 'Style 1', 'leedo' ),
		'style-2' => esc_html__( 'Style 2', 'leedo' ),
		'style-3' => esc_html__( 'Style 3', 'leedo' ),
	),
	'default' => 'style-1',
) );

/**
 * Page title
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sw_2',
	'section' => 'section_woocommerce',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Page Title', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'shop_title_shortcode',
	'section' => 'section_woocommerce',
	'label' => esc_html__( 'Title Shortcode', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );

/**
 * Loop
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sw_3',
	'section' => 'section_woocommerce',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Loop', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'shop_type_pagination',
	'section' => 'section_woocommerce',
	'label' => esc_html__( 'Type Pagination', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'leedo' ),
		'paged' => esc_html__( 'Paged', 'leedo' ),
		'numeric' => esc_html__( 'Numeric', 'leedo' ),
		'load-more' => esc_html__( 'Load More', 'leedo' ),
	),
	'default' => 'numeric',
) );

VLT_Options::add_field( array(
	'type'=> 'number',
	'settings'=> 'products_per_row',
	'section' => 'section_woocommerce',
	'label' => esc_html__( 'Products per row', 'leedo' ),
	'priority' => $priority++,
	'default' => 3,
	'choices' => array(
		'min'=> 1,
		'max'=> 4,
		'step' => 1,
	),
) );

VLT_Options::add_field( array(
	'type'=> 'number',
	'settings'=> 'products_per_page',
	'section' => 'section_woocommerce',
	'label' => esc_html__( 'Products per page', 'leedo' ),
	'priority' => $priority++,
	'default' => 6,
	'choices' => array(
		'min'=> -1,
		'max'=> 999,
		'step' => 1,
	),
) );

/**
 * Recent product section
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sw_4',
	'section' => 'section_woocommerce',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Recent Products', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'recent_products_shortcode',
	'section' => 'section_woocommerce',
	'label' => esc_html__( 'Recent Products Shortcode', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );