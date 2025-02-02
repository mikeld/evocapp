<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

$column_sidebar_class = 'col-md-4';
$column_content_class = 'col-md-8';
$column_sidebar_class .= leedo_get_theme_mod( 'sticky_sidebar' ) == 'enable' ? ' vlt-column-sticky-sidebar' : '';
$column_content_class .= leedo_get_theme_mod( 'sticky_sidebar' ) == 'enable' ? ' vlt-column-sticky-content' : '';

?>

<main class="vlt-main">

	<?php
		if ( has_post_thumbnail() ) {
			switch( $format ) {
				case 'standard':
				case 'link':
				case 'quote':
				case 'audio':
				case 'video':
				case 'gallery':
					get_template_part( 'template-parts/single-post/media/media', 'hero-title-lg' );
					break;
			}
		}
	?>

	<div class="vlt-single-post-wrapper vlt-single-post-wrapper--style-5">

		<?php
			if ( leedo_get_field( 'single_post_shortcode' ) ) {
				echo do_shortcode( html_entity_decode( leedo_get_field( 'single_post_shortcode' ) ) );
			}
		?>

		<div class="container">
			<div class="row">

				<div class="<?php echo leedo_sanitize_class( $column_content_class ); ?>">

					<article <?php post_class( 'vlt-single-post' ); ?>>

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

					<?php

						if ( leedo_get_theme_mod( 'also_like_posts' ) == 'show' ) {
							get_template_part( 'template-parts/single-post/sections/section', 'also-like-posts-2col' );
						}

						if ( comments_open() || get_comments_number() ) {
							comments_template( '/alternative-comments.php' );
						}

					?>

				</div>

				<div class="<?php echo leedo_sanitize_class( $column_sidebar_class ); ?>">
					<div class="vlt-sidebar vlt-sidebar--right">
						<?php get_sidebar(); ?>
					</div>
				</div>

			</div>
		</div>
		<!-- /.container -->

	</div>
	<!-- /.vlt-single-post-wrapper -->

</main>
<!-- /.vlt-main -->