<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

if ( LEEDO_WOOCOMMERCE ) : ?>

	<?php if ( leedo_get_theme_mod( 'header_cart_icon' ) == 'show' ) : ?>

		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="vlt-menu-shop-cart">
			<i class="leedo-paper-bag"></i>
			<span><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
		</a>
		<!-- /.vlt-menu-shop-cart -->

	<?php endif; ?>

<?php endif; ?>