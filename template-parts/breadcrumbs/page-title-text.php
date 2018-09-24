<?php
/**
 * The template for displaying page title in page title section
 *
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_search() ) :
	$search_query = get_search_query();
	if ( trim ( $search_query ) == false )  :
		printf( esc_html__( 'Search', 'umodel' ), $search_query );
	else:
		printf( esc_html__( 'Search Results for: %s', 'umodel' ), $search_query );
	endif;
	return;
endif;

if ( is_home() ) :
	$title = function_exists( 'fw_get_db_ext_settings_option' && function_exists( 'fw_ext_breadcrumbs' ) ) ? fw_get_db_ext_settings_option( 'breadcrumbs', 'blogpage-title' ) : esc_html__( 'Blog', 'umodel' );
	echo esc_html( $title );
	return;
endif;

if ( is_404() ) :
	$title = function_exists( 'fw_get_db_ext_settings_option' && function_exists( 'fw_ext_breadcrumbs' ) ) ? fw_get_db_ext_settings_option( 'breadcrumbs', '404-title' ) : esc_html__( '404', 'umodel' );
	echo esc_html( $title );
	return;
endif;

if ( function_exists( 'is_shop' ) ) :
	if ( is_shop() ) :
		$title = esc_html__( 'Shop', 'umodel' );
		echo esc_html( $title );
		return;
	endif;
endif;


if ( is_singular() ) :
	single_post_title();
	return;
endif;

if ( is_archive() ) :
	the_archive_title();
	return;
endif;