<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'type'       => 'text',
		'value'      => '',
		'label'      => esc_html__( 'Progress Bar title', 'umodel' ),
	),
	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'umodel' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'umodel' ),
	),
	'background_class' => array(
		'type'    => 'select',
		'value'   => 'progress-bar-success',
		'label'   => esc_html__( 'Context background color', 'umodel' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'umodel' ),
		'choices' => array(
			'progress-bar-success' => esc_html__( 'Success', 'umodel' ),
			'progress-bar-info'    => esc_html__( 'Info', 'umodel' ),
			'progress-bar-warning' => esc_html__( 'Warning', 'umodel' ),
			'progress-bar-danger'  => esc_html__( 'Danger', 'umodel' ),

		),
	),
);