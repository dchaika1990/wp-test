<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'size' => array(
		'type'       => 'slider',
		'value'      => 240,
		'properties' => array(
			'min'  => 150,
			'max'  => 350,
			'step' => 10,
		),
		'label'      => esc_html__( 'Chart Size (px)', 'umodel' ),
	),

	'line' => array(
		'type'       => 'slider',
		'value'      => 5,
		'properties' => array(
			'min'  => 1,
			'max'  => 40,
			'step' => 1,
		),
		'label'      => esc_html__( 'Chart Size (px)', 'umodel' ),
	),

	'trackcolor' => array(
		'type'  => 'color-picker',
		'value' => '#54be73',
		'label' => esc_html__( 'Bar Color', 'umodel' ),
	),

	'bgcolor' => array(
		'type'  => 'color-picker',
		'value' => '#e5e5e5',
		'label' => esc_html__( 'Track Color', 'umodel' ),
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
	'speed'   => array(
		'type'       => 'slider',
		'value'      => 1000,
		'properties' => array(
			'min'  => 500,
			'max'  => 5000,
			'step' => 100,
		),
		'label'      => esc_html__( 'Percents Counter Speed', 'umodel' ),
		'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'umodel' ),
	),
	'name'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Chart Name', 'umodel' ),
		'desc'  => esc_html__( 'Appears below percents number', 'umodel' ),
	),
);