<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

$header_class = 'vlt-header vlt-header--aside';

?>

<div class="hidden-md-down">

	<aside class="<?php echo leedo_sanitize_class( $header_class ); ?>">

		<div>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-aside-navigation-logo">
				<?php if ( leedo_get_theme_mod( 'header_aside_logo' ) ) : ?>
					<img src="<?php echo leedo_get_theme_mod( 'header_aside_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				<?php else: ?>
					<h2><?php bloginfo( 'name' ); ?></h2>
				<?php endif; ?>
			</a>
			<!-- .vlt-aside-header-logo -->

		</div>

		<div>

			<nav class="vlt-aside-navigation">
				<?php get_template_part( 'template-parts/header/partials/partial', 'primary-menu' ); ?>
			</nav>
			<!-- /.vlt-aside-navigation -->

		</div>

		<div>

			<?php if ( leedo_get_theme_mod( 'header_aside_social_list' ) ) : ?>
				<div class="vlt-aside-navigation-socials">
					<?php
						foreach ( leedo_get_theme_mod( 'header_aside_social_list' ) as $socialItem ):
							echo '<a class="vlt-social-icon vlt-social-icon--style-2" href="' . esc_url( $socialItem[ 'social_url' ] ) . '" target="_blank"><i class="' . leedo_sanitize_class( $socialItem[ 'social_icon' ] ) . '"></i></a>';
						endforeach;
					?>
				</div>
				<!-- /.vlt-aside-navigation-socials -->
			<?php endif; ?>

		</div>

	</aside>
	<!-- /.vlt-header--aside -->

</div>
<!-- /.hidden-md-down -->