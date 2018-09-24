<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$color_palette  = umodel_set_color_palette();
$backgroundColor_1  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'backgroundColor_1' ) : '';

$options = array(
	'unique_id'              => array(
		'type'   => 'unique',
		'length' => 7
	),
	'tab_main_options'          => array(
		'type'    => 'tab',
		'title'   => esc_html__( 'Main Options', 'umodel' ),
		'options' => array(
			'section_name' => array(
				'label' => esc_html__( 'Section Name', 'umodel' ),
				'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'umodel' ),
				'help'  => esc_html__( 'Use this option to name your sections. It will help you go through the structure a lot easier.', 'umodel' ),
				'type'  => 'text',
			),
			'is_fullwidth' => array(
				'label' => esc_html__( 'Full Width', 'umodel' ),
				'type'  => 'switch',
			),
			'horizontal_paddings' => array(
				'type'         => 'select',
				'value'        => '',
				'label'        => esc_html__( 'Horizontal paddings', 'umodel' ),
				'desc'         => esc_html__( 'Section horizontal paddings', 'umodel' ),
				'choices' => array(
					''  => esc_html__( 'Default', 'umodel' ),
					'horizontal-paddings-0' => esc_html__( 'None', 'umodel' ),
					'horizontal-paddings-150' => esc_html__( 'Extra large (150px)', 'umodel' ),
				),
			),
			'background_color' => array(
				'label'    => esc_html__( 'Background Color', 'umodel' ),
				'desc'     => esc_html__( 'Select background color', 'umodel' ),
				'type'     => 'color-picker',
				'value'    => $backgroundColor_1,
				// palette colors array
				'palettes' => $color_palette,
			),
			'top_padding'      => array(
				'type'    => 'select',
				'value'   => 'section_padding_top_50',
				'label'   => esc_html__( 'Top padding', 'umodel' ),
				'desc'    => esc_html__( 'Choose top padding value', 'umodel' ),
				'choices' => array(
					'section_padding_top_0'   => esc_html__( '0', 'umodel' ),
					'section_padding_top_5'   => esc_html__( '5 px', 'umodel' ),
					'section_padding_top_15'  => esc_html__( '15 px', 'umodel' ),
					'section_padding_top_25'  => esc_html__( '25 px', 'umodel' ),
					'section_padding_top_30'  => esc_html__( '30 px', 'umodel' ),
					'section_padding_top_40'  => esc_html__( '40 px', 'umodel' ),
					'section_padding_top_50'  => esc_html__( '50 px', 'umodel' ),
					'section_padding_top_65'  => esc_html__( '65 px', 'umodel' ),
					'section_padding_top_75'  => esc_html__( '75 px', 'umodel' ),
					'section_padding_top_85'  => esc_html__( '85 px', 'umodel' ),
					'section_padding_top_100' => esc_html__( '100 px', 'umodel' ),
					'section_padding_top_130' => esc_html__( '130 px', 'umodel' ),
					'section_padding_top_150' => esc_html__( '150 px', 'umodel' ),
					'section_padding_top_200' => esc_html__( '200 px', 'umodel' ),
				),
			),
			'bottom_padding'   => array(
				'type'    => 'select',
				'value'   => 'section_padding_bottom_50',
				'label'   => esc_html__( 'Bottom padding', 'umodel' ),
				'desc'    => esc_html__( 'Choose bottom padding value', 'umodel' ),
				'choices' => array(
					'section_padding_bottom_0'   => esc_html__( '0', 'umodel' ),
					'section_padding_bottom_5'   => esc_html__( '5 px', 'umodel' ),
					'section_padding_bottom_15'  => esc_html__( '15 px', 'umodel' ),
					'section_padding_bottom_25'  => esc_html__( '25 px', 'umodel' ),
					'section_padding_bottom_30'  => esc_html__( '30 px', 'umodel' ),
					'section_padding_bottom_40'  => esc_html__( '40 px', 'umodel' ),
					'section_padding_bottom_50'  => esc_html__( '50 px', 'umodel' ),
					'section_padding_bottom_65'  => esc_html__( '65 px', 'umodel' ),
					'section_padding_bottom_75'  => esc_html__( '75 px', 'umodel' ),
					'section_padding_bottom_85'  => esc_html__( '85 px', 'umodel' ),
					'section_padding_bottom_100' => esc_html__( '100 px', 'umodel' ),
					'section_padding_bottom_130' => esc_html__( '130 px', 'umodel' ),
					'section_padding_bottom_150' => esc_html__( '150 px', 'umodel' ),
					'section_padding_bottom_200' => esc_html__( '200 px', 'umodel' ),
				),
			),
			'columns_padding'  => array(
				'type'    => 'select',
				'value'   => 'columns_padding_15',
				'label'   => esc_html__( 'Column paddings', 'umodel' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'umodel' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'umodel' ),
					'columns_padding_1'  => esc_html__( '1 px', 'umodel' ),
					'columns_padding_2'  => esc_html__( '2 px', 'umodel' ),
					'columns_padding_5'  => esc_html__( '5 px', 'umodel' ),
					'columns_padding_15' => esc_html__( '15 px - default', 'umodel' ),
					'columns_padding_25' => esc_html__( '25 px', 'umodel' ),
					'columns_padding_30' => esc_html__( '30 px', 'umodel' ),
					'columns_padding_60' => esc_html__( '60 px - large', 'umodel' ),
					'columns_padding_80' => esc_html__( '80 px - extra large', 'umodel' ),
				),
			),
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
			'parallax'         => array(
				'label' => esc_html__( 'Parallax', 'umodel' ),
				'type'  => 'switch',
			),
			'section_overlay'  => array(
				'label' => esc_html__( 'Section overlay', 'umodel' ),
				'type'  => 'switch',
			),
			'is_table'         => array(
				'label' => esc_html__( 'Vertical align content', 'umodel' ),
				'desc'  => esc_html__( 'Align columns content vertically on wide screens', 'umodel' ),
				'type'  => 'switch',
			),
			'section_id'       => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'ID attribute', 'umodel' ),
				'desc'  => esc_html__( 'Add ID attribute to section. Useful for single page menu', 'umodel' ),
			),
			'custom_class'     => array(
				'label' => esc_html__( 'Custom Class', 'umodel' ),
				'desc'  => esc_html__( 'Add custom class for section', 'umodel' ),
				'type'  => 'text',
			),
		),
	),
	'tab_onehalf_media_options' => array(
		'type'    => 'tab',
		'title'   => esc_html__( 'One half width Media', 'umodel' ),
		'options' => array(
			'enable_onehalf_media' => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__( 'Enable onehalf media', 'umodel' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'umodel' ),
				),
				'right-choice' => array(
					'value' => 'half_section',
					'label' => esc_html__( 'Yes', 'umodel' ),
				)
			),
			'side_media_image'    => array(
				'type'        => 'upload',
				'value'       => array(),
				'label'       => esc_html__( 'Side media image', 'umodel' ),
				'desc'        => esc_html__( 'Select image that you want to appear as one half side image', 'umodel' ),
				'images_only' => true,
			),
			'side_media_link'     => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Link to your side media', 'umodel' ),
				'desc'  => esc_html__( 'You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'umodel' ),
			),
			'side_media_video'    => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Video', 'umodel' ),
				'desc'    => esc_html__( 'Adds video player', 'umodel' ),
				'help'    => esc_html__( 'Leave blank if no needed', 'umodel' ),
				'preview' => array(
					'width'      => 278, // optional, if you want to set the fixed width to iframe
					'height'     => 185, // optional, if you want to set the fixed height to iframe
					/**
					 * if is set to false it will force to fit the dimensions,
					 * because some widgets return iframe with aspect ratio and ignore applied dimensions
					 */
					'keep_ratio' => true
				),
			),
			'side_media_position' => array(
				'type'         => 'switch',
				'value'        => 'image_cover_left',
				'label'        => esc_html__( 'Media position', 'umodel' ),
				'desc'         => esc_html__( 'Left or right media position', 'umodel' ),
				'left-choice'  => array(
					'value' => 'image_cover_left',
					'label' => esc_html__( 'Left', 'umodel' ),
				),
				'right-choice' => array(
					'value' => 'image_cover_right',
					'label' => esc_html__( 'Right', 'umodel' ),
				),
			),
		),
	),
);
