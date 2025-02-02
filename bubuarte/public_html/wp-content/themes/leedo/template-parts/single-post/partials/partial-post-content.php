<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

?>

<div class="vlt-content-markup">
		<?php the_content(); ?>
</div>

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