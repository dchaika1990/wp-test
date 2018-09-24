<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slider_options' => array(
		'type'    => 'group',
		'context' => 'normal',
		'title'   => esc_html__( 'Slider options', 'umodel' ),
		'desc'    => false,
		'value'   => false,
		'options'  => array(
			'slider_autoplay' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Autoplay', 'umodel' ),
				'value' => 'true',
				'left-choice'  => array(
					'value' => 'false',
					'label' => esc_html__( 'No', 'umodel' ),
				),
				'right-choice' => array(
					'value' => 'true',
					'label' => esc_html__( 'Yes', 'umodel' ),
				),
			),
			'slider_speed' => array(
				'type'  => 'text',
				'value' => esc_html__( '3000', 'umodel' ),
				'label' => esc_html__( 'Speed', 'umodel' ),
				'desc'  => esc_html__( 'Please input here value in milliseconds.', 'umodel' ),
			),
		),
	),
);