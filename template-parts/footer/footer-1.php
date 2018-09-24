<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$footer_image   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_image' ) : ' ';
?>
<?php if( is_active_sidebar('sidebar-footer-1') ) :?>
    <footer id="footer" class="page_footer footer_1 section_padding_top_100 section_padding_bottom_100 columns_padding_25"  <?php echo !empty( $footer_image['url'] ) ? ' style="background-image: url('. esc_url( $footer_image['url']) .')"' : ' ' ?>>
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 text-center to_animate" data-animation="fadeInUp">
					<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
                </div>
            </div>

        </div>
    </footer><!-- .page_footer -->
<?php endif; ?>