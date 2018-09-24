<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'umodel' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'umodel' ),
		'desc'          => esc_html__( 'Create your tabs', 'umodel' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'umodel' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'umodel' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'umodel' ),
				'image'       => esc_html__( 'Featured image for your tab', 'umodel' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'umodel' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'umodel' ),
				'set'   => 'rt-icons-2',
			),
		),
	),
	'small_tabs' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Small Tabs', 'umodel' ),
		'desc'         => esc_html__( 'Decrease tabs size', 'umodel' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'umodel' ),
		),
		'right-choice' => array(
			'value' => 'small-tabs',
			'label' => esc_html__( 'Yes', 'umodel' ),
		),
	),
	'top_border' => array(
		'type'         => 'switch',
		'value'        => 'top-color-border',
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