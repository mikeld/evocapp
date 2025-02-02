<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$acf_onepage_navigation = leedo_get_theme_mod( 'onepage_navigation', true );

if ( $acf_onepage_navigation ) {
	$menu_name = leedo_get_theme_mod( 'onepage_navigation_name', $acf_onepage_navigation );
	if ( wp_get_nav_menu_object( $menu_name ) ) {
		$menu_object = wp_get_nav_menu_object( $menu_name );
		$menu_items = wp_get_nav_menu_items( $menu_object->term_id );
		$menu_list = '<ul class="vlt-onepage-nav sf-menu">';
		foreach ( ( array ) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= '<li><a href="' . $url . '"><span>' . $title . '</span></a></li>';
		}
		$menu_list .= '</ul>';
	} else {
		$menu_list = '<p class="vlt-no-menu-message">' . sprintf( __( 'Menu "%s" not defined.', 'leedo' ), $menu_name ) . '</p>';
	}
	echo wp_kses_post( $menu_list );

	return;
}

if ( has_nav_menu( 'mobile-menu' ) ) {
	wp_nav_menu( array(
		'theme_location' => 'mobile-menu',
		'container' => false,
		'depth' => 3,
		'link_before' => '<span>',
		'link_after' => '</span>',
		'menu_class' => 'sf-menu',
	) );
} else {
	wp_nav_menu( array(
		'theme_location' => 'primary-menu',
		'container' => false,
		'depth' => 3,
		'link_before' => '<span>',
		'link_after' => '</span>',
		'menu_class' => 'sf-menu',
		'fallback_cb' => 'leedo_fallback_menu'
	) );
}