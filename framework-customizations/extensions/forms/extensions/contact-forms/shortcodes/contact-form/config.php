<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'umodel' ),
	'description' => esc_html__( 'Build contact forms', 'umodel' ),
	'tab'         => esc_html__( 'Content Elements', 'umodel' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);