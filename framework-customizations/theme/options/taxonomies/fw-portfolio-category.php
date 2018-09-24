<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'box_id' => array(
		'type'    => 'box',
		'title'   => esc_html__( 'Options for child categories', 'umodel' ),
		'options' => array(
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
			'item_layout'   => array(
				'label'   => esc_html__( 'Item layout', 'umodel' ),
				'desc'    => esc_html__( 'Choose Item layout', 'umodel' ),
				'value'   => 'item-regular',
				'type'    => 'select',
				'choices' => array(
					'item-regular'  => esc_html__( 'Regular (just image)', 'umodel' ),
					'item-title'    => esc_html__( 'Image with title', 'umodel' ),
					'item-extended' => esc_html__( 'Image with title and excerpt', 'umodel' ),
				)
			),
			'full_width'    => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Full width gallery', 'umodel' ),
				'desc'         => esc_html__( 'Enable full width container for gallery', 'umodel' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'umodel' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'umodel' ),
				),
			),
			'items_per_page' => array(
				'type'  => 'select',
				'value' => '12',
				'label' => esc_html__( 'Items Per Page', 'umodel' ),
				'choices' => array(
					'2' =>  esc_html__('2 Items', 'umodel'),
					'3' =>  esc_html__('3 Items', 'umodel'),
					'4' =>  esc_html__('4 Items', 'umodel'),
					'6' =>  esc_html__('6 Items', 'umodel'),
					'8' =>  esc_html__('8 Items', 'umodel'),
					'9' =>  esc_html__('9 Items', 'umodel'),
					'12' =>  esc_html__('12 Items', 'umodel'),
					'16' =>  esc_html__('16 Items', 'umodel'),
				),
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
		)
	)
);