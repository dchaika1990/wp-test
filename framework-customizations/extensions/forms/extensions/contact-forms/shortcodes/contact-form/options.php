<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'umodel' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'umodel' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'umodel' ),
						'type'    => 'tab',
						'options' => array(
							'background_color'    => array(
								'type'    => 'select',
								'value'   => 'ls',
								'label'   => esc_html__( 'Form Background color', 'umodel' ),
								'desc'    => esc_html__( 'Select background color', 'umodel' ),
								'help'    => esc_html__( 'Select one of predefined background colors', 'umodel' ),
								'choices' => array(
									''                              => esc_html__( 'No background', 'umodel' ),
									'with_padding overflow-hidden light_form'               => esc_html__( 'Light', 'umodel' ),
									'with_padding overflow-hidden transp_black_bg'            => esc_html__( 'Dark', 'umodel' ),
									'with_padding overflow-hidden color_form'               => esc_html__( 'Main color', 'umodel' ),
								),
							),
							'field_text_align' => array(
								'type'    => 'select',
								'value'   => 'text-left',
								'label'   => esc_html__( 'Field text alignment', 'umodel' ),
								'desc'    => esc_html__( 'Select field text alignment', 'umodel' ),
								'choices' => array(
									'text-left'   => esc_html__( 'Left', 'umodel' ),
									'text-center' => esc_html__( 'Center', 'umodel' ),
									'text-right'  => esc_html__( 'Right', 'umodel' ),
								),
							),
							'columns_padding'     => array(
								'type'    => 'select',
								'value'   => 'columns_padding_15',
								'label'   => esc_html__( 'Column paddings in form', 'umodel' ),
								'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'umodel' ),
								'choices' => array(
									'columns_padding_15' => esc_html__( '15 px - default', 'umodel' ),
									'columns_padding_0'  => esc_html__( '0', 'umodel' ),
									'columns_padding_1'  => esc_html__( '1 px', 'umodel' ),
									'columns_padding_2'  => esc_html__( '2 px', 'umodel' ),
									'columns_padding_5'  => esc_html__( '5 px', 'umodel' ),
									'columns_padding_10'  => esc_html__( '10 px', 'umodel' ),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'umodel' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'umodel' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'umodel' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'umodel' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'umodel' ),
												'value' => esc_html__( 'Contact Form', 'umodel' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'umodel' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'umodel' ),
												'value' => esc_html__( 'Send', 'umodel' ),
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'umodel' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'umodel' ),
												'value' => esc_html__( 'Clear', 'umodel' ),
											),
											'button_size'      => array(
												'type'         => 'select',
												'label'        => esc_html__( 'Button size', 'umodel' ),
												'value'        => '',
												'choices' => array(
													''  => esc_html__( 'Normal', 'umodel' ),
													'wide_button'  => esc_html__( 'Large', 'umodel' ),
												),
											),
											'button_color'  => array(
												'label'   => esc_html__( 'Button Color', 'umodel' ),
												'desc'    => esc_html__( 'Choose a color for your button', 'umodel' ),
												'type'    => 'select',
												'choices' => array(
													'inverse color1'  => esc_html__( 'Main color 1', 'umodel' ),
													'inverse color2'  => esc_html__( 'Main color 2', 'umodel' ),
												),
											),
											'button_align' => array(
												'type'    => 'select',
												'value'   => 'text-left',
												'label'   => esc_html__( 'Button alignment', 'umodel' ),
												'desc'    => esc_html__( 'Select button alignment', 'umodel' ),
												'choices' => array(
													'text-left'   => esc_html__( 'Left', 'umodel' ),
													'text-center' => esc_html__( 'Center', 'umodel' ),
													'text-right'  => esc_html__( 'Right', 'umodel' ),
												),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'umodel' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'umodel' ),
												'value' => esc_html__( 'Message sent!', 'umodel' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'umodel' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'umodel' ),
										'value' => esc_html__( 'Oops something went wrong.', 'umodel' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'umodel' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					),
					'custom_class'     => array(
						'label' => esc_html__( 'Custom Class', 'umodel' ),
						'desc'  => esc_html__( 'Add custom class', 'umodel' ),
						'type'  => 'text',
					),
				),
			),
		),
	)
);