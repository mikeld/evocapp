<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$size = '1920x960_crop';

?>

<div class="vlt-single-post-thumbnail">

	<div class="vlt-image-slider" data-dots="false" data-nav="true">

		<div class="swiper-container">
			<div class="swiper-wrapper">

				<div class="swiper-slide"><?php echo leedo_get_attachment_image_fit( get_post_thumbnail_id( get_the_ID() ), $size, array( '48.7%', '80%' ) ); ?></div>

				<?php

					if ( leedo_get_field( 'post_gallery_images' ) ) :

						$images = leedo_get_field( 'post_gallery_images' );

						foreach( $images as $image ) :
							echo '<div class="swiper-slide">' . leedo_get_attachment_image_fit( $image['ID'], $size, array( '48.7%', '80%' ) ) . '</div>';
						endforeach;

					endif;

				?>

			</div>
			<!-- /.swiper-wrapper -->
			<div class="vlt-swiper-button-prev vlt-swiper-button-prev--style-1"><i class="leedo-left-arrow"></i></div>
			<div class="vlt-swiper-button-next vlt-swiper-button-next--style-1"><i class="leedo-right-arrow"></i></div>

		</div>
		<!-- /.swiper-container -->

	</div>
	<!-- /.vlt-image-slider -->

</div>
<!-- /.vlt-single-post-thumbnail -->