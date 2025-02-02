<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$size = 'leedo-800x600_crop';

?>

<article <?php post_class( 'vlt-post vlt-post--style-masonry' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-thumbnail clearfix">
			<?php echo leedo_get_attachment_image_fit( get_post_thumbnail_id( get_the_ID() ), $size, array( '67.5%', '67.5%' ) ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'thumbnail-link' ); ?>
		</div>
		<!-- /.vlt-post-thumbnail -->

	<?php endif; ?>

	<div class="vlt-post-content vlt-post-content--padding vlt-post-content--background">

		<header class="vlt-post-header">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-title' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-meta' ); ?>
		</header>
		<!-- /.vlt-post-header -->

		<div class="vlt-post-excerpt">
			<?php echo leedo_get_trimmed_content( get_the_content(), 20 ); ?>
		</div>
		<!-- /.vlt-post-excerpt -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->