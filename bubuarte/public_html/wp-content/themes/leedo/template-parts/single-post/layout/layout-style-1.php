<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

?>

<main class="vlt-main">

	<?php
		if ( has_post_thumbnail() ) {
			switch( $format ) {
				case 'standard':
				case 'link':
				case 'quote':
				case 'audio':
					get_template_part( 'template-parts/single-post/media/media', 'empty-title-lg' );
					break;
				case 'video':
					get_template_part( 'template-parts/single-post/media/media', 'empty-title-lg-video' );
					break;
				case 'gallery':
					get_template_part( 'template-parts/single-post/media/media', 'slider' );
					break;
			}
		}
	?>

	<div class="vlt-single-post-wrapper vlt-single-post-wrapper--style-1">

		<?php
			if ( leedo_get_field( 'single_post_shortcode' ) ) {
				echo do_shortcode( html_entity_decode( leedo_get_field( 'single_post_shortcode' ) ) );
			}
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">

					<article <?php post_class( 'vlt-single-post' ); ?>>

						<header class="vlt-single-post__header vlt-single-post__header--style-1">
							<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'title' ); ?>
							<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'meta' ); ?>
						</header>
						<!-- /.vlt-single-post__header -->

						<div class="vlt-single-post__content clearfix">
							<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'content' ); ?>
						</div>
						<!-- /.vlt-single-post__content -->

						<footer class="vlt-single-post__footer">
							<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'footer' ); ?>
						</footer>
						<!-- /.vlt-single-post__footer -->

					</article>
					<!-- /.vlt-single-post -->

				</div>
			</div>
		</div>
		<!-- /.container -->

		<?php

			if ( leedo_get_theme_mod( 'also_like_posts' ) == 'show' ) {
				echo '<div class="container">';
				get_template_part( 'template-parts/single-post/sections/section', 'also-like-posts-3col' );
				echo '</div>';
			}

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		?>

	</div>
	<!-- /.vlt-single-post-wrapper -->

</main>
<!-- /.vlt-main -->