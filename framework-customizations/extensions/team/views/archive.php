<?php
/**
 * The template for default displaying portfolio taxonomy
 */
get_header();
?>
<div id="content" class="team-list col-sm-12 col-md-10 col-md-push-1">
    <?php if ( have_posts() ) : ?>
        <div class="topmargin_30 row">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php
                include( fw()->extensions->get( 'team' )->locate_view_path( 'loop-item2' ) );
                ?>
            <?php endwhile; ?>
        </div><!-- eof isotope_container -->
    <?php
    else :
        // If no content, include the "No posts found" template.
        get_template_part( 'template-parts/content', 'none' );
    endif; ?>
    <?php // Pagination.
    $pagination = paginate_links( array(
        'prev_text' => esc_html__( 'Prev', 'umodel' ),
        'next_text' => esc_html__( 'Next', 'umodel' ),
        'type'      => 'list',
    ) );
    if ( $pagination ) {
        echo '<nav class="pagination-nav">' . wp_kses_post( str_replace( 'page-numbers', 'page-numbers pagination', $pagination ) ) . '</nav>';
    }
    ?>
</div><!--eof #content -->
<?php
get_footer();