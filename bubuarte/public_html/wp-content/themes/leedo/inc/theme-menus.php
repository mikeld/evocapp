<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Fallback menu
 */
if ( ! function_exists( 'leedo_fallback_menu' ) ) {
	function leedo_fallback_menu() {
		echo '<p class="vlt-no-menu-message">' . esc_html__( 'Please register navigation from', 'leedo' ) . ' ' . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance > Menus', 'leedo' ) . '</a></p>';
	}
}