<?php
/**
 * Requires the WP-SCSS plugin to be installed and activated.
 */


if ( ! function_exists( 'umodel_get_theme_colors_defaults' ) ) :
	/**
	 * Return default values for uninitialized theme mods.
	 * https://make.wordpress.org/themes/tag/theme-mods-api/
	 */

	function umodel_get_theme_colors_defaults() {
		$color_1 = function_exists( !empty( 'fw_get_db_customizer_option' )) ? fw_get_db_customizer_option( 'color_1' ) : '#ff493c';
		$color_2 = function_exists( !empty( 'fw_get_db_customizer_option' )) ? fw_get_db_customizer_option( 'color_2' ) : '#242d3c';
		$color_3 = function_exists( !empty( 'fw_get_db_customizer_option' )) ? fw_get_db_customizer_option( 'color_3' ) : '#ffb820';
		$color_4 = function_exists( !empty( 'fw_get_db_customizer_option' )) ? fw_get_db_customizer_option( 'color_4' ) : '#ffffff';
		$color_5 = function_exists( !empty( 'fw_get_db_customizer_option' )) ? fw_get_db_customizer_option( 'color_5' ) : '#1b222e';
		$color_6 = function_exists( !empty( 'fw_get_db_customizer_option' )) ? fw_get_db_customizer_option( 'color_6' ) : '#989898';
		$defaults = array(
			'color_1' => $color_1,
			'color_2' => $color_2,
			'color_3' => $color_3,
			'color_4' => $color_4,
			'color_5' => $color_5,
			'color_6' => $color_6,
		);
		return apply_filters( 'umodel_theme_colors_defaults', $defaults );
	}
endif;

/* umodel_set_color_palette */
if ( !function_exists( 'umodel_set_color_palette' ) ) {
	function umodel_set_color_palette() {
		$color_palette = umodel_get_theme_colors_defaults();
		$array = array();
		foreach($color_palette as $val) {
			$array[] = $val;
		}
		return $array;
	}
} //umodel_set_color_palette


if ( (!class_exists('Wp_Scss')) ) {
	return;
} else {
	/* Always recompile in the customizer */
	if ( is_customize_preview() && ! defined( 'WP_SCSS_ALWAYS_RECOMPILE' ) ) {
		define( 'WP_SCSS_ALWAYS_RECOMPILE', true );
	}

	/* umodel_scss_set_variables */
	if ( !function_exists( 'umodel_scss_set_variables' ) ) :
		function umodel_scss_set_variables() {
			/* Colors */
			$accent_color_1  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_1' ) : '';
			$accent_color_2  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_2' ) : '';
			$backgroundColor_1  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'backgroundColor_1' ) : '';
			$backgroundColor_2  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'backgroundColor_2' ) : '';
			$backgroundColor_3  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'backgroundColor_3' ) : '';
			$fontColor  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'font_color' ) : '';
			$fontColor_2  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'font_color_2' ) : '';
			$fontColor_3  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'font_color_3' ) : '';
			$fontColor_4  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'font_color_4' ) : '';
			$linkColor  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'link_color' ) : '';
			$linkHoverColor  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'link_hover_color' ) : '';
			$borderColor  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'border_color_1' ) : '';
			$borderColor2  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'border_color_2' ) : '';

			/* Variables */
			$variables = array(

				/* Theme color scheme */
				'mainColor'             =>  $accent_color_1,
				'mainColor2'            =>  $accent_color_2,
				'backgroundColor_1'     =>  $backgroundColor_1,
				'backgroundColor_2'     =>  $backgroundColor_2,
				'backgroundColor_3'     =>  $backgroundColor_3,
				'fontColor'             =>  $fontColor,
				'fontColor2'            =>  $fontColor_2,
				'fontColor3'            =>  $fontColor_3,
				'fontColor4'            =>  $fontColor_4,
				'linkColor'             =>  $linkColor,
				'linkHoverColor'        =>  $linkHoverColor,
				'borderColor'           =>  $borderColor,
				'borderColor2'          =>  $borderColor2,
			);

			return $variables;
		}
	endif; //umodel_scss_set_variables
	add_filter( 'wp_scss_variables', 'umodel_scss_set_variables' );
}