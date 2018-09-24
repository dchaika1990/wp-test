<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$color_palette  = umodel_set_color_palette();
$backgroundColor_1  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'backgroundColor_1' ) : '';

$options = array(
	'column_id'        => array(
		'type'   => 'unique',
		'length' => 7
	),
	'tab_main_options' => array(
		'type'    => 'tab',
		'title'   => esc_html__( 'Main Options', 'umodel' ),
		'options' => array(
			'column_align'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Text alignment in column', 'umodel' ),
				'desc'    => esc_html__( 'Select text alignment inside your column', 'umodel' ),
				'choices' => array(
					''            => esc_html__( 'Inherit', 'umodel' ),
					'text-left'   => esc_html__( 'Left', 'umodel' ),
					'text-center' => esc_html__( 'Center', 'umodel' ),
					'text-right'  => esc_html__( 'Right', 'umodel' ),
				),
			),
			'column_padding'   => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column padding', 'umodel' ),
				'desc'    => esc_html__( 'Select optional internal column paddings', 'umodel' ),
				'choices' => array(
					''           => esc_html__( 'No padding', 'umodel' ),
					'padding_10' => esc_html__( '10px', 'umodel' ),
					'padding_20' => esc_html__( '20px', 'umodel' ),
					'padding_30' => esc_html__( '30px', 'umodel' ),
					'padding_40' => esc_html__( '40px', 'umodel' ),

				),
			),
			'column_animation' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Animation type', 'umodel' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'umodel' ),
				'choices' => array(
					''               => 'None',
					'slideDown'      => esc_html__( 'slideDown', 'umodel' ),
					'scaleAppear'    => esc_html__( 'scaleAppear', 'umodel' ),
					'fadeInLeft'     => esc_html__( 'fadeInLeft', 'umodel' ),
					'fadeInUp'       => esc_html__( 'fadeInUp', 'umodel' ),
					'fadeInRight'    => esc_html__( 'fadeInRight', 'umodel' ),
					'fadeInDown'     => esc_html__( 'fadeInDown', 'umodel' ),
					'fadeIn'         => esc_html__( 'fadeIn', 'umodel' ),
					'slideRight'     => esc_html__( 'slideRight', 'umodel' ),
					'slideUp'        => esc_html__( 'slideUp', 'umodel' ),
					'slideLeft'      => esc_html__( 'slideLeft', 'umodel' ),
					'expandUp'       => esc_html__( 'expandUp', 'umodel' ),
					'slideExpandUp'  => esc_html__( 'slideExpandUp', 'umodel' ),
					'expandOpen'     => esc_html__( 'expandOpen', 'umodel' ),
					'bigEntrance'    => esc_html__( 'bigEntrance', 'umodel' ),
					'hatch'          => esc_html__( 'hatch', 'umodel' ),
					'tossing'        => esc_html__( 'tossing', 'umodel' ),
					'pulse'          => esc_html__( 'pulse', 'umodel' ),
					'floating'       => esc_html__( 'floating', 'umodel' ),
					'bounce'         => esc_html__( 'bounce', 'umodel' ),
					'pullUp'         => esc_html__( 'pullUp', 'umodel' ),
					'pullDown'       => esc_html__( 'pullDown', 'umodel' ),
					'stretchLeft'    => esc_html__( 'stretchLeft', 'umodel' ),
					'stretchRight'   => esc_html__( 'stretchRight', 'umodel' ),
					'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'umodel' ),
					'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'umodel' ),
					'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'umodel' ),
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'umodel' ),
					'slideInDown'    => esc_html__( 'slideInDown', 'umodel' ),
					'slideInLeft'    => esc_html__( 'slideInLeft', 'umodel' ),
					'slideInRight'   => esc_html__( 'slideInRight', 'umodel' ),
					'moveFromLeft'   => esc_html__( 'moveFromLeft', 'umodel' ),
					'moveFromRight'  => esc_html__( 'moveFromRight', 'umodel' ),
					'moveFromBottom' => esc_html__( 'moveFromBottom', 'umodel' ),
				),
			),
			'custom_class'     => array(
				'label' => esc_html__( 'Custom Class', 'umodel' ),
				'desc'  => esc_html__( 'Add custom class', 'umodel' ),
				'type'  => 'text',
			),
		),
	),
	'tab_background_options' => array(
		'type'    => 'tab',
		'title'   => esc_html__( 'Background', 'umodel' ),
		'options' => array(
			'select_background_type' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'background_type' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Background Type', 'umodel' ),
						'desc'    => esc_html__( 'Here you can choose column background type', 'umodel' ),
						'value'   => ' ',
						'choices' => array(
							' '        => esc_html__( 'None', 'umodel' ),
							'color'    => esc_html__( 'Color', 'umodel' ),
							'image'    => esc_html__( 'Image', 'umodel' ),
						)
					)
				),
				'choices' => array(
					'color' => array(
						'background_color' => array(
							'label'    => esc_html__( 'Background Color', 'umodel' ),
							'desc'     => esc_html__( 'Select background color', 'umodel' ),
							'type'     => 'rgba-color-picker',
							'value'    => $backgroundColor_1,
							// palette colors array
							'palettes' => $color_palette,
						),
					),
					'image' => array(
						'background_image' => array(
							'label'   => esc_html__( 'Background Image', 'umodel' ),
							'desc'    => esc_html__( 'Please select the background image', 'umodel' ),
							'type'    => 'background-image',
							'choices' => array(//	in future may will set predefined images
							)
						),
						'background_cover' => array(
							'label' => esc_html__( 'Background Cover', 'umodel' ),
							'type'  => 'switch',
						),
					),
				)
			),
		),
	),
);
