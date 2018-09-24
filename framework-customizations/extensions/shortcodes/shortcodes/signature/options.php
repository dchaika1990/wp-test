<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'umodel' ),
		'desc'  => esc_html__( 'This can be left blank', 'umodel' )
	),
	'sub_title'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Subtitle', 'umodel' ),
	),
	'image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Image', 'umodel' ),
		'image'       => esc_html__( 'Signature Image', 'umodel' ),
		'images_only' => true,
	),
);