<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

?>

<form class="vlt-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" id="s" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', 'leedo' ); ?>" value="<?php echo get_search_query(); ?>">
	<button><i class="leedo-search"></i></button>
</form>
<!-- /.vlt-search-form -->