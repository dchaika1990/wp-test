<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Signature', 'umodel' ),
	'description' => esc_html__( 'Add a signature', 'umodel' ),
	'tab'         => esc_html__( 'Content Elements', 'umodel' )
);