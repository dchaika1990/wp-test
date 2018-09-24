<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'umodel' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'umodel' ),
		'desc'          => esc_html__( 'Create your tabs', 'umodel' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'           => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'umodel' )
			),
			'tab_columns_width'   => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Column width in tab content', 'umodel' ),
				'value'   => 'col-sm-4',
				'desc'    => esc_html__( 'Choose teaser width inside tab content', 'umodel' ),
				'choices' => array(
					'col-sm-12' => esc_html__( '1/1', 'umodel' ),
					'col-sm-6'  => esc_html__( '1/2', 'umodel' ),
					'col-sm-4'  => esc_html__( '1/3', 'umodel' ),
					'col-sm-3'  => esc_html__( '1/4', 'umodel' ),
				),
			),
			'tab_columns_padding' => array(
				'type'    => 'select',
				'value'   => 'columns_padding_15',
				'label'   => esc_html__( 'Column paddings', 'umodel' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'umodel' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'umodel' ),
					'columns_padding_1'  => esc_html__( '1 px', 'umodel' ),
					'columns_padding_2'  => esc_html__( '2 px', 'umodel' ),
					'columns_padding_5'  => esc_html__( '5 px', 'umodel' ),
					'columns_padding_15' => esc_html__( '15 px - default', 'umodel' ),
					'columns_padding_25' => esc_html__( '25 px', 'umodel' ),
				),
			),
			'tab_teasers'         => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Teasers in tabs', 'umodel' ),
				'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'umodel' ),
				'desc'          => esc_html__( 'Create your teasers in tabs', 'umodel' ),
				'template'      => '{{=title}}',
				'popup-options' => $teaser->get_options(),

			),
		),

	),
	'top_border' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Top color border', 'umodel' ),
		'desc'         => esc_html__( 'Add top color border to tab content', 'umodel' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No top border', 'umodel' ),
		),
		'right-choice' => array(
			'value' => 'top-color-border',
			'label' => esc_html__( 'Color top border', 'umodel' ),
		),
	),
	'id'         => array( 'type' => 'unique' ),
);