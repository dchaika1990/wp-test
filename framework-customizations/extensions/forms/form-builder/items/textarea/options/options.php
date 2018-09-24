<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'rows_num' => array(
		'type' => 'short-text',
		'value' => '7',
		'label' => esc_html__( 'Number of rows', 'umodel' ),
		'desc' => esc_html__( 'Select number of rows for textarea', 'umodel' ),
	),
	'icon' => array(
		'type' => 'icon',
		'label' => esc_html__( 'Icon', 'umodel' ),
		'set'   => 'rt-icons-2',
	),
);