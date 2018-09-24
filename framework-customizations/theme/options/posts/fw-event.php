<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'post-featured-gallery-section' => array(
		'title'   => esc_html__( 'Featured Gallery', 'umodel' ),
		'type'    => 'box',
		'context' => 'side',

		'options' => array(
			'post-featured-gallery' => array(
				'type'  => 'multi-upload',
				'value' => array(),
				'label' => esc_html__('Images for featured gallery', 'umodel'),
				'desc'  => esc_html__('Display gallery carousel on single event', 'umodel'),
				/**
				 * If set to `true`, the option will allow to upload only images, and display a thumb of the selected one.
				 * If set to `false`, the option will allow to upload any file from the media library.
				 */
				'images_only' => true,
				/**
				 * An array with allowed files extensions what will filter the media library and the upload files.
				 */
			),
		),
	),
	'post-event-info-section' => array(
		'title'   => esc_html__( 'Event info', 'umodel' ),
		'type'    => 'box',
		'context' => 'side',

		'options' => array(
			'show-event-info' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show event info?', 'umodel' ),
				'value'        => 'hidden',
				'left-choice'  => array(
					'value' => 'hidden',
					'label' => esc_html__( 'Hide', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '',
					'label' => esc_html__( 'Show', 'umodel' ),
				),
			),
		),
	)
);