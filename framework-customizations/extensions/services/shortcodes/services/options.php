<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy = $ext_services_settings['taxonomy_name'];

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
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
	'layout'        => array(
		'label'   => esc_html__( 'Layout', 'umodel' ),
		'desc'    => esc_html__( 'Choose layout', 'umodel' ),
		'value'   => 'carousel',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'umodel' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'umodel' ),
		)
	),
	'carousel_autoplay' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Carousel Autoplay', 'umodel' ),
		'desc'         => esc_html__( 'Only for carousel layout', 'umodel' ),
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
	'autoplay_timeout' => array(
		'type'  => 'text',
		'value' => esc_html__( '3000', 'umodel' ),
		'label' => esc_html__( 'Autoplay Timeout', 'umodel' ),
		'desc'  => esc_html__( 'Only for carousel layout (value in milliseconds)', 'umodel' ),
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
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'umodel' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'umodel' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'umodel' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'umodel' ),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'umodel'),
		'desc'  => esc_html__('You can select one or more categories', 'umodel'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 10,
		'limit' => 100,
	)
);