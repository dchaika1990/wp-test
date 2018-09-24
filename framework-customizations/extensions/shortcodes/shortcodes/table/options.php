<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'table'      => array(
		'type'  => 'table',
		'label' => false,
		'desc'  => false,
	),
	'table_type' => array(
		'type'    => 'select',
		'value'   => 'table',
		'label'   => esc_html__( 'Tabular table style', 'umodel' ),
		'choices' => array(
			'table'                => esc_html__( 'Bootstrap Default', 'umodel' ),
			'table table-striped'  => esc_html__( 'Bootstrap Striped', 'umodel' ),
			'table table-bordered' => esc_html__( 'Bootstrap Bordered', 'umodel' ),
			'table_template grey'  => esc_html__( 'Theme style', 'umodel' ),

		),
	),
);