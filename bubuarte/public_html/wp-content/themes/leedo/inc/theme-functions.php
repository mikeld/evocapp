<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

/**
 * Sanitize slass tag
 */
if ( ! function_exists( 'leedo_sanitize_class' ) ) {
	function leedo_sanitize_class( $class, $fallback = null ) {

		if ( is_string( $class ) ) {
			$class = explode( ' ', $class );
		}

		if ( is_array( $class ) && count( $class ) > 0 ) {
			$class = array_map( 'sanitize_html_class', $class );
			return implode( ' ', $class );
		} else {
			return sanitize_html_class( $class, $fallback );
		}

	}
}

/**
 * Sanitize style tag
 */
if ( ! function_exists( 'leedo_sanitize_style' ) ) {
	function leedo_sanitize_style( $style ) {

		$allowed_html = array(
			'style' => array ()
		);
		return wp_kses( $style, $allowed_html );

	}
}

/**
 * Check exists GDPR Framework
 */
if ( ! function_exists( 'leedo_exists_gdpr_framework' ) ) {
	function leedo_exists_gdpr_framework() {
		return defined( 'GDPR_FRAMEWORK_VERSION' );
	}
}

/**
 * Get attachment image
 */
if ( ! function_exists( 'leedo_get_attachment_image' ) ) {
	function leedo_get_attachment_image( $imageID, $size = 'leedo-1920x1080', $class = '' ) {
		$output = wp_get_attachment_image( $imageID, $size, false, array(
			'class' => $class,
			'src' => wp_get_attachment_image_src( $imageID, $size )[0],
			'srcset' => wp_get_attachment_image_srcset( $imageID, $size )
		) );
		return apply_filters( 'leedo/get_attachment_image', $output );
	}
}

/**
 * Get attachment image fit
 */
if ( ! function_exists( 'leedo_get_attachment_image_fit' ) ) {
	function leedo_get_attachment_image_fit( $imageID = false, $size = 'leedo-1920x1080', $fit = array( '100%', '100%' ), $class = '' ) {

		$css_class = 'vlt-fit-image';

		$output = '<div class="' . leedo_sanitize_class( $css_class ) . '" data-size-md="' . esc_attr( $fit[0] ) . '" data-size-sm="' . esc_attr( $fit[1] ) . '">';
		$output .= wp_get_attachment_image( $imageID, $size, false, array(
			'class' => $class,
			'src' => wp_get_attachment_image_src( $imageID, $size )[0],
			'srcset' => wp_get_attachment_image_srcset( $imageID, $size )
		) );
		$output .= '</div>';

		return apply_filters( 'leedo/get_attachment_image_fit', $output );

	}
}

/**
 * Get trimmed content
 */
if ( ! function_exists( 'leedo_get_trimmed_content' ) ) {
	function leedo_get_trimmed_content( $content = false, $max_words = 18 ) {

		if ( $content == false ) {
			return;
		}

		$content = preg_replace( '~(?:\[/?)[^/\]]+/?\]~s', '', $content );
		$content = strip_tags( $content );
		$words = explode( ' ', $content, $max_words + 1 );
		if ( count( $words ) > $max_words ) {
			array_pop( $words );
			array_push( $words, '...', '' );
		}
		$content = implode( ' ', $words );
		$content = esc_html( $content );

		return apply_filters( 'leedo/get_trimmed_content', $content );

	}
}

/**
 * Get page pagination
 */
if ( ! function_exists( 'leedo_get_page_pagination' ) ) {
	function leedo_get_page_pagination( $query = null, $paginated = 'numeric' ) {

		if ( $query == null ) {
			global $wp_query;
			$query = $wp_query;
		}

		$page = $query->query_vars[ 'paged' ];
		$pages = $query->max_num_pages;
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );

		if ( $page == 0 ) {
			$page = 1;
		}

		if ( $paginated == 'none' || $pages <= 1 ) {
			return;
		}

		$class = 'vlt-pagination clearfix';

		$class .= ' vlt-pagination--' . $paginated;

		$output = '<nav class="' . leedo_sanitize_class( $class ) . '">';

		if ( $pages > 1 ) {

			if ( $paginated == 'paged' ) {

				if ( $page - 1 >= 1 ) {
					$output .= '<a class="prev" href="' . get_pagenum_link( $page - 1 ) . '"><span><i class="leedo-left-arrow"></i></span></a>';
				}

				if ( $page + 1 <= $pages ) {
					$output .= '<a class="next" href="' . get_pagenum_link( $page + 1 ) . '"><span><i class="leedo-right-arrow"></i></span></a>';
				}

			}

			if ( $paginated == 'numeric' ) {

				$numeric_links = paginate_links( array(
					'type' => 'array',
					'foramt' => '',
					'add_args' => '',
					'current' => $paged,
					'total' => $pages,
					'prev_text' => '<span><i class="leedo-left-arrow"></i></span>',
					'next_text' => '<span><i class="leedo-right-arrow"></i></span>',
				) );

				$output .= '<ul>';
				if ( is_array( $numeric_links ) ) {
					foreach ( $numeric_links as $numeric_link ) {
						$output .= '<li>' . $numeric_link . '</li>';
					}
				}
				$output .= '</ul>';

			}

			if ( $paginated == 'load-more' ) {
				$output .= '<a class="vlt-btn vlt-btn--primary vlt-btn--lg vlt-btn--effect vlt-btn--ajax-load-more" href="#">';
				$output .= '<span></span>';
				$output .= '</a>';
				$output .= leedo_load_more_btn( $query );
			}

		}

		$output .= '</nav>';

		return apply_filters( 'leedo/get_page_pagination', $output );

	}
}

/**
 * Get post taxonomy
 */
if ( ! function_exists( 'leedo_get_post_taxonomy' ) ) {
	function leedo_get_post_taxonomy( $post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true ) {

		$tags = wp_get_post_terms( $post_id, $taxonomy );
		$list = '';

		foreach ( $tags as $tag ) {
			if ( $link ) {
				$list .= '<a href="' . get_category_link( $tag->term_id ) . '">' . $tag->$get . '</a>' . $delimiter;
			} else {
				$list .= $tag->$get . $delimiter;
			}
		}

		return substr( $list, 0, strlen( $delimiter ) * ( -1 ) );

	}
}

/**
 * Callback for custom comment
 */
if ( ! function_exists( 'leedo_callback_custom_comment' ) ) {
	function leedo_callback_custom_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
		global $post;

		?>

		<li <?php comment_class( 'vlt-comment-item' ); ?>>

			<div class="vlt-comment-item__inner clearfix" id="comment-<?php comment_ID(); ?>">

				<?php if ( 0 != $args['avatar_size'] && get_avatar( $comment ) ) : ?>
					<a class="vlt-comment-avatar" href="<?php echo get_comment_author_url(); ?>"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
					<!-- /.vlt-comment-avatar -->
				<?php endif; ?>

				<div class="vlt-comment-content">

					<div class="vlt-comment-header">

						<h5><?php comment_author(); ?></h5>

						<div class="vlt-comment-header__metas">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
								<time datetime="<?php comment_time( 'c' ); ?>">
									<?php printf( get_comment_date() ); ?>
								</time>
							</a>
							<?php
								comment_reply_link( array_merge( $args, array(
									'depth' => $depth,
									'max_depth' => $args['max_depth'],
								) ) );
							?>
						</div>
						<!-- /.vlt-comment-header__metas -->

					</div>
					<!-- /.vlt-comment-header -->

					<div class="vlt-comment-text vlt-content-markup clearfix">

						<?php comment_text(); ?>

						<?php if ( '0' == $comment->comment_approved ): ?>
							<p class="vlt-alert">
								<?php esc_html_e( 'Your comment is awaiting moderation.', 'leedo' ); ?>
							</p>
						<?php endif; ?>

					</div>
					<!-- /.vlt-comment-text -->

				</div>
				<!-- /.vlt-comment-content -->

			</div>
			<!-- /.vlt-comment-item__inner -->

		<!-- </li> is added by WordPress automatically -->
		<?php
	}
}

/**
 * Get comment navigation
 */
if ( ! function_exists( 'leedo_get_comment_navigation' ) ) {
	function leedo_get_comment_navigation() {

		$output = '';

		if ( get_comment_pages_count() > 1 ) :

			$output .= '<nav class="vlt-comments-navigation">';
			if ( get_previous_comments_link() ) {
				$output .= get_previous_comments_link( esc_html__( 'Prev Page', 'leedo' ) );
			}
			if ( get_next_comments_link() ) {
				$output .= get_next_comments_link( esc_html__( 'Next Page', 'leedo' ) );
			}
			$output .= '</nav>';

		endif;

		return apply_filters( 'leedo/get_comment_navigation', $output );

	}
}

/**
 * Get single post/work navigation
 */
if ( ! function_exists( 'leedo_get_post_navigation' ) ) {
	function leedo_get_post_navigation( $post_type = 'post' ) {

		$nextPost = get_adjacent_post( false, '', true );
		$prevPost = get_adjacent_post( false, '', false );

		if ( ! $nextPost && ! $prevPost ) {
			return;
		}

		$all_link_ID = false;
		if ( $post_type == 'post' ) {
			$all_link_ID = leedo_get_theme_mod( 'blog_link' );
			$text_link = array( esc_html__( 'Prev Post', 'leedo' ), esc_html__( 'Next Post', 'leedo' ) );
		} elseif ( $post_type == 'portfolio' ) {
			$all_link_ID = leedo_get_theme_mod( 'portfolio_link' );
			$text_link = array( esc_html__( 'Prev Work', 'leedo' ), esc_html__( 'Next Work', 'leedo' ) );
		}

		$output = '';

		$output .= '<nav class="vlt-post-navigation">';

		$output .= '<div class="container">';
		$output .= '<div class="row align-items-center">';

		$output .= '<div class="d-flex col">';
		if ( ! empty( $prevPost ) ) {
			$output .= '<h5 class="vlt-display-1"><a class="prev" href="' . get_permalink( $prevPost->ID ) . '"><span>' . $text_link[0] . '</span></a></h5>';
		}
		$output .= '</div>';

		$output .= '<div class="d-flex justify-content-center col">';
		if ( $all_link_ID ) {
			$output .= '<a class="all" href="' . get_permalink( $all_link_ID ) . '"><span></span><span></span><span></span><span></span></a>';
		}
		$output .= '</div>';

		$output .= '<div class="d-flex justify-content-end col">';
		if ( ! empty( $nextPost ) ) {
			$output .= '<h5 class="vlt-display-1"><a class="next" href="' . get_permalink( $nextPost->ID ) . '"><span>' . $text_link[1] . '</span></a></h5>';
		}
		$output .= '</div>';

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</nav>';

		return apply_filters( 'leedo/get_post_navigation', $output );

	}
}

/**
 * Post views
 */
if ( ! function_exists( 'leedo_set_post_views' ) ) {
	function leedo_set_post_views( $postID ) {

		$count_key = 'leedo_post_views_count';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count++;
			update_post_meta( $postID, $count_key, $count );
		}

	}
}
add_action( 'wp_head', 'leedo_track_post_views' );

if ( ! function_exists( 'leedo_track_post_views' ) ) {
	function leedo_track_post_views( $postID ) {

		if ( !is_single() ) {
			return;
		}
		if ( empty( $postID ) ) {
			global $post;
			$postID = $post->ID;
		}
		leedo_set_post_views( $postID );

	}
}

if ( ! function_exists( 'leedo_get_post_views' ) ) {
	function leedo_get_post_views( $postID ) {

		$count_key = 'leedo_post_views_count';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
			return '0';
		}
		return $count;

	}
}