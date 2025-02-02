<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Add body class
 */
if ( ! function_exists( 'leedo_add_body_class' ) ) {
	function leedo_add_body_class( $classes ) {
		$classes[] = '';
		if ( ! wp_is_mobile() ) {
			$classes[] = 'no-mobile';
		} else {
			$classes[] = 'is-mobile';
		}
		return $classes;
	}
}
add_filter( 'body_class', 'leedo_add_body_class' );

/**
 * Add html class
 */
if ( ! function_exists( 'leedo_add_html_class' ) ) {
	function leedo_add_html_class( $classes = '' ) {
		// header
		$acf_header = leedo_get_theme_mod( 'page_custom_navigation', true );
		$classes .= ' vlt-is--header-' . leedo_get_theme_mod( 'navigation_type', $acf_header );

		// footer
		$acf_footer = leedo_get_theme_mod( 'page_custom_footer', true );
		$classes .= ' vlt-is--footer-' . leedo_get_theme_mod( 'footer_layout', $acf_footer );
		if ( leedo_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
			$classes .= ' vlt-is--footer-fixed';
		}

		// lowercase mode
		if ( leedo_get_theme_mod( 'lowercase_mode' ) == 'enable' ) {
			$classes .= ' vlt-is--lowercase-mode';
		}

		// site protection
		$acf_page_custom_site_protection = leedo_get_theme_mod( 'page_custom_site_protection', true );
		$classes .= leedo_get_theme_mod( 'site_protection', $acf_page_custom_site_protection ) == 'show' ? ' vlt-is--site-protection' : '';

		// onepage navigation
		$classes .= leedo_get_theme_mod( 'onepage_navigation', true ) ? ' vlt-is--onepage-navigation' : '';

		return apply_filters( 'leedo/add_html_class', leedo_sanitize_class( $classes ) );
	}
}

/**
 * Get post password form
 */
if ( ! function_exists( 'leedo_get_post_password_form' ) ) {
	function leedo_get_post_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="vlt-post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
		$output .= '<i class="leedo-password"></i>';
		$output .= '<h5>' . esc_html__( 'Password Protected', 'leedo' ) . '</h5>';
		$output .= '<p>' . esc_html__( 'This content is restricted access, please type the password below and get access.', 'leedo' ) . '</p>';
		$output .= '<div class="vlt-form-group">';
		$output .= '<input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_attr__( 'Password:' , 'leedo' ) . '" class="vlt-border-white">';
		$output .= '</div>';
		$output .= '<button class="vlt-btn vlt-btn--primary vlt-btn--effect block"><span>' . esc_attr__( 'Get Access' , 'leedo' ) . '</span></button>';
		$output .= '</form>';
		return apply_filters( 'leedo/get_post_password_form', $output );
	}
}
add_filter( 'the_password_form', 'leedo_get_post_password_form' );

/**
 * Admin logo link
 */
if ( ! function_exists( 'leedo_change_admin_logo_link' ) ) {
	function leedo_change_admin_logo_link() {
		return home_url( '/' );
	}
}
add_filter( 'login_headerurl', 'leedo_change_admin_logo_link' );

/**
 * Comment form fields order
 */
if ( ! function_exists( 'leedo_comment_form_fields' ) ) {
	function leedo_comment_form_fields( $comment_fields ) {
		if ( leedo_get_theme_mod( 'comment_placement' ) == 'bottom' ) {
			$keys = array_keys( $comment_fields );
			if ( 'comment' == $keys[0] ) {
				$comment_fields['comment'] = array_shift( $comment_fields );
			}
		}
		return $comment_fields;
	}
}
add_filter( 'comment_form_fields', 'leedo_comment_form_fields' );

/**
 * Fix GDPR checkbox
 */
if ( leedo_exists_gdpr_framework() ) {
	if ( ! function_exists( 'leedo_fix_gdpr_checkbox' ) ) {
		function leedo_fix_gdpr_checkbox( $comment_fields ) {
			$comment_fields['leedo_fix_gdpr_checkbox'] = '';
			return $comment_fields;
		}
	}
	add_filter( 'comment_form_fields', 'leedo_fix_gdpr_checkbox' );
}

/**
 * Remove comment notes
 */
add_filter( 'comment_form_logged_in', '__return_empty_string' );

/**
 * Add comma to tag widget
 */
if ( ! function_exists( 'leedo_filter_tag_cloud' ) ) {
	function leedo_filter_tag_cloud( $args ) {
		$args['smallest'] = 18;
		$args['largest'] = 18;
		$args['unit'] = 'px';
		$args['orderby'] = 'count';
		$args['order'] = 'DESC';
		$args['separator']= ', ';
		return $args;
	}
}
add_filter ( 'widget_tag_cloud_args', 'leedo_filter_tag_cloud' );

/**
 * Extend mime tipes
 */
if ( ! function_exists( 'leedo_mime_types' ) ) {
	function leedo_mime_types( $mime_types ) {
		$mime_types['mp3'] = 'audio/mpeg';
		$mime_types['svg'] = 'image/svg+xml';
		return $mime_types;
	}
}
add_filter( 'upload_mimes', 'leedo_mime_types' );