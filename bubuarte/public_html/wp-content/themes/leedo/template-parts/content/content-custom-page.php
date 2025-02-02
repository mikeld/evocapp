<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$page_shortcode = leedo_get_field( 'page_shortcode' );
if ( $page_shortcode ) {
	echo do_shortcode( html_entity_decode( $page_shortcode ) );
}

?>

<article <?php post_class( 'vlt-page vlt-page--custom' ); ?>>

	<div class="container">

		<?php the_content(); ?>

		<div class="clearfix"></div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="vlt-link-pages"><h5>' . esc_html__( 'Pages: ', 'leedo' ) . '</h5>',
				'after' => '</div>',
				'separator' => '<span class="sep">|</span>',
				'nextpagelink' => esc_html__( 'Next page', 'leedo' ) . '<i class="leedo-right-arrow"></i>',
				'previouspagelink' => '<i class="leedo-left-arrow"></i>' . esc_html__( 'Previous page', 'leedo' ),
				'next_or_number' => 'next'
			) );
		?>

	</div>

</article>
<!-- /.vlt-page -->