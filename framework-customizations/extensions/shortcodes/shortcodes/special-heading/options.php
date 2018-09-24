<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_align' => array(
		'type'    => 'select',
		'value'   => 'text-left',
		'label'   => esc_html__( 'Text alignment', 'umodel' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'umodel' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'umodel' ),
			'text-center' => esc_html__( 'Center', 'umodel' ),
			'text-right'  => esc_html__( 'Right', 'umodel' ),
		),
	),
	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'umodel' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'umodel' ),
		'box-options' => array(
			'heading_tag'            => array(
				'type'    => 'select',
				'value'   => 'h4',
				'label'   => esc_html__( 'Heading tag', 'umodel' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'umodel' ),
				'choices' => array(
					'h1' => esc_html__( 'H1 tag', 'umodel' ),
					'h2' => esc_html__( 'H2 tag', 'umodel' ),
					'h3' => esc_html__( 'H3 tag', 'umodel' ),
					'h4' => esc_html__( 'H4 tag', 'umodel' ),
					'h5' => esc_html__( 'H5 tag', 'umodel' ),
					'h6' => esc_html__( 'H6 tag', 'umodel' ),
					'p'  => esc_html__( 'P tag', 'umodel' ),
				),
			),
			'heading_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading text', 'umodel' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'umodel' ),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'umodel' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'umodel' ),
				'choices' => array(
					''           => 'Inherited',
					'highlight'  => esc_html__( 'Main color', 'umodel' ),
					'highlight2'  => esc_html__( 'Main color 2', 'umodel' ),
					'darkgrey'       => esc_html__( 'Dark color', 'umodel' ),
					'lightfont'      => esc_html__( 'Light color', 'umodel' ),
				),
			),
			'heading_text_weight'    => array(
				'type'    => 'select',
				'value'   => 'bold',
				'label'   => esc_html__( 'Heading text weight', 'umodel' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'umodel' ),
				'choices' => array(
					'extra-light'     => esc_html__( 'Extra Light', 'umodel' ),
					'light-weight'     => esc_html__( 'Light', 'umodel' ),
					'regular'     => esc_html__( 'Normal', 'umodel' ),
					'medium' => esc_html__( 'Medium', 'umodel' ),
					'bold' => esc_html__( 'Bold', 'umodel' ),
					'black-weight' => esc_html__( 'Black Weight', 'umodel' ),
				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => 'text-transform-none',
				'label'   => esc_html__( 'Heading text transform', 'umodel' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'umodel' ),
				'choices' => array(
					'text-transform-none'                => 'None',
					'text-lowercase'  => esc_html__( 'Lowercase', 'umodel' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'umodel' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'umodel' ),
				),
			),
			'heading_custom_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading custom class', 'umodel' ),
				'desc'  => esc_html__( 'Add heading custom css class', 'umodel' ),
			),
		),
		'template'    => '{{- heading_text }}',
	)
);
