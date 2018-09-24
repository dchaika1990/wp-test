<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
$pID = get_the_ID();

$fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
//no columns on single gallery page
$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8';

?>
	<div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?> content">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'text-center vertical-item content-padding big_padding' ); ?>>
				<!-- .entry-header -->
				<div class="gallery-item with_background">
					<div class="item-media">
						<?php
						$thumbnails = fw_ext_portfolio_get_gallery_images();
						$captions   = array();
						if ( ! empty( $thumbnails ) ) :
							$loop = ( count( $thumbnails ) > 1 ) ? "true" : "false";
							?>
							<div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
							     data-loop="<?php echo esc_attr( $loop ); ?>"
							     data-margin="0"
							     data-nav="0"
							     data-dots="<?php echo esc_attr( $loop ); ?>"
							     data-themeclass="owl-theme entry-thumbnail-carousel"
							     data-center="false"
							     data-items="1"
							     data-autoplay="true"
							     data-responsive-xs="1"
							     data-responsive-sm="1"
							     data-responsive-md="1"
							     data-responsive-lg="1"
							>
								<?php foreach ( $thumbnails as $thumbnail ) :
									$attachment = get_post( $thumbnail['attachment_id'] );
									$captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;
									$image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
									?>
									<div class="item">
										<img src="<?php echo esc_attr( $image ); ?>"
										     class="portfolio-gallery-image"
										     alt="<?php echo esc_attr( $attachment->post_title ); ?>"
										     title="portfolio-gallery-image-<?php echo esc_attr( $attachment->ID ); ?>"
										     width="<?php echo esc_attr( $fw_ext_projects_gallery_image['width'] ); ?>"
										     height="<?php echo esc_attr( $fw_ext_projects_gallery_image['height'] ); ?>"
										>
									</div>
								<?php endforeach ?>
							</div>
							<?php
						else:
							the_post_thumbnail( 'umodel-full-width' );
						endif; //more than one thumbnail check
						?>
					</div><!-- .item-media -->
					<div class="item-content entry-content">
						<h3 class="item-title">
							<?php the_title(); ?>
						</h3>
						<?php
						the_content();

						//buttons_share
						umodel_share_this( true )
						?>
					</div>
					<!-- .entry-content -->
				</div>
				<!-- .entry-content -->
			</article><!-- #post-## -->

		<?php endwhile;

		// Previous/next post navigation. Uncomment following line if you need post navigation
		umodel_post_nav();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		?>

	</div><!--eof #content -->

    <?php umodel_sidebar(); ?>
    <!-- eof main aside sidebar -->
<?php
get_footer();