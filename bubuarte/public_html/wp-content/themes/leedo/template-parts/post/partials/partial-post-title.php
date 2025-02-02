<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

?>

<h3 class="vlt-post-title"><a href="<?php the_permalink(); ?>"><?php if ( is_sticky() ) { echo '<i class="fa fa-bookmark-o"></i>'; } the_title(); ?></a></h3>
<!-- /.vlt-post-title -->