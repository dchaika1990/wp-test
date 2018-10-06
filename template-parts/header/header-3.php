<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
$header_phone = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_phone' ) : '';
$header_address = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_address' ) : '';
$header_email = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_email' ) : '';

//header button
$header_button    = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_button' ) : '';
$header_add_class = ! empty( $header_button ) ? 'header_button' : '';
?>
<header class="page_header page_header_side vertical_menu_header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 flex-wrap v-center justify-sb">
                <?php get_template_part( 'template-parts/header/header-logo' ); ?>

                <span class="toggle_menu_side header-slide"><span></span></span>
                <?php
                if ( ! empty( $shortcodes_extension ) ) {
                    echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $header_button );
                }
                ?>
            </div>
        </div>
    </div>

</header>
