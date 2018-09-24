<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}
/**
 * The template for displaying services taxonomy
 */
get_header();

$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8';
$unique_id = uniqid();
?>
    <div id="content" class="services-grid col-md-<?php echo esc_attr( $mainColumnSize ); ?>">
        <?php if ( have_posts() ) : ?>
            <div class="row columns_margin_bottom_50 columns_padding_30">
                <?php
                while ( have_posts() ) : the_post();
                    ?>
                    <div class="service_item_wrap topmargin_10 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <?php
                        include( fw()->extensions->get( 'services' )->locate_view_path( 'loop-item' ) );
                        ?>
                    </div>
                <?php endwhile; ?>
            </div><!-- eof services -->
            <?php
        else :
            // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
        <?php // Previous/next page navigation.
        umodel_paging_nav();
        ?>
    </div><!--eof #content -->

    <?php umodel_sidebar(); ?>
    <!-- eof main aside sidebar -->
<?php
get_footer();