<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'testimonials_group' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'testimonials_layout' => array(
				'type'    => 'select',
				'value'   => 'testimonials_carousel',
				'label'   => esc_html__( 'Testimonials Layout', 'umodel' ),
				'desc'    => esc_html__( 'Select one of predefined testimonials layout', 'umodel' ),
				'choices' => array(
					'testimonials_carousel'         => esc_html__( 'Testimonials Carousel', 'umodel' ),
					'testimonials_grid' => esc_html__( 'Testimonials Grid', 'umodel' ),
				),
			),
		),
		'choices' => array(
			'testimonials_carousel'         => array(
				'carousel_autoplay' => array(
					'type'         => 'switch',
					'label'        => esc_html__( 'Carousel Autoplay', 'umodel' ),
					'value' => 'true',
					'left-choice'  => array(
						'value' => 'false',
						'label' => esc_html__( 'No', 'umodel' ),
					),
					'right-choice' => array(
						'value' => 'true',
						'label' => esc_html__( 'Yes', 'umodel' ),
					),
				),
				'autoplay_timeout' => array(
					'type'  => 'text',
					'value' => esc_html__( '3000', 'umodel' ),
					'label' => esc_html__( 'Autoplay Timeout', 'umodel' ),
					'desc'  => esc_html__( 'Set value in milliseconds', 'umodel' ),
				),
			),
		),
	),

	'testimonial_details' => array(
		'label'         => esc_html__( 'Testimonials', 'umodel' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'umodel' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'umodel' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(
			'author_avatar' => array(
				'label' => esc_html__( 'Image', 'umodel' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'umodel' ),
				'type'  => 'upload',
			),
			'author_name'   => array(
				'label' => esc_html__( 'Name', 'umodel' ),
				'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'umodel' ),
				'type'  => 'text'
			),
			'author_job'    => array(
				'label' => esc_html__( 'Position', 'umodel' ),
				'desc'  => esc_html__( 'Can be used for a job description', 'umodel' ),
				'type'  => 'text'
			),
			'site_name'     => array(
				'label' => esc_html__( 'Website Name', 'umodel' ),
				'desc'  => esc_html__( 'Linktext for the above Link', 'umodel' ),
				'type'  => 'text'
			),
			'site_url'      => array(
				'label' => esc_html__( 'Website Link', 'umodel' ),
				'desc'  => esc_html__( 'Link to the Persons website', 'umodel' ),
				'type'  => 'text'
			),
			'content'       => array(
				'label' => esc_html__( 'Quote', 'umodel' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'umodel' ),
				'type'  => 'textarea',
			),
		)
	),
);