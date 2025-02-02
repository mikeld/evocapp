<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

?>

<div class="vlt-page-title">
	<div class="container">
		<div class="vlt-page-title__inner">
			<h1><?php esc_html_e( 'Shop', 'leedo' ); ?></h1>
			<?php
				if ( LEEDO_WOOCOMMERCE ) {
					echo woocommerce_breadcrumb();
				}
			?>
		</div>
	</div>
</div>
<!-- /.vlt-page-title -->