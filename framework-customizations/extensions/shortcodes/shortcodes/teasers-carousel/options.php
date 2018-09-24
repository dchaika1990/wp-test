<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get teaser to add in teasers carousel:
$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		),
		'label'      => esc_html__( 'Items number', 'umodel' ),
		'desc'       => esc_html__( 'Number of posts to display', 'umodel' ),
	),
	'margin'        => array(
		'label'   => esc_html__( 'Horizontal item margin (px)', 'umodel' ),
		'desc'    => esc_html__( 'Select horizontal item margin', 'umodel' ),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__( '0', 'umodel' ),
			'1'  => esc_html__( '1px', 'umodel' ),
			'2'  => esc_html__( '2px', 'umodel' ),
			'10' => esc_html__( '10px', 'umodel' ),
			'30' => esc_html__( '30px', 'umodel' ),
			'60' => esc_html__( '60px', 'umodel' ),
		)
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on large screens', 'umodel' ),
		'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'umodel' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'umodel' ),
			'2' => esc_html__( '2', 'umodel' ),
			'3' => esc_html__( '3', 'umodel' ),
			'4' => esc_html__( '4', 'umodel' ),
			'6' => esc_html__( '6', 'umodel' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'umodel' ),
		'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'umodel' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'umodel' ),
			'2' => esc_html__( '2', 'umodel' ),
			'3' => esc_html__( '3', 'umodel' ),
			'4' => esc_html__( '4', 'umodel' ),
			'6' => esc_html__( '6', 'umodel' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'umodel' ),
		'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'umodel' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'umodel' ),
			'2' => esc_html__( '2', 'umodel' ),
			'3' => esc_html__( '3', 'umodel' ),
			'4' => esc_html__( '4', 'umodel' ),
			'6' => esc_html__( '6', 'umodel' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'umodel' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'umodel' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'umodel' ),
			'2' => esc_html__( '2', 'umodel' ),
			'3' => esc_html__( '3', 'umodel' ),
			'4' => esc_html__( '4', 'umodel' ),
			'6' => esc_html__( '6', 'umodel' ),
		)
	),
	'show_nav'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Show navigation', 'umodel' ),
		'desc'         => esc_html__( 'Show teasers carousel navigation', 'umodel' ),
		'value'        => 'true',
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'umodel' ),
		),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'umodel' ),
		),
	),
	'teasers'                => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Add Teasers', 'umodel' ),
		'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'umodel' ),
		'desc'          => esc_html__( 'Create your tabs', 'umodel' ),
		'template'      => '{{=title}}',
		'popup-options' => $teaser->get_options(),
	),

);