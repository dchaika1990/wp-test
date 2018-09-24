<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icons' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Icons in list', 'umodel' ),
		'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'umodel' ),
		'desc'          => esc_html__( 'Create your tabs', 'umodel' ),
		'template'      => '{{=text}}',
		'popup-options' => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon', 'umodel' ),
				'set'   => 'rt-icons-2',
			),
			'text'       => array(
				'type'  => 'text',
				'value'   => '',
				'label' => esc_html__( 'Text', 'umodel' ),
				'desc'  => esc_html__( 'Text near title', 'umodel' ),
			),
		),
	),
);