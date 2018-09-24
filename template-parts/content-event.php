<?php
/**
 * The default template for displaying event content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_categories = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
$post_author     = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
$post_date       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
$post_tags       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';


$options       = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() ) : false;
$option_events = fw_get_db_post_option( $post->ID );

$post_categories = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
$post_author     = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
$post_date       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
$post_tags       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';

?>
<article
        id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding overflow-hidden events-loop' ); ?>>
    <div class="side-item">
        <div class="row">
            <div class="col-md-5">
                <div class="item-media cover-image">
					<?php the_post_thumbnail( 'umodel-square' ); ?>
                </div>
            </div>
            <div class="col-md-7">
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
	                    <?php
	                    the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
	                    ?>
                    </header><!-- .entry-header -->

					<?php if ( is_search() ) : ?>
                        <div class="entry-summary blog-excerpt">
							<?php echo wp_kses_post( $option_events['excerpt_text_id'] ); ?>
                        </div><!-- .entry-summary -->
					<?php else : ?>
                        <div class="entry-content blog-excerpt">
	                        <?php
	                        //hidding "more link" in content
	                        the_content();
	                        ?>
							<?php
							wp_link_pages( array(
								'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'umodel' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
							?>
                        </div><!-- .entry-content -->
					<?php endif; //is_search
					?>
                </div><!-- eof .item-content -->
            </div>
        </div><!-- eof .row -->
    </div><!-- eof .side-item -->
</article><!-- #post-## -->