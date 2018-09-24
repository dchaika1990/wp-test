<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();
?>
    <div id="content" class="content-404 not_found_wrapper col-xs-12 col-sm-6 col-sm-push-6 text-sm-right text-center">
        <p class="not_found highlight">
			<?php esc_html_e( '404', 'umodel' ); ?>
        </p>
        <h3><?php esc_html_e( 'Oops, page not found!', 'umodel' ); ?></h3>
        <p>
		    <?php esc_html_e( 'You can search what are interested in:', 'umodel' ); ?>
        </p>

        <div class="widget widget_search">
		    <?php get_search_form(); ?>
        </div>

        <p class="divider_or">
		    <?php esc_html_e( 'or', 'umodel' ); ?><br>
        </p>
        <p>
            <a href="<?php echo get_home_url(); ?>" class="theme_button inverse color2">
			    <?php esc_html_e( 'To Homepage', 'umodel' ); ?>
            </a>
        </p>

    </div><!--eof #content -->

<?php
get_footer();