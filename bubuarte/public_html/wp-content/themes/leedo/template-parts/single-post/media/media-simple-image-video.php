<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$size = 'leedo-1280x720_crop';

?>

<div class="vlt-single-post-thumbnail">

	<div class="vlt-simple-image">

		<div class="vlt-simple-image__overlay"></div>

		<?php echo leedo_get_attachment_image_fit( get_post_thumbnail_id( get_the_ID() ), $size, array( '61%', '80%' ) ); ?>

		<?php if ( leedo_get_field( 'post_video_url' ) ) : ?>
			<a href="<?php the_field( 'post_video_url' ); ?>" class="vlt-video-link" data-fancybox="" data-caption=""><i class="fa fa-play"></i></a>
		<?php endif; ?>

	</div>

</div>
<!-- /.vlt-single-post-thumbnail -->