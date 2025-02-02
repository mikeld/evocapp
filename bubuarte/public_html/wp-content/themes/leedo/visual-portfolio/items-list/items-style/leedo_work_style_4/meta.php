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


<div class="vp-portfolio__item-meta">
	<?php
	// Show Title.
	if ( $opts['show_title'] && $args['title'] ) {
		?>
		<h4 class="vp-portfolio__item-meta-title">
			<?php
			if ( $args['url'] ) {
				?>
				<a href="<?php echo esc_url( $args['url'] ); ?>">
					<?php echo esc_html( $args['title'] ); ?>
				</a>
				<?php
			} else {
				echo esc_html( $args['title'] );
			}
			?>
		</h4>
		<?php
	}
	// Show Categories.
	if ( $opts['show_categories'] && $args['categories'] && ! empty( $args['categories'] ) ) {
		?>
		<ul class="vp-portfolio__item-meta-categories vlt-display-1">
			<?php
			$count = $opts['categories_count'];
			foreach ( $args['categories'] as $category ) {
				if ( ! $count ) {
					break;
				}
				?>
				<li class="vp-portfolio__item-meta-category">
					<a href="<?php echo esc_html( $category['url'] ); ?>">
						<?php echo esc_html( $category['label'] ); ?>
					</a>
				</li>
				<?php
				$count--;
			}
			?>
		</ul>
		<?php
	}
	?>
</div>