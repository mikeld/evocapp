<?php
/**
 * Item meta template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-title' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-meta' ); ?>
		</header>
		<!-- /.vlt-post-header -->

		<div class="vlt-post-excerpt">
			<?php echo leedo_get_trimmed_content( get_the_content(), $opts['post_default_excerpt'] ); ?>
		</div>
		<!-- /.vlt-post-excerpt -->

		<?php if ( $opts['post_default_read_more'] ) : ?>
			<footer class="vlt-post-footer">
				<?php get_template_part( 'template-parts/post/partials/partial', 'post-read-more' ); ?>
			</footer>
			<!-- /.vlt-post-footer -->
		<?php endif; ?>

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->