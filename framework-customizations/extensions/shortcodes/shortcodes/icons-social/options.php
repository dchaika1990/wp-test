<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'social_icons' => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Social Buttons', 'umodel' ),
		'desc'            => esc_html__( 'Optional social buttons', 'umodel' ),
		'template'        => '{{=icon}}',
		'box-options'     => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Social Icon', 'umodel' ),
				'set'   => 'social-icons',
			),
			'icon_class' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Icon type', 'umodel' ),
				'desc'        => esc_html__( 'Select one of predefined social button types', 'umodel' ),
				'choices'     => array(
					''                                    => 'Default',
					'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'umodel' ),
					'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'umodel' ),
					'bg-icon'                             => esc_html__( 'Simple Background Icon', 'umodel' ),
					'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'umodel' ),
					'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'umodel' ),
					'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'umodel' ),
					'color-icon'                          => esc_html__( 'Color Icon', 'umodel' ),
					'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'umodel' ),
					'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'umodel' ),
					'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'umodel' ),
					'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'umodel' ),

				),
				/**
				 * Allow save not existing choices
				 * Useful when you use the select to populate it dynamically from js
				 */
				'no-validate' => false,
			),
			'icon_url'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Icon Link', 'umodel' ),
				'desc'  => esc_html__( 'Provide a URL to your icon', 'umodel' ),
			)
		),
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'umodel' ),
		'sortable'        => true,
	)
);