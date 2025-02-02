<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Remove WooCommerce styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Upate cart via AJAX
 */
if ( ! function_exists( 'leedo_update_cart_data' ) ) {
	function leedo_update_cart_data( $array ) {
		$array['.vlt-menu-shop-cart'] = '<a href="' . esc_url( wc_get_cart_url() ) .'" class="vlt-menu-shop-cart">
			<i class="leedo-paper-bag"></i>
			<span>' . esc_html( WC()->cart->get_cart_contents_count() ) . '</span>
			</a>';
		return $array;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'leedo_update_cart_data' );

/**
 * Add comma to tag widget
 */
if ( ! function_exists( 'leedo_filter_woo_tag_cloud' ) ) {
	function leedo_filter_woo_tag_cloud( $array ) {
		$array['smallest'] = 18;
		$array['largest'] = 18;
		$array['unit'] = 'px';
		$array['separator']= ', ';
		return $array;
	}
}
add_filter ( 'woocommerce_product_tag_cloud_widget_args', 'leedo_filter_woo_tag_cloud' );

/**
 * Change separator breadcrumbs
 */
if ( ! function_exists( 'leedo_change_breadcrumb_delimiter' ) ) {
	function leedo_change_breadcrumb_delimiter( $defaults ) {
		$defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb vlt-woocommerce-breadcrumbs" itemprop="breadcrumb">';
		$defaults['delimiter'] = '<span class="sep">-</span>';
		return $defaults;
	}
}
add_filter( 'woocommerce_breadcrumb_defaults', 'leedo_change_breadcrumb_delimiter' );

/**
 * Remove title from shop page
 */
add_filter( 'woocommerce_show_page_title', '__return_false' );

/**
 * Get product categories
 */
if ( ! function_exists( 'leedo_get_products_categories' ) ) {
	function leedo_get_products_categories() {

		global $wp_query;
		$output = '';

		$args = array(
			'taxonomy' => 'product_cat',
			'orderby' => 'name',
			'show_count' => false,
			'pad_counts' => false,
			'hierarchical' => true,
			'title_li' => '',
			'hide_empty' => true
		);

		$all_categories = get_categories( $args );

		$current_category_id = is_tax( 'product_cat' ) ? $wp_query->queried_object->term_id : '';
		$output .= '<div class="woocommerce-categories-ordering vlt-display-1">';
		$output .= '<a href="' . get_permalink( wc_get_page_id( 'shop' ) ) . '" class="' . ( is_shop() ? 'active' : '' ) . '">' . esc_html__( 'All', 'leedo' ) . '</a>';

		foreach ( $all_categories as $cat ) {
			$category_id = $cat->term_id;
			$output .= '<a href="' . get_term_link( $cat->slug, 'product_cat' ) .'" class="' . ( $current_category_id == $category_id  ? 'active' : '' ) . '">'. $cat->name .'</a>';
		}
		$output .= '</div>';

		return $output;
	}
}

/**
 * Products per row
 */
if ( ! function_exists( 'leedo_woo_products_per_row' ) ) {
	function leedo_woo_products_per_row( $columns ) {
		$columns = leedo_get_theme_mod( 'products_per_row' );
		return $columns;
	}
}
add_filter( 'loop_shop_columns', 'leedo_woo_products_per_row' );

/**
 * Products per page
 */
if ( ! function_exists( 'leedo_woo_loop_shop_per_page' ) ) {
	function leedo_woo_loop_shop_per_page( $items ) {
		$postID = get_queried_object_id();
		if ( isset( $_GET['products_per_page'] ) ) {
			$items = $_GET['products_per_page'];
			$_COOKIE['products_per_page' . $postID] = $_GET['products_per_page'];
		} elseif ( isset( $_COOKIE['products_per_page' . $postID] ) ) {
			$items = $_COOKIE['products_per_page' . $postID];
		} else {
			$items = leedo_get_theme_mod( 'products_per_page' );
		}
		return $items;
	}
}
add_filter( 'loop_shop_per_page', 'leedo_woo_loop_shop_per_page', 20 );

/**
 * 5 columns gallery
 */
if ( ! function_exists( 'leedo_5_columns_product_gallery' ) ) {
	function leedo_5_columns_product_gallery( $wrapper_classes ) {
		$columns = 5;
		$wrapper_classes[2] = 'woocommerce-product-gallery--columns-' . absint( $columns );
		return $wrapper_classes;
	}
}
add_filter( 'woocommerce_single_product_image_gallery_classes', 'leedo_5_columns_product_gallery' );

/**
 * Set woo product size
 */
add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
		'width' => 600,
		'height' => 600,
		'crop' => 1,
	);
} );

add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
	return array(
		'width' => 600,
		'height' => 600,
		'crop' => 1,
	);
} );

/**
 * Max upsells Products
 */
if ( ! function_exists( 'leedo_max_upsell_products' ) ) {
	function leedo_max_upsell_products( $args ) {
		$args['posts_per_page'] = 4;
		return $args;
	}
}
add_filter( 'woocommerce_output_related_products_args', 'leedo_max_upsell_products' );

/**
 * Max crossells Products
 */
if ( ! function_exists( 'leedo_max_crosssell_products' ) ) {
	function leedo_max_crosssell_products( $total ) {
		$total = '4';
		return $total;
	}
}
add_filter( 'woocommerce_cross_sells_total', 'leedo_max_crosssell_products' );

/**
 * Max related Products
 */
if ( ! function_exists( 'leedo_related_products_args' ) ) {
	function leedo_related_products_args( $args ) {
		$args['posts_per_page'] = 4;
		return $args;
	}
}
add_filter( 'woocommerce_output_related_products_args', 'leedo_related_products_args' );

/**
 * Remove link from single product gallery
 */
if ( ! function_exists( 'leedo_remove_link_on_thumbnails' ) ) {
	function leedo_remove_link_on_thumbnails( $html ) {
		return strip_tags( $html,'<div><img>' );
	}
}
add_filter('woocommerce_single_product_image_thumbnail_html','leedo_remove_link_on_thumbnails' );

/**
 * Define the woocommerce_share callback
 */
if ( ! function_exists( 'leedo_action_woocommerce_share' ) ) {
	function leedo_action_woocommerce_share() {
		if ( ! function_exists( 'vlthemes_get_post_share_buttons' ) ) {
			return;
		}
		echo '<div class="vlt-social-share">';
		echo vlthemes_get_post_share_buttons( get_the_ID() );
		echo '</div>';
	}
}
add_action( 'woocommerce_share', 'leedo_action_woocommerce_share', 10 );