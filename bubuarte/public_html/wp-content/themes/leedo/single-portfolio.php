<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

get_header();

?>

<main class="vlt-main">
	<?php
		while ( have_posts() ) : the_post();
			if ( post_password_required( get_the_ID() ) ) {
				get_template_part( 'template-parts/content/content', 'protected' );
			} else {
				get_template_part( 'template-parts/content/content', 'custom-page' );
			}
		endwhile;
	?>
</main>
<!-- /.vlt-main -->

<?php

	if ( leedo_get_theme_mod( 'work_navigation' ) == 'show' ) {
		echo leedo_get_post_navigation( 'portfolio' );
	}

?>

<?php get_footer(); ?>