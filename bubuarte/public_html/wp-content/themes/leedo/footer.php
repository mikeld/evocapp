<?php

	do_action( 'leedo/site_backtotop' );

	do_action( 'leedo/after_main_content' );

	$acf_footer = leedo_get_theme_mod( 'page_custom_footer', true );

	if ( leedo_get_theme_mod( 'footer_show', $acf_footer ) == 'show' ) {
		get_template_part( 'template-parts/footer/footer', leedo_get_theme_mod( 'footer_layout', $acf_footer ) );
	}

	do_action( 'leedo/after_site' );

?>

<?php

	$acf_page_custom_site_protection = leedo_get_theme_mod( 'page_custom_site_protection', true );

	if ( leedo_get_theme_mod( 'site_protection', $acf_page_custom_site_protection ) == 'show' ) :

?>
	<div class="vlt-site-protection">
		<?php echo leedo_get_theme_mod( 'site_protection_content' ); ?>
	</div>
	<!-- /.vlt-site-protection -->

<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>