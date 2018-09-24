<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );
$button_array = array(
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show teaser button', 'umodel' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'umodel' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'umodel' ),
				),
			),
		),
	)
);

$teaser_center_array = array(
	'teaser_center' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Center teaser contents', 'umodel' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'umodel' ),
		),
		'right-choice' => array(
			'value' => 'text-center',
			'label' => esc_html__( 'Yes', 'umodel' ),
		),
	),
);

$icon_options = array(
	'type'    => 'group',
	'options' => array(
		'icon'       => array(
			'type'  => 'icon',
			'label' => esc_html__( 'Choose an Icon', 'umodel' ),
			'set'   => 'rt-icons-2',
		),
		'icon_size'  => array(
			'type'    => 'select',
			'value'   => 'size_normal',
			'label'   => esc_html__( 'Icon Size', 'umodel' ),
			'choices' => array(
				'size_small'  => esc_html__( 'Small', 'umodel' ),
				'size_normal' => esc_html__( 'Normal', 'umodel' ),
				'size_big'    => esc_html__( 'Big', 'umodel' ),
			)
		),
		'icon_style' => array(
			'type'    => 'image-picker',
			'value'   => '',
			'label'   => esc_html__( 'Icon Style', 'umodel' ),
			'desc'    => esc_html__( 'Select one of predefined icon styles. If not set - no icon will appear.', 'umodel' ),
			'help'    => esc_html__( 'If not set - no icon will appear.', 'umodel' ),
			'choices' => array(
				''                    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_00.png',
				'default_icon'        => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_01.png',
				'border_icon round'   => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_02.png',
				'bg_color round' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_03.png',
			),

			'blank' => false, // (optional) if true, images can be deselected
		),
		'icon_color'     => array(
			'type'    => 'select',
			'value'   => '',
			'label'   => esc_html__( 'Icon color', 'umodel' ),
			'desc'    => esc_html__( 'Select a color for your icon', 'umodel' ),
			'choices' => array(
				''           => esc_html__( 'Inherited', 'umodel' ),
				'color_1'  => esc_html__( 'Main color 1', 'umodel' ),
				'color_2'  => esc_html__( 'Main color 2', 'umodel' ),
			),
		),
	),
);

$image_options = array(
	'type'        => 'upload',
	'value'       => '',
	'label'       => esc_html__( 'Teaser Image', 'umodel' ),
	'image'       => esc_html__( 'Image for your teaser.', 'umodel' ),
	'help'        => 'Image for your teaser. Image can appear as an element, or background or even can be hidden depends from chosen teaser type',
	'images_only' => true,
);

$option_teaser_icon = array(
	'icon_options' => $icon_options,
);

$option_teaser_image = array(
	'teaser_image' => $image_options,
);

$option_teaser_square = array(
	'teaser_image' => $image_options,
	'icon'         => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Choose an Icon', 'umodel' ),
		'set'   => 'rt-icons-2',
	),
);

$option_teaser_counter = array(
	'icon_options'    => $icon_options,
	'counter_options' => array(
		'type'    => 'group',
		'options' => array(

			'number'                  => array(
				'type'  => 'text',
				'value' => 10,
				'label' => esc_html__( 'Count To Number', 'umodel' ),
				'desc'  => esc_html__( 'Choose value to count to', 'umodel' ),
			),
			'counter_additional_text' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Add some text after counter', 'umodel' ),
				'desc'  => esc_html__( 'You can add "+", "%", decimal values etc.', 'umodel' ),
			),
			'speed'                   => array(
				'type'       => 'slider',
				'value'      => 1000,
				'properties' => array(
					'min'  => 500,
					'max'  => 5000,
					'step' => 100,
				),
				'label'      => esc_html__( 'Counter Speed (counter teaser only)', 'umodel' ),
				'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'umodel' ),
			),
		),
	),
);

$options = array(
	'title'        => array(
		'type'  => 'text',
		'label' => esc_html__( 'Teaser Title', 'umodel' ),
	),
	'link'         => array(
		'type'  => 'text',
		'value' => '#',
		'label' => esc_html__( 'Teaser link', 'umodel' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'umodel' ),
	),
	'teaser_types' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'teaser_type' => array(
				'type'    => 'image-picker',
				'value'   => 'icon_top',
				'label'   => esc_html__( 'Teaser Type', 'umodel' ),
				'desc'    => esc_html__( 'Select one of predefined teaser types', 'umodel' ),
				'choices' => array(
					'icon_top'      => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_top.png',
					'icon_left'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_left.png',
					'icon_right'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_right.png',
					'image_top'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_top.png',
					'image_left'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_left.png',
					'image_right'   => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_right.png',
					'icon_image_bg' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_image_bg.png',
					'counter'       => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_counter.png',
				),
				'blank'   => false, // (optional) if true, images can be deselected
			),

		),
		'choices'      => array(
			'icon_top'      => array_merge( $option_teaser_icon, $teaser_center_array, $button_array ),
			'icon_left'     => $option_teaser_icon,
			'icon_right'    => $option_teaser_icon,
			'image_top'     => array_merge( $option_teaser_image, $teaser_center_array, $button_array ),
			'image_left'    => $option_teaser_image,
			'image_right'   => $option_teaser_image,
			'icon_image_bg' => $option_teaser_square,
			'counter'       => $option_teaser_counter
		),
		'show_borders' => true,
	),
	'teaser_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Teaser Box Style', 'umodel' ),
		'choices' => array(
			''                             => esc_html__( 'Default (no border or background)', 'umodel' ),
			'with_padding big_padding with_border'     => esc_html__( 'Bordered', 'umodel' ),
			'with_padding big_padding with_background' => esc_html__( 'Muted Background', 'umodel' ),
			'with_padding big_padding with_background ls'              => esc_html__( 'Light background', 'umodel' ),
			'with_padding big_padding with_background ls ms'           => esc_html__( 'Grey background', 'umodel' ),
			'with_padding big_padding with_background ds'              => esc_html__( 'Dark background', 'umodel' ),
			'with_padding big_padding with_background ds ms'           => esc_html__( 'Darkgrey background', 'umodel' ),
			'with_padding big_padding with_background cs'              => esc_html__( 'Main color background', 'umodel' ),
		)
	),
	'content'      => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Teaser text', 'umodel' ),
		'desc'  => esc_html__( 'Enter desired teaser content', 'umodel' ),
	),
);