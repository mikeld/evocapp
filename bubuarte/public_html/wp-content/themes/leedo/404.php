<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

get_header();

?>

<main class="vlt-main">

	<?php echo do_shortcode( html_entity_decode( leedo_get_theme_mod( 'page_404_shortcode' ) ) ); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<?php get_template_part( 'template-parts/content/content', 'page-404' ); ?>
			</div>
		</div>
	</div>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>