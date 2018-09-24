<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Ruler Type', 'umodel' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the HR element', 'umodel' ),
				'choices' => array(
					'line'  => esc_html__( 'Line', 'umodel' ),
					'space' => esc_html__( 'Whitespace', 'umodel' ),
				)
			)
		),
		'choices'     => array(
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'umodel' ),
					'desc'  => esc_html__( 'How much whitespace do you need?', 'umodel' ),
					'type'  => 'text',
					'value' => '50'
				)
			),
		)
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => esc_html__( 'Responsive visibility', 'umodel' ),
		'button'        => esc_html__( 'Settings', 'umodel' ),
		'size'          => 'medium',
		'popup-options' => array(
			'hidden_lg'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Large', 'umodel' ),
						'desc'         => esc_html__( 'Display on large screen?', 'umodel' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'umodel' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'umodel' ),
						)
					),
				),
			),
			'hidden_md'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Desktop', 'umodel' ),
						'desc'         => esc_html__( 'Display on desktop?', 'umodel' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'umodel' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'umodel' ),
						)
					),
				),
			),
			'hidden_sm'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Tablet', 'umodel' ),
						'desc'         => esc_html__( 'Display on tablet?', 'umodel' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'umodel' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'umodel' ),
						)
					),
				),
			),
			'hidden_xs' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Small devices', 'umodel' ),
						'desc'         => esc_html__( 'Display on small devices?', 'umodel' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'umodel' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'umodel' ),
						)
					),
				),
				'choices' => array(),
			),
		),
	),
);
