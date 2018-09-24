<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( class_exists( 'Umodel_Comments_Walker' ) ) {
	return;
}

/**
 * Walker for comments
 */
class Umodel_Comments_Walker extends Walker_Comment {

	/**
	 * Output a comment in the HTML5 format.
	 * @see wp_list_comments()
	 *
	 * @param object $comment Comment to display.
	 * @param int $depth Depth of comment.
	 * @param array $args An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) {
					echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'class' => 'media-object' ) );
				} ?>
			</div>
			<!-- .comment-author -->

			<div class="comment-text">
				<div class="comment-meta">

					<div class="author_url highlight2"><?php printf( '%s <span class="says">' . esc_html__( '', 'umodel' ) . '</span>', sprintf( '<span class="fn">%s</span>', get_comment_author_link( $comment ) ) ); ?></div>

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'umodel' ); ?></p>
					<?php endif; ?>
				</div><!-- .comment-meta -->

				<div class="comment-metadata highlight2">
					<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php
							/* translators: 1: comment date, 2: comment time */
							printf( '<span class="separator">%1$s</span> %2$s <span class="separator">%3$s</span> %4$s %5$s',
								esc_html__('/', 'umodel'),
                                esc_attr( get_comment_date( '', $comment )),
                                esc_html__('/', 'umodel'),
                                esc_html__('AT', 'umodel'),
								esc_attr(get_comment_time())
                            );
							?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below'  => 'div-comment',
					'depth'      => $depth,
					'reply_text' => esc_html__( 'Reply', 'umodel' ),
					'max_depth'  => $args['max_depth'],
					'before'     => '<span class="reply">',
					'after'      => '</span>'
				) ) );
				?>
			</div><!-- .media-left -->
		</article><!-- .comment-body -->
<?php
	}
}