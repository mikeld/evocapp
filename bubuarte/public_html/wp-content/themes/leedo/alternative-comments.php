<?php

/**
 * @author: VLThemes
 * @version: 1.1.8
 */

if ( post_password_required() ) {
	return;
}

?>

<div id="comments"></div>

<?php if ( have_comments() ) : ?>
	<div class="vlt-comments vlt-comments--style-2">
		<h3 class="vlt-comments__title"><?php esc_html_e( 'Comments.', 'leedo' ); ?></h3>
		<ul class="vlt-comments__list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style' => 'ul',
					'max_depth' => '3',
					'short_ping' => true,
					'reply_text' => esc_html__( 'Reply', 'leedo' ),
					'callback' => 'leedo_callback_custom_comment',
				) );
			?>
		</ul>
		<?php echo leedo_get_comment_navigation(); ?>
	</div>
	<!-- /.vlt-comments -->
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div class="vlt-comment-form vlt-comment-form--style-2">
		<?php
			$commenter = wp_get_current_commenter();
			$args = array(
				'label_submit' => esc_html__( 'Post a Comment', 'leedo' ),
				'title_reply' => esc_html__( 'Leave a Comment.', 'leedo' ),
				'title_reply_before' => '<h3 class="vlt-comment-form__title">',
				'title_reply_after' => '</h3>',
				'cancel_reply_before' => '',
				'cancel_reply_after' => '',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'title_reply_to' => esc_html__( 'Leave a Reply', 'leedo' ),
				'cancel_reply_link' => '<i class="leedo-cross"></i>',
				'submit_button' => '<button type="submit" id="%2$s" class="%3$s"><span>%4$s</span></button>',
				'class_submit' => 'vlt-btn vlt-btn--primary vlt-btn--effect',
				'comment_field' => '<div class="vlt-form-group"><textarea id="comment" name="comment" rows="6" placeholder="' . esc_attr__( 'Your Comment', 'leedo' ) . '"></textarea></div>',
				'fields' => array(
					'author' => '<div class="vlt-form-row two-col"><div class="vlt-form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="'.esc_attr__( 'Your Name', 'leedo' ) . '"></div>',
					'email' => '<div class="vlt-form-group"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( 'Your Email', 'leedo' ) . '"></div></div>',
				),
			);
			comment_form( $args );
		?>
	</div>
	<!-- /.vlt-comment-form -->
<?php endif; ?>