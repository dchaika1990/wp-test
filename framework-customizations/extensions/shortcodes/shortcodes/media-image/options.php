<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'umodel' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'umodel' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'umodel' ),
				'desc'  => esc_html__( 'Set image width', 'umodel' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'umodel' ),
				'desc'  => esc_html__( 'Set image height', 'umodel' ),
				'value' => 200
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'umodel' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'umodel' )
			),
			'target' => array(
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
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'umodel'),
		'desc'  => esc_html__('Add custom class', 'umodel'),
		'type'  => 'text',
	)
);

