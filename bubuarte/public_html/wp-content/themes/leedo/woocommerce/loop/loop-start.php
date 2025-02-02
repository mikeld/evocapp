<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$postID = get_queried_object_id();

$pagination = leedo_get_theme_mod( 'shop_type_pagination' );

$post_list_class = 'vlt-products-list clearfix';
$post_list_class .= ' vlt-products-list--' . $pagination . '_pagination';

if ( isset( $_GET['products_per_row'] ) ) {
	$products_per_row = $_GET['products_per_row'];
	$_COOKIE['products_per_row' . $postID] = $_GET['products_per_row'];
} elseif ( isset( $_COOKIE['products_per_row' . $postID] ) ) {
	$products_per_row = $_COOKIE['products_per_row' . $postID];
} else {
	$products_per_row = leedo_get_theme_mod( 'products_per_row' );
}

?>

<div class="<?php echo leedo_sanitize_class( $post_list_class ); ?>">
	<div class="masonry clearfix" data-masonry-col="<?php echo esc_attr( $products_per_row ); ?>">
		<div class="gutter-sizer"></div>
		<div class="grid-sizer"></div>