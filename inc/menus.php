<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Register menus
 */

// This theme uses wp_nav_menu() in following locations:
register_nav_menus( array(
	'primary' => esc_html__( 'Top primary menu', 'umodel' ),
	'extended_1' => esc_html__( 'Top extended menu 1', 'umodel' ),
	'extended_2' => esc_html__( 'Top extended menu 2', 'umodel' ),
	'extended_3' => esc_html__( 'Top extended menu 3', 'umodel' ),
) );