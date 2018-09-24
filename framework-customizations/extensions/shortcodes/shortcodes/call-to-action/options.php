<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );

$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'umodel' ),
		'desc'  => esc_html__( 'This can be left blank', 'umodel' )
	),
	'message'       => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Content', 'umodel' ),
		'desc'  => esc_html__( 'Enter some content for this Info Box', 'umodel' )
	),
	'button' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Button', 'umodel' ),
		'popup-title'   => esc_html__( 'Edit Button', 'umodel' ),
		'popup-options' => $button->get_options(),
	),
);