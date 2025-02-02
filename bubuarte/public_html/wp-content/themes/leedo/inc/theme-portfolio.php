<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Disable FontAwesome 5
 */
add_filter( 'vpf_enqueue_plugin_font_awesome', '__return_false' );

/**
 * Add new item styles
 */
if ( ! function_exists( 'leedo_vpf_extend_items_styles' ) ) {
	function leedo_vpf_extend_items_styles( $items_styles ) {
		$custom_style = array();

		$custom_style['leedo_post_default'] = array(
			'title' => esc_html__( '[Leedo] Post Default', 'leedo' ),
			'builtin_controls' => array(
				'show_title' => false,
				'show_categories' => false,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => false,
			),
			'controls' => array(
				array(
					'type' => 'toggle',
					'label' => esc_html__( 'Show Thumbnail', 'leedo' ),
					'name' => 'post_default_thumbnail',
					'default' => true,
				),
				array(
					'type' => 'toggle',
					'label' => esc_html__( 'Show "Read More" Buttom', 'leedo' ),
					'name' => 'post_default_read_more',
					'default' => true,
				),
				array(
					'type' => 'range',
					'label' => esc_html__( 'Excerpt Length', 'leedo' ),
					'name' => 'post_default_excerpt',
					'min' => 1,
					'max' => 200,
					'step' => 1,
					'default' => 50,
				)
			)
		);

		$custom_style['leedo_post_masonry'] = array(
			'title' => esc_html__( '[Leedo] Post Masonry', 'leedo' ),
			'builtin_controls' => array(
				'show_title' => false,
				'show_categories' => false,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => false,
			),
			'controls' => array(
				array(
					'type' => 'toggle',
					'label' => esc_html__( 'Show Thumbnail', 'leedo' ),
					'name' => 'post_masonry_thumbnail',
					'default' => true,
				),
				array(
					'type' => 'toggle',
					'label' => esc_html__( 'Padding', 'leedo' ),
					'name' => 'post_masonry_padding',
					'default' => false,
				),
				array(
					'type' => 'toggle',
					'label' => esc_html__( 'Background', 'leedo' ),
					'name' => 'post_masonry_background',
					'default' => false,
				),
				array(
					'type' => 'range',
					'label' => esc_html__( 'Excerpt Length', 'leedo' ),
					'name' => 'post_masonry_excerpt',
					'min' => 1,
					'max' => 200,
					'step' => 1,
					'default' => 20,
				)
			)
		);

		$custom_style['leedo_work_style_1'] = array(
			'title' => esc_html__( '[Leedo] Work Style 1', 'leedo' ),
			'builtin_controls' => array(
				'show_title' => true,
				'show_categories' => true,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => 'extended',
			),
			'controls' => array(
				array(
					'type' => 'color',
					'label' => esc_html__( 'Overlay Border Color', 'leedo' ),
					'name' => 'work_style_1_overlay_border_color',
					'default' => '',
					'alpha' => false,
					'style' => array(
						array(
							'element' => '.vp-portfolio__item-overlay::after',
							'property' => 'border-color',
						),
					),
				),
				array(
					'type' => 'color',
					'label' => esc_html__( 'Overlay background color', 'leedo' ),
					'name' => 'work_style_1_overlay_background_color',
					'default' => '',
					'alpha' => true,
					'style' => array(
						array(
							'element' => '.vp-portfolio__item-overlay',
							'property' => 'background-color',
						),
					),
				),
				array(
					'type' => 'color',
					'label' => esc_html__( 'Overlay text color', 'leedo' ),
					'name' => 'work_style_1_overlay_text_color',
					'default' => '',
					'alpha' => true,
					'style' => array(
						array(
							'element' => '.vp-portfolio__item-overlay',
							'property' => 'color',
						),
					),
				)
			)
		);

		$custom_style['leedo_work_style_2'] = array(
			'title' => esc_html__( '[Leedo] Work Style 2', 'leedo' ),
			'builtin_controls' => array(
				'show_title' => true,
				'show_categories' => true,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => 'extended',
			),
			'controls' => array(
				array(
					'type' => 'color',
					'label' => esc_html__( 'Overlay background color', 'leedo' ),
					'name' => 'work_style_2_overlay_background_color',
					'default' => '',
					'alpha' => true,
					'style' => array(
						array(
							'element' => '.vp-portfolio__item-overlay',
							'property' => 'background-color',
						),
					),
				),
				array(
					'type' => 'color',
					'label' => esc_html__( 'Overlay text color', 'leedo' ),
					'name' => 'work_style_2_overlay_text_color',
					'default' => '',
					'alpha' => true,
					'style' => array(
						array(
							'element' => '.vp-portfolio__item-overlay',
							'property' => 'color',
						),
					),
				)
			)
		);

		$custom_style['leedo_work_style_3'] = array(
			'title' => esc_html__( '[Leedo] Work Style 3', 'leedo' ),
			'builtin_controls' => array(
				'show_title' => true,
				'show_categories' => false,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => false,
			),
			'controls' => array(
				array(
					'type' => 'color',
					'label' => esc_html__( 'Overlay background color', 'leedo' ),
					'name' => 'work_style_3_overlay_background_color',
					'default' => '',
					'alpha' => true,
					'style' => array(
						array(
							'element' => '.vp-portfolio__item-overlay',
							'property' => 'background-color',
						),
					),
				),
			)
		);

		$custom_style['leedo_work_style_4'] = array(
			'title' => esc_html__( '[Leedo] Work Style 4', 'leedo' ),
			'builtin_controls' => array(
				'show_title' => true,
				'show_categories' => true,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => false,
			),
			'controls' => array(
				array(
					'type' => 'select2',
					'label' => esc_html__( 'Style', 'leedo' ),
					'name' => 'work_style_4_style',
					'options' => array(
						'style-1' => esc_html__( 'Style 1', 'leedo' ),
						'style-2' => esc_html__( 'Style 2', 'leedo' ),
					),
					'default' => 'style-1',
					'searchable' => false,
					'multiple' => false,
					'tags' => false,
				),
				array(
					'type' => 'color',
					'label' => esc_html__( 'Overlay background color', 'leedo' ),
					'name' => 'work_style_4_overlay_background_color',
					'default' => '',
					'alpha' => true,
					'style' => array(
						array(
							'element' => '.vp-portfolio__item-overlay',
							'property' => 'background-color',
						),
					),
				),
			)
		);
		return array_merge( $items_styles, $custom_style );
	}
}
add_filter( 'vpf_extend_items_styles', 'leedo_vpf_extend_items_styles' );

/**
 * Add new tiles
 */
if ( ! function_exists( 'leedo_vpf_extend_tiles' ) ) {
	function leedo_vpf_extend_tiles( $tiles ) {

		// Blog 01
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/blog-1.svg',
			'value' => '3|1,0.7|'
		);

		// Blog 02
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/blog-2.svg',
			'value' => '4|1,0.75|1,0.85|1,0.66|1,1|1,0.85|1,0.66|1,1|1,0.75|'
		);

		// Blog 03
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/blog-3.svg',
			'value' => '3|1,0.7|1,0.85|1,0.7|1,0.85|1,0.85|1,0.7|'
		);

		// Blog 04
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/blog-4.svg',
			'value' => '2|1,0.66|'
		);

		// Blog 05
		// ...

		// Blog 06 / 07
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/blog-6-7.svg',
			'value' => '1|1,0.6|'
		);

		// Portfolio 01
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/portfolio-1.svg',
			'value' => '3|1,0.9|'
		);

		// Portfolio 02
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/portfolio-2.svg',
			'value' => '3|1,0.9|1,1.8|1,0.9|1,0.9|1,0.9|1,0.9|1,0.9|1,0.9|'
		);

		// Portfolio 03
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/portfolio-3.svg',
			'value' => '4|1,0.9|1,1.8|1,0.9|1,0.9|1,0.9|1,0.9|1,1.8|1,1.8|1,0.9|1,1.8|1,0.9|'
		);

		// Portfolio 04
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/portfolio-4.svg',
			'value' => '3|1,1.15|1,0.75|1,0.9|1,1.15|1,0.75|1,0.65|1,0.65|1,0.9|1,0.65|1,1.15|1,0.9|1,0.75|'
		);

		// Portfolio 05
		$tiles[] = array(
			'url' => LEEDO_THEME_DIRECTORY . 'assets/img/layouts/portfolio-5.svg',
			'value' => '2|1,0.58|1,0.58|'
		);

		return $tiles;

	}
}
add_filter( 'vpf_extend_tiles', 'leedo_vpf_extend_tiles' );