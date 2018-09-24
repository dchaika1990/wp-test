<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Panels', 'umodel' ),
		'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'umodel' ),
		'desc'          => esc_html__( 'Create your accordion panels', 'umodel' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'umodel' )
			),
			'tab_content'        => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'umodel' )
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Panel Featured Image', 'umodel' ),
				'image'       => esc_html__( 'Image for your panel.', 'umodel' ),
				'help'        => esc_html__( 'It appears to the left from your content', 'umodel' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in panel title', 'umodel' ),
				'set'   => 'rt-icons-2',
			),
		)
	),
	'id'   => array( 'type' => 'unique' ),
);