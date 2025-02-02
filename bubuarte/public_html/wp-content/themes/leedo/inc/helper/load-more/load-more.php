<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Load more button
 */
if ( ! function_exists( 'leedo_load_more_btn' ) ) {
	function leedo_load_more_btn( $wp_query = null ) {

		if( $wp_query == null ) {
			global $wp_query;
		} else {
			$wp_query = $wp_query;
		}

		$max = $wp_query->max_num_pages;
		$paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;

		wp_localize_script(
			'vlt-helpers',
			'VLT_LOAD_MORE_CDATA',
			array(
				'load_more_btn_startPage' => $paged,
				'load_more_btn_maxPages' => $max,
				'load_more_btn_nextLink' => next_posts( $max, false ),
				'load_more_btn_text' => esc_html__( 'Load More', 'leedo' ),
				'load_more_btn_noMore' => esc_html__( 'No More Posts', 'leedo' ),
				'load_more_btn_loading' => '<i class="fa fa-spinner fa-spin"></i>' . esc_html__( 'Loading', 'leedo' ),
			)
		);
	}
}