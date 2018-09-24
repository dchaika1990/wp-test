<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'umodel' ),
		'set'   => 'rt-icons-2',
	),
	'icon_position'          => array(
		'type'         => 'switch',
		'value'        => 'left',
		'label'        => esc_html__( 'Icon position', 'umodel' ),
		'left-choice'  => array(
			'value' => 'left',
			'label' => esc_html__( 'Left', 'umodel' ),
		),
		'right-choice' => array(
			'value' => 'right',
			'label' => esc_html__( 'Right', 'umodel' ),
		),
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
		'value'   => 'default_icon',
		'label'   => esc_html__( 'Icon Style', 'umodel' ),
		'desc'    => esc_html__( 'Select one of predefined icon styles.', 'umodel' ),
		'help'    => esc_html__( 'If not set - no icon will appear.', 'umodel' ),
		'choices' => array(
			'default_icon' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_01.png',
			'border_icon round'        => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_02.png',
			'bg_color round'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_03.png',
			'bg_color' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_04.png',
		),

		'blank' => false, // (optional) if true, images can be deselected
	),
	'icon_color'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Icon color', 'umodel' ),
		'desc'    => esc_html__( 'Select a color for your icon', 'umodel' ),
		'choices' => array(
			''           => 'Inherited',
			'color_1'  => esc_html__( 'Main color 1', 'umodel' ),
			'color_2'  => esc_html__( 'Main color 2', 'umodel' ),
		),
	),
	'text_align'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment', 'umodel' ),
		'desc'    => esc_html__( 'Select text alignment', 'umodel' ),
		'choices' => array(
			''            => esc_html__( 'Inherit', 'umodel' ),
			'text-left'   => esc_html__( 'Left', 'umodel' ),
			'text-center' => esc_html__( 'Center', 'umodel' ),
			'text-right'  => esc_html__( 'Right', 'umodel' ),
		),
	),
	'title'      => array(
		'type'  => 'text',
		'value'   => '',
		'label' => esc_html__( 'Title', 'umodel' ),
		'desc'  => esc_html__( 'Title near icon', 'umodel' ),
	),
	'text'       => array(
		'type'  => 'text',
		'value'   => '',
		'label' => esc_html__( 'Text', 'umodel' ),
		'desc'  => esc_html__( 'Text near title', 'umodel' ),
	),
);