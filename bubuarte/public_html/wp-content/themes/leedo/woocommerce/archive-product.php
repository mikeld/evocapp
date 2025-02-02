<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
add_action( 'leedo_woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

$postID = get_queried_object_id();

if ( isset( $_GET['layout'] ) ) {
	$shop_layout = $_GET['layout'];
	$_COOKIE['layout' . $postID] = $_GET['layout'];
} elseif ( isset($_COOKIE['layout' . $postID] ) ) {
	$shop_layout = $_COOKIE['layout' . $postID];
} else {
	$shop_layout = leedo_get_theme_mod( 'shop_layout' );
}

$column_sidebar_class = $column_content_class = $shop_sidebar = '';

switch ( $shop_layout ) {
	case 'style-1':
		$is_sidebar = false;
		$column_content_class = 'col-md-12';
		break;

	case 'style-2':
		$is_sidebar = true;
		$shop_sidebar = 'right';
		$column_sidebar_class = 'col-md-4';
		$column_content_class = 'col-md-8';
		$column_sidebar_class .= leedo_get_theme_mod( 'sticky_sidebar' ) == 'enable' ? ' vlt-column-sticky-sidebar' : '';
		$column_content_class .= leedo_get_theme_mod( 'sticky_sidebar' ) == 'enable' ? ' vlt-column-sticky-content' : '';
		break;

	case 'style-3':
		$is_sidebar = true;
		$shop_sidebar = 'left';
		$column_sidebar_class = 'col-md-4 pull-md-8';
		$column_content_class = 'col-md-8 push-md-4';
		$column_sidebar_class .= leedo_get_theme_mod( 'sticky_sidebar' ) == 'enable' ? ' vlt-column-sticky-sidebar' : '';
		$column_content_class .= leedo_get_theme_mod( 'sticky_sidebar' ) == 'enable' ? ' vlt-column-sticky-content' : '';
		break;
}

// Title
$title_shortcode = leedo_get_theme_mod( 'shop_title_shortcode' );

if ( $title_shortcode ) {
	echo '<div class="container">';
	echo do_shortcode( html_entity_decode( $title_shortcode ) );
	echo '</div>';
} else {
	get_template_part( 'template-parts/page-title/page-title', 'shop' );
}

?>

<main class="vlt-main vlt-main--padding">
	<div class="container">
		<div class="row">

			<div class="<?php echo leedo_sanitize_class( $column_content_class ); ?>">

				<?php

					switch ( $shop_layout ) {
						case 'style-1':
							echo '<div class="vlt-shop-top-bar vlt-shop-top-bar--style-1">';
							echo leedo_get_products_categories();
							do_action( 'leedo_woocommerce_before_shop_loop' );
							echo '</div>';
							break;

						case 'style-2':
							echo '<div class="vlt-shop-top-bar vlt-shop-top-bar--style-2">';
							do_action( 'leedo_woocommerce_before_shop_loop' );
							echo '</div>';
							break;

						case 'style-3':
							echo '<div class="vlt-shop-top-bar vlt-shop-top-bar--style-3">';
							do_action( 'leedo_woocommerce_before_shop_loop' );
							echo '</div>';
							break;
					}

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
							do_action( 'woocommerce_shop_loop' );
							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					do_action( 'woocommerce_after_shop_loop' );

				?>
			</div>

			<?php if ( $is_sidebar ) : ?>

				<div class="<?php echo leedo_sanitize_class( $column_sidebar_class ); ?>">
					<div class="vlt-sidebar vlt-sidebar--<?php echo esc_attr( $shop_sidebar ); ?>">
						<?php do_action( 'woocommerce_sidebar' ); ?>
					</div>
				</div>

			<?php endif; ?>

		</div>
	</div>
</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>