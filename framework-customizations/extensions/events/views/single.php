<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
get_header();
global $post;
$options        = fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() );
$mainColumnSize = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8';

$option_events  = fw_get_db_post_option( $post->ID );
$gallery_images = $option_events['post-featured-gallery'];

$post_categories = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
$post_author     = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
$post_date       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
$post_tags       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';
?>
    <div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?> content">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'event-single vertical-item overflow-hidden' ); ?>>
				<?php if ( ! empty( $gallery_images ) ) : ?>
                    <div class="item-media entry-thumbnail post-thumbnail">
                        <div class="owl-carousel entry-thumbnail-carousel"
                             data-items="1"
                             data-responsive-xs="1"
                             data-responsive-sm="1"
                             data-responsive-md="1"
                             data-responsive-lg="1"
                             data-nav="0"
                             data-dots="true"
                        >

							<?php foreach ( $gallery_images as $image ) : ?>
                                <div>
                                    <img src="<?php echo esc_url( $image['url'] ) ?>"
                                         alt="<?php echo esc_attr( $post->title ); ?>">
                                </div>
							<?php endforeach; ?>
                        </div>
                    </div>
				<?php
				else:
					umodel_post_thumbnail();
				endif;
				?>
                <div class="item-content">
                    <header class="entry-header">
						<?php if ( $post_date == 'yes' ) : ?>
                        <div class="entry-date highlight">
							<?php umodel_posted_on(); ?>
                        </div>
						<?php endif; ?><!-- .entry-date -->
                        <!-- additional information about event -->

                        <div class="event-info">
                            <div class="event-place highlight2">
								<?php
								if ( $options['event_location']['location'] ) : ?>
									<?php
									echo esc_html( $options['event_location']['location'] );
								endif;

								if ( $options['event_location']['venue'] ) :
									echo esc_html( ', ' . $options['event_location']['venue'] );
								endif;
								?>
                            </div><!-- .event-place-->
							<?php if ( $option_events['show-event-info'] != 'hidden' ) : ?>
								<?php foreach ( $options['event_children'] as $key => $row ) : ?>
									<?php if ( empty( $row['event_date_range']['from'] ) or empty( $row['event_date_range']['to'] ) ) : ?>
										<?php continue; ?>
									<?php endif; ?>
                                    <ul class="list-unstyled">
                                        <li><strong class="lightfont"><?php esc_html_e( 'Start', 'umodel' ) ?>
                                                :</strong> <?php echo wp_kses_post( $row['event_date_range']['from'] ); ?>
                                        </li>
                                        <li><strong class="lightfont"><?php esc_html_e( 'End', 'umodel' ) ?>
                                                :</strong> <?php echo wp_kses_post( $row['event_date_range']['to'] ); ?>
                                        </li>
                                    </ul>
								<?php endforeach; ?>
							<?php endif; ?>
                        </div>
                        <!-- .additional information about event -->
                        <h5 class="entry-title"><?php the_title(); ?></h5>
                    </header><!-- .entry-header -->

                    <div class="entry-content">

						<?php the_content(); ?>

						<?php
						$map = fw_ext_events_render_map();
						if ( $map ):
							?>
                            <div class="item-media entry-thumbnail map">
								<?php echo fw_ext_events_render_map(); ?>
                            </div>
						<?php
						endif; //map
						?>

						<?php if ( $post_tags == 'yes' ) : ?>
                            <div class="entry-meta">
                                <div class="entry-tags">
									<?php //tags
									echo get_the_term_list( $post->ID, 'fw-event-tag', '<span class="tag-links">', ' ', '</span>' );
									?>
                                </div>
                            </div><!-- .entry-meta -->
						<?php endif; ?> <!-- .item tags -->
						<?php do_action( 'umodel_ext_events_after_content' ); ?>
                    </div><!-- .entry-content -->
                </div><!-- .item-content -->
            </article>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile; ?>

    </div><!--eof #content -->

<?php umodel_sidebar(); ?>
    <!-- eof main aside sidebar -->
<?php
get_footer();