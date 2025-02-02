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

$content_class = 'vlt-post-content';

if ( $opts['post_masonry_padding'] ) {
	$content_class .= ' vlt-post-content--padding';
}

if ( $opts['post_masonry_background'] ) {
	$content_class .= ' vlt-post-content--background';
}

?>

	<div class="<?php echo leedo_sanitize_class( $content_class ); ?>">

		<header class="vlt-post-header">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-title' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-meta' ); ?>
		</header>
		<!-- /.vlt-post-header -->

		<div class="vlt-post-excerpt">
			<?php echo leedo_get_trimmed_content( get_the_content(), $opts['post_masonry_excerpt'] ); ?>
		</div>
		<!-- /.vlt-post-excerpt -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->