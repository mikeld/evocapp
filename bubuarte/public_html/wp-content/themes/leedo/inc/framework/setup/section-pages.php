<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$priority = 0;

/**
 * Blog general
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'sticky_sidebar',
	'section' => 'section_blog_general',
	'label' => esc_html__( 'Sticky Sidebar', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'leedo' ),
		'disable' => esc_html__( 'Disable', 'leedo' )
	),
	'default' => 'disable',
) );

/**
 * Blog page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_1',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_layout',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Layout', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'leedo' ),
		'masonry-1' => esc_html__( 'Masonry 1', 'leedo' ),
		'masonry-2' => esc_html__( 'Masonry 2', 'leedo' ),
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_type_pagination',
	'section' => 'section_blog',
	'label' => esc_html__( 'Type Pagination', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'leedo' ),
		'paged' => esc_html__( 'Paged', 'leedo' ),
		'numeric' => esc_html__( 'Numeric', 'leedo' ),
		'load-more' => esc_html__( 'Load More', 'leedo' ),
	),
	'default' => 'paged',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_2',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Page Title', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'blog_title',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Title', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Recent News', 'leedo' ),
) );

/**
 * Archive page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sa_1',
	'section' => 'section_archive',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'archive_layout',
	'section' => 'section_archive',
	'label' => esc_html__( 'Archive Layout', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'leedo' ),
		'masonry-1' => esc_html__( 'Masonry 1', 'leedo' ),
		'masonry-2' => esc_html__( 'Masonry 2', 'leedo' ),
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'archive_type_pagination',
	'section' => 'section_archive',
	'label' => esc_html__( 'Type Pagination', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'leedo' ),
		'paged' => esc_html__( 'Paged', 'leedo' ),
		'numeric' => esc_html__( 'Numeric', 'leedo' ),
		'load-more' => esc_html__( 'Load More', 'leedo' ),
	),
	'default' => 'paged',
) );

/**
 * Search page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ss_1',
	'section' => 'section_search',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'search_layout',
	'section' => 'section_search',
	'label' => esc_html__( 'Search Layout', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'leedo' ),
		'masonry-1' => esc_html__( 'Masonry 1', 'leedo' ),
		'masonry-2' => esc_html__( 'Masonry 2', 'leedo' ),
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'search_type_pagination',
	'section' => 'section_search',
	'label' => esc_html__( 'Type Pagination', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'leedo' ),
		'paged' => esc_html__( 'Paged', 'leedo' ),
		'numeric' => esc_html__( 'Numeric', 'leedo' ),
		'load-more' => esc_html__( 'Load More', 'leedo' ),
	),
	'default' => 'paged',
) );

/**
 * Single post
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_1',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'comment_placement',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Comment Placement', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'top' => esc_html__( 'Top', 'leedo' ),
		'bottom' => esc_html__( 'Bottom', 'leedo' )
	),
	'default' => 'bottom',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_share_post',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Share', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'leedo' ),
		'hide' => esc_html__( 'Hide', 'leedo' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'also_like_posts',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Also Like Posts', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'leedo' ),
		'hide' => esc_html__( 'Hide', 'leedo' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_2',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'leedo' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'post_navigation',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Navigation', 'leedo' ),
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
		'settings' => 'blog_link',
		'section' => 'section_single_post',
		'label' => esc_html__( 'Blog Link', 'leedo' ),
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
				'setting' => 'post_navigation',
				'operator' => '==',
				'value' => 'show'
			)
		),
	) );
}

/**
 * Page 404
 */
VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'error_title',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Title', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Page not found.', 'leedo' ),
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'error_subtitle',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Subtitle', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'We are sorry. But the page you are looking for cannot be found.', 'leedo' ),
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'page_404_shortcode',
	'section' => 'section_404',
	'label' => esc_html__( 'Shortcode', 'leedo' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );