<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$size = 'leedo-1920x960_crop';

?>

<div class="vlt-single-post-thumbnail">

	<div class="vlt-page-title-hero vlt-page-title-hero--lg	vlt-page-title-hero--post jarallax">

		<div class="vlt-page-title-hero__overlay"></div>

		<?php echo leedo_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), $size, 'jarallax-img' ); ?>

		<div class="vlt-page-title-hero__content">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div><div class="col-md-8">
						<h1 class="vlt-page-title-hero__title"><?php the_title(); ?></h1>
						<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'meta' ); ?>
					</div>
				</div>
			</div>
		</div>

		<a href="#content" class="vlt-scroll-to-arrow">
			<i class="leedo-download-arrow"></i>
		</a>

	</div>

</div>
<!-- /.vlt-single-post-thumbnail -->

<div id="content"></div>