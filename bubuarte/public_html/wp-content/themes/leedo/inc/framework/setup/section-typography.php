<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$priority = 0;

/**
 * General fonts
 */
$primary_font_variant = array(
	'variant' => array( 'regular', '500', '600', '700', '800' )
);

$secondary_font_variant = array(
	'variant' => array( 'regular', 'italic', '600' )
);

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'primary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Primary Font', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice( $primary_font_variant ),
	'default' => array(
		'font-family' => 'Montserrat'
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--pf',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'secondary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Secondary Font', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice( $secondary_font_variant ),
	'default' => array(
		'font-family' => 'Muli'
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--sf',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

/**
 * Body typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'tt_1',
	'section' => 'typography_text',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Text Typography', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Muli',
		'variant' => 'regular',
		'font-size' => '18px',
		'line-height' => '1.65',
		'color' => '#5c5c5c',
		'letter-spacing' => '.004em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'body'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography_tablet',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '18px',
		'line-height' => '1.65',
	),
	'output' => array(
		array(
			'element' => 'body',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography_phone',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '18px',
		'line-height' => '1.65',
	),
	'output' => array(
		array(
			'element' => 'body',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Heading typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_1',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H1 Titles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '700',
		'font-size' => '58px',
		'line-height' => '1.22',
		'color' => '#0b0b0b',
		'letter-spacing' => '.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h1, .h1'
		),
		array(
			'element' => '.editor-block-list__block h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-post-title__block .editor-post-title__input',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '58px',
		'line-height' => '1.22',
	),
	'output' => array(
		array(
			'element' => 'h1, .h1',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '58px',
		'line-height' => '1.22',
	),
	'output' => array(
		array(
			'element' => 'h1, .h1',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_2',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H2 Titles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '700',
		'font-size' => '48px',
		'line-height' => '1.25',
		'color' => '#0b0b0b',
		'letter-spacing' => '.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h2, .h2'
		),
		array(
			'element' => '.editor-block-list__block h2, .wp-block-heading h2.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '48px',
		'line-height' => '1.25',
	),
	'output' => array(
		array(
			'element' => 'h2, .h2',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '48px',
		'line-height' => '1.25',
	),
	'output' => array(
		array(
			'element' => 'h2, .h2',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_3',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H3 Titles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '700',
		'font-size' => '38px',
		'line-height' => '1.32',
		'color' => '#0b0b0b',
		'letter-spacing' => '.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h3, .h3'
		),
		array(
			'element' => '.editor-block-list__block h3, .wp-block-heading h3.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '38px',
		'line-height' => '1.32',
	),
	'output' => array(
		array(
			'element' => 'h3, .h3',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '38px',
		'line-height' => '1.32',
	),
	'output' => array(
		array(
			'element' => 'h3, .h3',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_4',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H4 Titles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '700',
		'font-size' => '28px',
		'line-height' => '1.45',
		'color' => '#0b0b0b',
		'letter-spacing' => '.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h4, .h4'
		),
		array(
			'element' => '.editor-block-list__block h4, .wp-block-heading h4.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '28px',
		'line-height' => '1.45',
	),
	'output' => array(
		array(
			'element' => 'h4, .h4',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '28px',
		'line-height' => '1.45',
	),
	'output' => array(
		array(
			'element' => 'h4, .h4',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_5',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H5 Titles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '700',
		'font-size' => '22px',
		'line-height' => '1.45',
		'color' => '#0b0b0b',
		'letter-spacing' => '.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h5, .h5'
		),
		array(
			'element' => '.editor-block-list__block h5, .wp-block-heading h5.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '22px',
		'line-height' => '1.45',
	),
	'output' => array(
		array(
			'element' => 'h5, .h5',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '22px',
		'line-height' => '1.45',
	),
	'output' => array(
		array(
			'element' => 'h5, .h5',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_6',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H6 Titles', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '700',
		'font-size' => '18px',
		'line-height' => '1.45',
		'color' => '#0b0b0b',
		'letter-spacing' => '.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h6, .h6'
		),
		array(
			'element' => '.editor-block-list__block h6, .wp-block-heading h6.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '18px',
		'line-height' => '1.45',
	),
	'output' => array(
		array(
			'element' => 'h6, .h6',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '18px',
		'line-height' => '1.45',
	),
	'output' => array(
		array(
			'element' => 'h6, .h6',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Blockquote typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'tb_1',
	'section' => 'typography_blockquote',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Blockquote', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '700',
		'font-size' => '32px',
		'line-height' => '1.4',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'blockquote'
		),
		array(
			'element' => '.wp-block-quote, .wp-block-pullquote',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography_tablet',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '32px',
		'line-height' => '1.4',
	),
	'output' => array(
		array(
			'element' => 'blockquote',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography_phone',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '32px',
		'line-height' => '1.4',
	),
	'output' => array(
		array(
			'element' => 'blockquote',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Button typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_button',
	'section' => 'typography_buttons',
	'label' => esc_html__( 'Button Typography', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '600',
		'font-size' => '12px',
		'line-height' => '1',
		'letter-spacing' => '.075em',
		'text-transform' => 'uppercase'
	),
	'output' => array(
		array(
			'element' => '.vlt-btn'
		)
	)
) );

/**
 * Input typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_input',
	'section' => 'typography_input',
	'label' => esc_html__( 'Input Typography', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Muli',
		'variant' => 'regular',
		'font-size' => '16px',
		'letter-spacing' => '0',
		'color' => '#5c5c5c',
		'line-height' => '1.65',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '
				input[type="text"],
				input[type="date"],
				input[type="email"],
				input[type="password"],
				input[type="tel"],
				input[type="url"],
				input[type="search"],
				input[type="number"],
				textarea,
				select,
				.select2
			'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_label',
	'section' => 'typography_input',
	'label' => esc_html__( 'Label Typography', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => 'regular',
		'font-size' => '16px',
		'line-height' => '1.45 ',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'label'
		)
	)
) );

/**
 * Widget title typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_widget_title',
	'section' => 'typography_widget',
	'label' => esc_html__( 'Widget Title Typography', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => '700',
		'font-size' => '24px',
		'line-height' => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '.vlt-widget__title'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_widget_title_white',
	'section' => 'typography_widget',
	'label' => esc_html__( 'Widget Title White Typography', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(),
	'default' => array(
		'font-family' => 'Montserrat',
		'variant' => 'regular',
		'font-size' => '14px',
		'line-height' => '1.1',
		'letter-spacing' => '.075em',
		'text-transform' => 'uppercase',
		'color' => '#ffffff'
	),
	'output' => array(
		array(
			'element' => '.vlt-widget__title.vlt-widget__title--white'
		)
	)
) );