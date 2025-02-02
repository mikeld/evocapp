<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>

<div class="vlt-reviews" id="reviews">

	<div id="comments"></div>

	<?php if ( have_comments() ) : ?>

		<ul class="vlt-reviews__list">
			<?php
				wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array(
					'avatar_size' => 100,
					'style' => 'ul',
					'callback' => 'woocommerce_comments'
				) ) );
			?>
		</ul>
		<?php echo leedo_get_comment_navigation(); ?>

	<?php else : ?>

		<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'leedo' ); ?></p>

	<?php endif; ?>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();


					$comment_field = '<div class="vlt-form-group"><textarea placeholder="' . esc_attr__( 'Your review', 'leedo' ) . '" id="comment" name="comment" cols="45" rows="6" aria-required="true" required></textarea></div>';
					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_field .= '<div class="vlt-form-group">
							<div class="d-flex align-items-center">
								<label for="rating">' . esc_html__( 'Your rating', 'leedo' ) . '</label>
								<select name="rating" id="rating" aria-required="true" required>
									<option value="">' . esc_html__( 'Rate&hellip;', 'leedo' ) . '</option>
									<option value="5">' . esc_html__( 'Perfect', 'leedo' ) . '</option>
									<option value="4">' . esc_html__( 'Good', 'leedo' ) . '</option>
									<option value="3">' . esc_html__( 'Average', 'leedo' ) . '</option>
									<option value="2">' . esc_html__( 'Not that bad', 'leedo' ) . '</option>
									<option value="1">' . esc_html__( 'Very poor', 'leedo' ) . '</option>
								</select>
							</div>
						</div>';
					}

					$comment_form = array(
						'title_reply'          => have_comments() ?  __( 'Add a review:', 'leedo' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'leedo' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'leedo' ),
						'title_reply_before'   => '<h6>',
						'title_reply_after'    => '</h6>',
						'comment_notes_after'  => '',
						'comment_notes_before' => '',
						'label_submit'  => __( 'Add a Review', 'leedo' ),
						'submit_button' => '<button type="submit" id="%2$s" class="%3$s"><span>%4$s</span></button>',
						'class_submit' => 'vlt-btn vlt-btn--primary vlt-btn--effect',
						'comment_field' => $comment_field,
						'fields' => array(
							'author' => '<div class="vlt-form-row two-col"><div class="vlt-form-group"><input placeholder="' . esc_attr__( 'Your Name', 'leedo' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></div>',
							'email' => '<div class="vlt-form-group"><input placeholder="' . esc_attr__( 'Your Email', 'leedo' ) . '" id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></div></div>',
						),
						'logged_in_as' => '',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'leedo' ), esc_url( $account_page_url ) ) . '</p>';
					}

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'leedo' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>