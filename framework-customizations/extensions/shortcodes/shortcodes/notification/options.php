<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'umodel' ),
		'desc'  => esc_html__( 'Notification message', 'umodel' ),
		'type'  => 'text',
		'value' => esc_html__( 'Message!', 'umodel' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'umodel' ),
		'desc'    => esc_html__( 'Notification type', 'umodel' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'umodel' ),
			'info'    => esc_html__( 'Information', 'umodel' ),
			'warning' => esc_html__( 'Alert', 'umodel' ),
			'danger'  => esc_html__( 'Error', 'umodel' ),
		)
	),
);