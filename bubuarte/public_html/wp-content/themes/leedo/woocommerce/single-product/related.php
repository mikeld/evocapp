<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<div class="vlt-related-products">

		<div class="vlt-gap-120"></div>

		<div class="container">

			<h2><?php esc_html_e( 'Related products.', 'leedo' ); ?></h2>

			<div class="vlt-gap-70"></div>

			<div class="row relative">

				<?php echo do_shortcode( html_entity_decode( leedo_get_theme_mod( 'recent_products_shortcode' ) ) ); ?>

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
						echo '<div class="col-md-3 col-sm-6">';
						$post_object = get_post( $related_product->get_id() );
						setup_postdata( $GLOBALS['post'] =& $post_object );
						wc_get_template_part( 'content', 'product' );
						echo '</div>';
					?>

				<?php endforeach; ?>

			</div>

		</div>

		<div class="vlt-gap-120"></div>

	</div>

<?php endif;

wp_reset_postdata();