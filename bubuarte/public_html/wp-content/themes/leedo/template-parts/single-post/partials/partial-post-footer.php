<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

?>

<?php if ( get_the_tags() ) : ?>
	<div class="vlt-post-tags">
		<h5 class="vlt-display-1"><?php esc_html_e( 'Tags:', 'leedo' ); ?></h5>
		<?php the_tags( '' ); ?>
	</div>
	<!-- /.vlt-post-tags -->
<?php endif; ?>

<?php if ( function_exists( 'vlthemes_get_post_share_buttons' ) && leedo_get_theme_mod( 'show_share_post' ) == 'show' ) : ?>
	<div class="vlt-social-share">
		<h5 class="vlt-display-1"><?php esc_html_e( 'Share this:', 'leedo' ); ?></h5>
		<?php echo vlthemes_get_post_share_buttons( get_the_ID() ); ?>
	</div>
	<!-- /.vlt-social-share -->
<?php endif; ?>