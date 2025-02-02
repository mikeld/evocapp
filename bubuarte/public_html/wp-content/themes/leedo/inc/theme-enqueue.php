<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Enqueue assets
 */
if ( ! class_exists( 'ThemeEnqueueAssets' ) ) {
	class ThemeEnqueueAssets {

		public function __construct() {
			$theme_info = wp_get_theme();
			$this->assets_dir = LEEDO_THEME_DIRECTORY . 'assets/';
			$this->customizer_frontend_css = LEEDO_THEME_DIRECTORY .'inc/framework/customizer-frontend.css';
			$this->customizer_editor_css = LEEDO_THEME_DIRECTORY .'inc/framework/customizer-editor.css';
			$this->theme_version = $theme_info[ 'Version' ];
			$this->init_assets();
		}

		public function fonts_url() {
			$fonts_url = '';
			$fonts = array();
			$subsets = 'latin-ext';
			$fonts[] = 'Montserrat:400,500,600,700,800';
			$fonts[] = 'Muli:400,400:italic,600';

			if ( $fonts ) {
				$fonts_url = add_query_arg( array(
					'family' => urlencode( implode( '|', $fonts ) ),
					'subset' => urlencode( $subsets ),
				), 'https://fonts.googleapis.com/css?family=' );
			}
			return $fonts_url;
		}

		public function init_assets() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_gutenberg_editor_styles' ) );
		}

		public function enqueue_frontend_scripts() {
			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Enqueue default scripts
			wp_enqueue_script( 'imagesloaded' );
			wp_enqueue_script( 'jquery-masonry' );

			// Enqueue theme scripts
			if ( leedo_get_theme_mod( 'nprogress' ) ) {
				wp_enqueue_script( 'nprogress', $this->assets_dir .'vendors/nprogress.js', array( 'jquery' ), $this->theme_version, true );
			}
			wp_enqueue_script( 'superfish', $this->assets_dir .'vendors/superfish.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'superclick', $this->assets_dir .'vendors/superclick.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'inview', $this->assets_dir .'vendors/jquery.inview.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'theia-sticky-sidebar', $this->assets_dir .'vendors/theia-sticky-sidebar.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'fancybox', $this->assets_dir .'vendors/jquery.fancybox.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'fitvids', $this->assets_dir .'vendors/jquery.fitvids.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'jarallax', $this->assets_dir .'vendors/jarallax.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'jarallax-element', $this->assets_dir .'vendors/jarallax-element.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'scrollTo', $this->assets_dir .'vendors/jquery.scrollTo.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'swiper', $this->assets_dir .'vendors/swiper.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'fastclick', $this->assets_dir .'vendors/fastclick.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'anime', $this->assets_dir .'vendors/anime.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'matchHeight', $this->assets_dir .'vendors/jquery.matchHeight-min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'howler', $this->assets_dir .'vendors/howler.core.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'ajaxchimp', $this->assets_dir .'vendors/jquery.ajaxchimp.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'fittext', $this->assets_dir .'vendors/jquery.fittext.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'countdown', $this->assets_dir .'vendors/jquery.countdown.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'circle-progress', $this->assets_dir .'vendors/circle-progress.min.js', array( 'jquery' ), $this->theme_version, true );

			if ( leedo_get_theme_mod( 'animation_on_scroll' ) == 'enable' ) {
				wp_enqueue_script( 'aos', $this->assets_dir .'vendors/aos.js', array( 'jquery' ), $this->theme_version, true );
			}

			// Enqueue theme helper script
			wp_enqueue_script( 'vlt-helpers', $this->assets_dir .'scripts/vlt-helpers.js', array( 'jquery' ), $this->theme_version, true );

			// Enqueue controllers
			wp_enqueue_script( 'vlt-controllers', $this->assets_dir .'scripts/vlt-controllers.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_localize_script(
				'vlt-controllers',
				'VLT_SUBSCRIBE_CDATA',
				array(
					'subscribe_submit' => esc_html__( 'Submitting...', 'leedo' ),
					'subscribe_string_0' => esc_html__( 'We have sent you a confirmation email. Please check your inbox.', 'leedo' ),
					'subscribe_string_1' => esc_html__( 'Please enter your email.', 'leedo' ),
					'subscribe_string_2' => esc_html__( 'An email address must contain a single "@" character.', 'leedo' ),
					'subscribe_string_3' => esc_html__( 'This email seems to be invalid. Please enter a correct one.', 'leedo' ),
					'subscribe_string_4' => esc_html__( 'This email seems to be invalid. Please enter a correct one.', 'leedo' ),
					'subscribe_string_5' => esc_html__( 'This email address looks fake or invalid. Please enter a real email address.', 'leedo' )
				)
			);
			wp_localize_script(
				'vlt-controllers',
				'VLT_COUNTDOWN_CDATA',
				array(
					'days' => esc_html__( 'Days', 'leedo' ),
					'hours' => esc_html__( 'Hours', 'leedo' ),
					'minutes' => esc_html__( 'Minutes', 'leedo' ),
					'seconds' => esc_html__( 'Seconds', 'leedo' ),
				)
			);
			if ( leedo_get_theme_mod( 'menu_toggle_sound' ) ) {
				wp_localize_script(
					'vlt-controllers',
					'VLT_MENU_TOGGLE_SOUND_CDATA',
					array(
						'open' => leedo_get_theme_mod( 'open_click_sound' ),
						'close' => leedo_get_theme_mod( 'close_click_sound' ),
					)
				);
			}
		}

		public function enqueue_gutenberg_editor_styles() {
			wp_enqueue_style( 'vlt-gutenberg', $this->assets_dir .'css/vlt-gutenberg-style.min.css', array(), $this->theme_version );
		}

		public function enqueue_admin_styles() {
			wp_enqueue_style( 'vlt-admin-style', $this->assets_dir .'css/vlt-admin.css', array(), $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-editor', $this->fonts_url(), false, $this->theme_version );
				wp_enqueue_style( 'vlt-customizer-editor', $this->customizer_editor_css, array(), $this->theme_version );
			}
		}

		public function enqueue_admin_scripts() {
			wp_enqueue_script( 'vlt-admin-script', $this->assets_dir .'scripts/vlt-admin.js', array( 'jquery' ), $this->theme_version, true );
		}

		public function enqueue_frontend_styles() {
			wp_enqueue_style( 'normalize', $this->assets_dir .'css/plugins/normalize.css', array(), $this->theme_version );
			wp_enqueue_style( 'grid', $this->assets_dir .'css/plugins/grid.css', array(), $this->theme_version );
			wp_enqueue_style( 'superfish', $this->assets_dir .'css/plugins/superfish.css', array(), $this->theme_version );
			wp_enqueue_style( 'leedo-font', $this->assets_dir .'fonts/leedo/style.css', array(), $this->theme_version );
			wp_enqueue_style( 'fancybox', $this->assets_dir .'css/plugins/jquery.fancybox.min.css', array(), $this->theme_version );
			wp_enqueue_style( 'swiper', $this->assets_dir .'css/plugins/swiper.min.css', array(), $this->theme_version );
			if ( leedo_get_theme_mod( 'animation_on_scroll' ) == 'enable' ) {
				wp_enqueue_style( 'aos', $this->assets_dir .'css/plugins/aos.css', array(), $this->theme_version );
			}
			wp_enqueue_style( 'fontawesome', $this->assets_dir .'fonts/fontawesome/font-awesome.min.css', array(), $this->theme_version );
			wp_enqueue_style( 'vlt-style-css', $this->assets_dir .'css/vlt-style.min.css', array(), $this->theme_version );
			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-frontend', $this->fonts_url(), false, $this->theme_version );
				wp_enqueue_style( 'vlt-customizer-frontend', $this->customizer_frontend_css, array(), $this->theme_version );
			}
		}

	}
	new ThemeEnqueueAssets;
}