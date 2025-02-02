<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

?>

<div class="vlt-post-meta vlt-display-1">
	<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>
	<span><?php echo leedo_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></span>
</div>
<!-- /.vlt-post-meta -->