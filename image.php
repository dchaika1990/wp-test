<?php
/**
 * The template for displaying image attachments
 */

get_header();

// Retrieve attachment metadata.
$metadata       = wp_get_attachment_metadata();
$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8'; ?>
	<div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?> content-area image-attachment">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<div class="entry-attachment bottommargin_40">
						<div class="attachment">
							<?php umodel_the_attached_image(); ?>
						</div><!-- .attachment -->

						<?php if ( has_excerpt() ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div><!-- .entry-caption -->
						<?php endif; ?>
					</div><!-- .entry-attachment -->
					<header class="entry-header">
						<div class="entry-meta item-meta">
							<span class="full-size-link categories-links theme_buttons small_buttons color1"><a
									href="<?php echo wp_get_attachment_url(); ?>"><?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?></a></span>
							<?php umodel_posted_on(); ?>
							<?php esc_html_e( 'in', 'umodel' ); ?> <span class="parent-post-link"><a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></span>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
					<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'umodel' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->

			<nav id="image-navigation"
			     class="navigation image-navigation with_background with_padding topmargin_40 darklinks">
				<div class="display_table">
					<div class="display_table_cell">
						<?php previous_image_link( false, '<div class="previous-image">' . esc_html__( 'Previous Image', 'umodel' ) . '</div>' ); ?>
					</div>
					<div class="display_table_cell text-right">
						<?php next_image_link( false, '<div class="next-image">' . esc_html__( 'Next Image', 'umodel' ) . '</div>' ); ?>
					</div>
				</div><!-- .nav-links -->
			</nav><!-- #image-navigation -->

			<?php comments_template(); ?>

		<?php endwhile; // end of the loop. ?>
	</div><!--eof #content -->
    <?php umodel_sidebar(); ?>
    <!-- eof main aside sidebar -->
<?php
get_footer();