<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'umodel' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'umodel' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'umodel' ),
		'desc'  => esc_html__( 'Where should your button link to', 'umodel' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Open Link in New Window', 'umodel' ),
		'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'umodel' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__( 'Yes', 'umodel' ),
		),
		'left-choice'  => array(
			'value' => '_self',
			'label' => esc_html__( 'No', 'umodel' ),
		),
	),
	'size'      => array(
		'type'         => 'select',
		'label'        => esc_html__( 'Button size', 'umodel' ),
		'desc'         => esc_html__( 'Select button size', 'umodel' ),
		'value' => '',
		'choices' => array(
			'theme_button'  => esc_html__( 'Normal', 'umodel' ),
			'wide_button' => esc_html__( 'Large', 'umodel' ),
		),
	),
	'type'       => array(
		'label'   => esc_html__( 'Button Type', 'umodel' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'umodel' ),
		'type'    => 'select',
		'value'    => 'theme_button inverse',
		'choices' => array(
			'theme_button'  => esc_html__( 'Color', 'umodel' ),
			'theme_button inverse' => esc_html__( 'Inverse', 'umodel' ),
			'theme_button inverse type2' => esc_html__( 'Inverse 2', 'umodel' ),
			'simple_link'          => esc_html__( 'Just link', 'umodel' ),
		)
	),
	'color'       => array(
		'label'   => esc_html__( 'Button Color', 'umodel' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'umodel' ),
		'type'    => 'select',
		'choices' => array(
			'color1'  => esc_html__( 'Main color 1', 'umodel' ),
			'color2'  => esc_html__( 'Main color 2', 'umodel' ),
		)
	),
	'custom_class'     => array(
		'label' => esc_html__( 'Custom Class', 'umodel' ),
		'desc'  => esc_html__( 'Add custom class for button', 'umodel' ),
		'type'  => 'text',
	),
);