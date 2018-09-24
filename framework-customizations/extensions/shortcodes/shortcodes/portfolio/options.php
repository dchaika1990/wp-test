<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

$options = array(
	'layout'        => array(
		'label'   => esc_html__( 'Portfolio Layout', 'umodel' ),
		'desc'    => esc_html__( 'Choose projects layout', 'umodel' ),
		'value'   => 'isotope',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'umodel' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'umodel' ),
		)
	),
	'carousel_autoplay' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Carousel Autoplay', 'umodel' ),
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
		'desc'  => esc_html__( 'Set value in milliseconds', 'umodel' ),
	),
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'umodel' ),
		'desc'    => esc_html__( 'Choose Item layout', 'umodel' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-regular'  => esc_html__( 'Regular (just image)', 'umodel' ),
			'item-title2'    => esc_html__( 'Image with title', 'umodel' ),
			'item-extended' => esc_html__( 'Image with title and excerpt', 'umodel' ),
		)
	),
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		),
		'label'      => esc_html__( 'Items number', 'umodel' ),
		'desc'       => esc_html__( 'Number of portfolio projects tu display', 'umodel' ),
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
		)
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on wide screens', 'umodel' ),
		'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'umodel' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'umodel' ),
			'2' => esc_html__( '2', 'umodel' ),
			'3' => esc_html__( '3', 'umodel' ),
			'4' => esc_html__( '4', 'umodel' ),
			'6' => esc_html__( '6', 'umodel' ),
			'8' => esc_html__( '8', 'umodel' ),
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
	'show_carousel_slider' => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show Carousel Slider', 'umodel' ),
		'desc'         => esc_html__( 'Hide or show slider for Owl Carousel layout', 'umodel' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'umodel' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'umodel' ),
		),
	),
	'add_image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Additional Image', 'umodel' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library (only for carousel type)', 'umodel' )
	),
);