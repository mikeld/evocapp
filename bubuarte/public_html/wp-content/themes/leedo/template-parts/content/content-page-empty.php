<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

?>

<article <?php post_class( 'vlt-page vlt-page--empty' ); ?>>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ): ?>

		<p><?php esc_html_e( 'Ready to publish your first post?', 'leedo' ); ?></p>
		<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="vlt-btn vlt-btn--primary vlt-btn--effect"><span><?php esc_html_e( 'Get started here', 'leedo' ); ?></span></a>

	<?php elseif ( is_search() ): ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'leedo' ); ?></p>

	<?php else: ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'leedo' ); ?></p>

	<?php endif; ?>

</article>
<!-- /.vlt-page -->