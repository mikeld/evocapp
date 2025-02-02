<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

get_header();

$layout = leedo_get_theme_mod( 'archive_layout' );
$pagination = leedo_get_theme_mod( 'archive_type_pagination' );

$column_sidebar_class = 'col-md-4';
$column_content_class = 'col-md-8';
$column_sidebar_class .= leedo_get_theme_mod( 'sticky_sidebar' ) == 'enable' ? ' vlt-column-sticky-sidebar' : '';
$column_content_class .= leedo_get_theme_mod( 'sticky_sidebar' ) == 'enable' ? ' vlt-column-sticky-content' : '';

$post_list_class = 'vlt-blog-posts clearfix';
$post_list_class .= ' vlt-blog-posts--' . $layout . '_layout';
$post_list_class .= ' vlt-blog-posts--' . $pagination . '_pagination';

get_template_part( 'template-parts/page-title/page-title', 'archive' );

?>

<main class="vlt-main vlt-main--padding">
	<div class="container">

		<div class="row">

			<div class="<?php echo leedo_sanitize_class( $column_content_class ); ?>">
				<div class="<?php echo leedo_sanitize_class( $post_list_class ); ?>">
					<?php
						if ( have_posts() ) :
							get_template_part( 'template-parts/loop/loop-blog', $layout );
							echo leedo_get_page_pagination( null, $pagination );
						else:
							get_template_part( 'template-parts/content/content-page', 'empty' );
						endif;
					?>
				</div>
			</div>

			<div class="<?php echo leedo_sanitize_class( $column_sidebar_class ); ?>">
				<div class="vlt-sidebar vlt-sidebar--right">
					<?php get_sidebar(); ?>
				</div>
			</div>

		</div>

	</div>
</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>