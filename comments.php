<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<?php umodel_paging_comments_nav(); ?>
			</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
        <?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'umodel' ); ?></p>
		<?php endif; //comments_open() ?>
		<?php
		//fields are hooked in inc/hooks.php
		if ( have_comments() ) {
			$title_reply = esc_html__( 'Comments', 'umodel' );
		}
		echo wp_kses_post('<h3 class="respond-title">'. $title_reply .'</h3>');
		?>
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'walker'      => umodel_return_comments_walker(),
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 120,
			) );
			?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<?php umodel_paging_comments_nav(); ?>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>
	<?php endif; // have_comments() ?>
		<?php
		$args = array(
			'comment_field'        => is_user_logged_in() ? '<div class="col-sm-12"><div class="form-group comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'umodel' ) . '</label> <textarea id="comment"  class="form-control" name="comment" cols="45" rows="5"  aria-required="true" required="required"  placeholder="' . esc_attr__( 'Your Comment', 'umodel' ) . '"></textarea></div></div>' : '',
			'logged_in_as'         => '<div class="col-sm-12"><p class="logged-in-as">' .
			                          sprintf(
			                          /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
				                          '<a href="%1$s" aria-label="%2$s">' . esc_html__( 'Logged in as %3$s', 'umodel' ) . '</a>. <a href="%4$s">' . esc_html__( 'Log out?', 'umodel' ) . '</a>',
				                          get_edit_user_link(),
				                          /* translators: %s: user name */
				                          esc_attr( sprintf( esc_html__( 'Logged in as %s. Edit your profile.', 'umodel' ), $user_identity ) ),
				                          $user_identity,
				                          wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )
			                          ) . '</p></div>',
			'comment_notes_before' => '',
			'class_form'           => 'comment-form row columns_padding_10',
			'cancel_reply_link'    => esc_html__( 'Cancel reply', 'umodel' ),
			'label_submit'         => esc_html__( 'Send', 'umodel' ),
			'title_reply'          => '<h3 class="respond-title">' . esc_html__( 'Send Your Comment', 'umodel' ) .'</h3>',
			'title_reply_before'   => '',
			'title_reply_after'    => '',
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="theme_button inverse color2 %3$s" value="%4$s" /><input type="reset" id="reset_%2$s" class="theme_button wide_button" value="' . esc_html__( 'Clear Form', 'umodel' ) . '" />',
			'submit_field'         => '<div class="col-sm-12"><p class="form-submit text-left">%1$s %2$s</p></div>',
			'format'               => 'html5',
		);

		comment_form( $args ); ?>
</div><!-- #comments -->