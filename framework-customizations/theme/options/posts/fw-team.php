<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'team_slider_image' => array(
		'context' => 'side',
		'title' => esc_html__( 'Team Slider Image', 'umodel' ),
		'type' => 'box',
		'options' => array(
			'slider_image' => array(
				'type' => 'upload',
				'label' => false,
				'desc' => esc_html__( 'Use only for Team Slider shortcode ', 'umodel' )
			),
		)
	),
);