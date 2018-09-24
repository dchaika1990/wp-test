<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @internal */
if ( ! function_exists( 'umodel_filter_disable_shortcodes' ) ) :
	function umodel_filter_disable_shortcodes( $to_disable ) {
		$to_disable[] = 'icon_box';

		return $to_disable;
	}
endif;
add_filter( 'fw_ext_shortcodes_disable_shortcodes', 'umodel_filter_disable_shortcodes' );