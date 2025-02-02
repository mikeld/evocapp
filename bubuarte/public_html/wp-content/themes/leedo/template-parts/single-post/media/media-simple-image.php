<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$size = 'leedo-1280x720_crop';

?>

<div class="vlt-single-post-thumbnail">

	<div class="vlt-simple-image">
		<?php echo leedo_get_attachment_image_fit( get_post_thumbnail_id( get_the_ID() ), $size, array( '61%', '80%' ) ); ?>
	</div>

</div>
<!-- /.vlt-single-post-thumbnail -->