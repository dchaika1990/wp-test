<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in item:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
//get social icons to add in item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'umodel' ),
	),
	'title_tag'     => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'umodel' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'umodel' ),
			'h3' => esc_html__( 'H3', 'umodel' ),
			'h4' => esc_html__( 'H4', 'umodel' ),
		)
	),
	'content'       => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Item text', 'umodel' ),
		'desc'          => esc_html__( 'Enter desired item content', 'umodel' ),
		'size'          => 'small', // small, large
		'editor_height' => 400,
	),
	'item_style'    => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Item Box Style', 'umodel' ),
		'choices' => array(
			'no-content-padding'              => esc_html__( 'Default (no border or background)', 'umodel' ),
			'content-padding with_border'     => esc_html__( 'Bordered', 'umodel' ),
			'content-padding with_background' => esc_html__( 'Muted Background', 'umodel' ),
			'content-padding ls ms'           => esc_html__( 'Grey background', 'umodel' ),
			'content-padding ds'              => esc_html__( 'Darkgrey background', 'umodel' ),
			'content-padding ds ms'           => esc_html__( 'Dark background', 'umodel' ),
			'content-padding cs'              => esc_html__( 'Main color background', 'umodel' ),
			'full-padding with_border'        => esc_html__( 'Bordered with Padding', 'umodel' ),
			'full-padding with_background'    => esc_html__( 'Muted Background with Padding', 'umodel' ),
			'full-padding ls ms'              => esc_html__( 'Grey background with Padding', 'umodel' ),
			'full-padding ds'                 => esc_html__( 'Darkgrey background with Padding', 'umodel' ),
			'full-padding ds ms'              => esc_html__( 'Dark background with Padding', 'umodel' ),
			'full-padding cs'                 => esc_html__( 'Main color background with Padding', 'umodel' ),
		)
	),
	'link'          => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Item link', 'umodel' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'umodel' ),
	),
	'item_image'    => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Item Image', 'umodel' ),
		'image'       => esc_html__( 'Image for your item. Not all item layouts show image', 'umodel' ),
		'help'        => 'Image for your item. Image can appear as an element, or background or even can be hidden depends from chosen item type',
		'images_only' => true,
	),
	'image_right'   => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Image to the right', 'umodel' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'umodel' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'umodel' ),
		),
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Image width on wide screens', 'umodel' ),
		'desc'    => esc_html__( 'Select image column width on wide screens (>1200px)', 'umodel' ),
		'value'   => '6',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'umodel' ),
			'6'  => esc_html__( '1/2', 'umodel' ),
			'4'  => esc_html__( '1/3', 'umodel' ),
			'3'  => esc_html__( '1/4', 'umodel' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Image width on middle screens', 'umodel' ),
		'desc'    => esc_html__( 'Select image column width on middle screens (>992px)', 'umodel' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'umodel' ),
			'6'  => esc_html__( '1/2', 'umodel' ),
			'4'  => esc_html__( '1/3', 'umodel' ),
			'3'  => esc_html__( '1/4', 'umodel' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Image width on small screens', 'umodel' ),
		'desc'    => esc_html__( 'Select image column width on small screens (>768px)', 'umodel' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'umodel' ),
			'6'  => esc_html__( '1/2', 'umodel' ),
			'4'  => esc_html__( '1/3', 'umodel' ),
			'3'  => esc_html__( '1/4', 'umodel' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Image width on extra small screens', 'umodel' ),
		'desc'    => esc_html__( 'Select image column width on extra small screens (<767px)', 'umodel' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'umodel' ),
			'6'  => esc_html__( '1/2', 'umodel' ),
			'4'  => esc_html__( '1/3', 'umodel' ),
			'3'  => esc_html__( '1/4', 'umodel' ),
		)
	),
	'icons'         => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Additional info', 'umodel' ),
		'desc'            => esc_html__( 'Add icons with title and text', 'umodel' ),
		'box-options'     => $icon->get_options(),
		'add-button-text' => esc_html__( 'Add New', 'umodel' ),
		'template'        => '{{=title}}',
		'sortable'        => true,
	),
	$icons_social->get_options(),

);