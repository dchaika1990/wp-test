<?php
/**
 * The template part for selected copyrights section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directl
}
?>
<section class="page_copyright section_padding_15">
    <h3 class="hidden"><?php echo esc_html__('Page Copyright', 'umodel'); ?></h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="grey"><?php echo wp_kses_post( function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyrights_text' ) : esc_html__( 'Powered by WordPress', 'umodel' ) ); ?></p>
            </div>
        </div>
    </div>
</section><!-- .copyrights -->