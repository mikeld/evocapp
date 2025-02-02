<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

get_header();

while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/single-post/layout/layout', 'style-1' );
endwhile;

if ( leedo_get_theme_mod( 'post_navigation' ) == 'show' ) {
	echo leedo_get_post_navigation( 'post' );
}

get_footer(); ?>