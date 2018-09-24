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
    <div class="side_header_inner ds">
        <div class="header-side-menu text-left">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="menu-part-1">
							<?php wp_nav_menu( array(
								'theme_location' => 'extended_1',
								'menu_class'     => 'nav menu-side-click',
								'container'      => 'ul'
							) ); ?>
                        </div>
                        <div class="menu-part-2">
							<?php wp_nav_menu( array(
								'theme_location' => 'extended_2',
								'menu_class'     => 'nav menu-side-click',
								'container'      => 'ul'
							) ); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="menu-part-3">
							<?php wp_nav_menu( array(
								'theme_location' => 'extended_3',
								'menu_class'     => 'nav menu-side-click',
								'container'      => 'ul'
							) ); ?>
                        </div>
                    </div>
                </div>
                <div class="row header_bottom_part">
                    <div class="col-xs-12 flex-wrap justify-sb">
                        <div class="info-part text-center text-sm-left text-md-left">
				            <?php
				            if ( $header_phone ) : ?>
                                <div class="media small-teaser">
                                    <div class="media-left">
                                        <i class="themeicon-phone highlight fontsize_20"></i>
                                    </div>
                                    <div class="media-body">
							            <?php echo esc_html( $header_phone ); ?>
                                    </div>
                                </div>
				            <?php endif; //header_phone
				            if ( $header_email ) : ?>
                                <div class="media small-teaser">
                                    <div class="media-left">
                                        <i class="themeicon-mail highlight fontsize_20"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="mailto:<?php echo esc_attr( $header_email ); ?>"><?php echo esc_html( $header_email ); ?></a>
                                    </div>
                                </div>
				            <?php endif; //header_email
				            if ( $header_address ) : ?>
                            <div class="media small-teaser">
                                <div class="media-left">
                                    <i class="themeicon-marker highlight fontsize_20"></i>
                                </div>
                                <div class="media-body">
			                        <?php echo esc_html( $header_address ); ?>
                                </div>
                            </div>
                            <?php endif; //header_address ?>
                        </div><!-- eof .col- -->
			            <?php if ( ! empty( $social_icons ) ) : ?>
                            <div class="page_social_icons">
					            <?php
					            //get icons-social shortcode to render icons in team member item
					            $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
					            if ( ! empty( $shortcodes_extension ) ) {
						            echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
					            }
					            ?>
                            </div><!-- eof social icons -->
			            <?php endif; //social icons ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
