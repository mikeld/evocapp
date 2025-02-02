<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

if ( ! function_exists( 'leedo_dynamic_css' ) ) {
	function leedo_dynamic_css( $css ) {
		$css .= '';

		return $css;
	}
}
add_filter( 'kirki_leedo_customize_dynamic_css', 'leedo_dynamic_css' );