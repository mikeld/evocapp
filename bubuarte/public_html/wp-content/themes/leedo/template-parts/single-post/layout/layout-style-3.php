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

	<div class="vlt-single-post-wrapper vlt-single-post-wrapper--style-3">

		<?php
			if ( leedo_get_field( 'single_post_shortcode' ) ) {
				echo do_shortcode( html_entity_decode( leedo_get_field( 'single_post_shortcode' ) ) );
			}
		?>

		<div class="container">

			<div class="row">
				<div class="col-md-2"></div><div class="col-md-8">

					<article <?php post_class( 'vlt-single-post' ); ?>>

						<header class="vlt-single-post__header vlt-single-post__header--style-2">
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

			<?php

				if ( leedo_get_theme_mod( 'also_like_posts' ) == 'show' ) {
					get_template_part( 'template-parts/single-post/sections/section', 'also-like-posts-3col' );
				}

			?>

		</div>
		<!-- /.container -->

		<?php

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		?>

	</div>
	<!-- /.vlt-single-post-wrapper -->

</main>
<!-- /.vlt-main -->