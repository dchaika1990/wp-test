<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

/* color defaults */
$defaults = umodel_get_theme_colors_defaults();
/* color palette */
$color_palette = umodel_set_color_palette();

if ( ( ! class_exists( 'Wp_Scss' ) ) ) {
	$color_section = array();
} else {
	$color_section = array(
		'colors_panel' => array(
			'title'   => esc_html__( 'Theme Colors', 'umodel' ),
			'options' => array(
				'color_palette_section' => array(
					'title'   => esc_html__( 'Color Palette', 'umodel' ),
					'options' => array(
						/* set color palette */
						'color_1' => array(
							'label' => esc_html__( 'Color Palette', 'umodel' ),
							'desc'  => esc_html__( 'Color 1', 'umodel' ),
							'help'  => esc_html__( 'This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'umodel' ),
							'type'  => 'color-picker',
							'value' => $defaults['color_1'],
						),
						'color_2' => array(
							'label' => false,
							'desc'  => esc_html__( 'Color 2', 'umodel' ),
							'type'  => 'color-picker',
							'value' => $defaults['color_2'],
						),
						'color_3' => array(
							'label' => false,
							'desc'  => esc_html__( 'Color 3', 'umodel' ),
							'type'  => 'color-picker',
							'value' => $defaults['color_3'],
						),
						'color_4' => array(
							'label' => false,
							'desc'  => esc_html__( 'Color 4', 'umodel' ),
							'type'  => 'color-picker',
							'value' => $defaults['color_4'],
						),
						'color_5' => array(
							'label' => false,
							'desc'  => esc_html__( 'Color 5', 'umodel' ),
							'type'  => 'color-picker',
							'value' => $defaults['color_5'],
						),
						'color_6' => array(
							'label' => false,
							'desc'  => esc_html__( 'Color 6', 'umodel' ),
							'type'  => 'color-picker',
							'value' => $defaults['color_6'],
						),
					),
				),
				'body_colors_section'   => array(
					'title'   => esc_html__( 'Body Colors', 'umodel' ),
					'options' => array(
						/* set theme colors */
						'backgroundColor_1'    => array(
							'label'    => esc_html__( 'Background Color 1', 'umodel' ),
							'desc'     => esc_html__( 'Set main background color', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_2'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'backgroundColor_2'    => array(
							'label'    => esc_html__( 'Background Color 2', 'umodel' ),
							'desc'     => esc_html__( 'Set secondary background color', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_5'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'backgroundColor_3'    => array(
							'label'    => esc_html__( 'Background Color 3', 'umodel' ),
							'desc'     => esc_html__( 'Set forms background color', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_4'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'font_color'     => array(
							'label'    => esc_html__( 'Font Color 1', 'umodel' ),
							'desc'     => esc_html__( 'Set font color 1 (titles font color)', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_4'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'font_color_2'     => array(
							'label'    => esc_html__( 'Font Color 2', 'umodel' ),
							'desc'     => esc_html__( 'Set font color 2 (body font color)', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_6'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'font_color_3'     => array(
							'label'    => esc_html__( 'Font Color 3', 'umodel' ),
							'desc'     => esc_html__( 'Set font color 3', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_5'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'font_color_4'     => array(
							'label'    => esc_html__( 'Font Color 4', 'umodel' ),
							'desc'     => esc_html__( 'Set forms font color', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_2'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'link_color'       => array(
							'label'    => esc_html__( 'Link Color', 'umodel' ),
							'desc'     => esc_html__( 'Set links normal color', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_4'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'link_hover_color' => array(
							'label'    => esc_html__( 'Link Hover Color', 'umodel' ),
							'desc'     => esc_html__( 'Set links hover color', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_3'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'border_color_1' => array(
							'label'    => esc_html__( 'Border Color', 'umodel' ),
							'desc'     => esc_html__( 'Set border color', 'umodel' ),
							'type'     => 'rgba-color-picker',
							'value' => $defaults['color_6'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'border_color_2' => array(
							'label'    => esc_html__( 'Border Color 2', 'umodel' ),
							'desc'     => esc_html__( 'Set border color 2', 'umodel' ),
							'type'     => 'rgba-color-picker',
							'value' => 'rgba(255, 255, 255, 0.1)',
							// palette colors array
							'palettes' => $color_palette,
						),
					),
				),
				'accent_colors_section' => array(
					'title'   => esc_html__( 'Accent Colors', 'umodel' ),
					'options' => array(
						'accent_color_1' => array(
							'label'    => esc_html__( 'Accent Color 1', 'umodel' ),
							'desc'     => esc_html__( 'Set accent color 1', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_1'],
							// palette colors array
							'palettes' => $color_palette,
						),
						'accent_color_2' => array(
							'label'    => esc_html__( 'Accent Color 2', 'umodel' ),
							'desc'     => esc_html__( 'Set accent color 2', 'umodel' ),
							'type'     => 'color-picker',
							'value' => $defaults['color_3'],
							// palette colors array
							'palettes' => $color_palette,
						),
					),
				),
			),
		),
	);

}

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$header_social_icons  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$header_social_icons = $shortcodes_extension->get_shortcode( 'icons_social' )->get_options();
}

//header teasers
$header_icon_1  = array();
$header_icon_2  = array();
$header_icon_3  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$header_icon_1 = $shortcodes_extension->get_shortcode( 'icon' )->get_options();
	$header_icon_2 = $shortcodes_extension->get_shortcode( 'icon' )->get_options();
	$header_icon_3 = $shortcodes_extension->get_shortcode( 'icon' )->get_options();
}

//header button
$header_button  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$header_button = $shortcodes_extension->get_shortcode( 'button' )->get_options();
}

//header social icons
$header_social_icons  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$header_social_icons = $shortcodes_extension->get_shortcode( 'icons_social' )->get_options();
}


$options = array(
	'logo_section'    => array(
		'title'   => esc_html__( 'Site Logo', 'umodel' ),
		'options' => array(
			'logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Main logo image that appears in header', 'umodel' ),
				'desc'        => esc_html__( 'Select your logo', 'umodel' ),
				'help'        => esc_html__( 'Choose image to display as a site logo', 'umodel' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif', 'svg' ),
			),
			'logo_text'              => array(
				'type'  => 'text',
				'value' => 'Umodel',
				'attr'  => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
				'label' => esc_html__( 'Logo Text', 'umodel' ),
				'desc'  => esc_html__( 'Text that appears near logo image', 'umodel' ),
				'help'  => esc_html__( 'Type your text to show it in logo', 'umodel' ),
			),
			'logo_subtext'              => array(
				'type'  => 'text',
				'value' => 'WordPress Theme',
				'attr'  => array( 'class' => 'logo_subtext-class', 'data-logo_subtext' => 'logo_subtext' ),
				'label' => esc_html__( 'Logo Tagline', 'umodel' ),
				'desc'  => esc_html__( 'Text that appears near logo text', 'umodel' ),
			),
		),
	),
	// Display theme colors section
	$color_section,
	'blog_posts' => array(
		'title'   => esc_html__( 'Theme Blog', 'umodel' ),
		'options' => array(
			'post_categories'         => array(
				'label'        => esc_html__( 'Post Categories', 'umodel' ),
				'desc'         => esc_html__( 'Show post categories?', 'umodel' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'umodel' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'umodel' )
				),
				'value'        => 'yes',
			),
			'post_author'         => array(
				'label'        => esc_html__( 'Post Author', 'umodel' ),
				'desc'         => esc_html__( 'Show post author?', 'umodel' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'umodel' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'umodel' )
				),
				'value'        => 'yes',
			),
			'post_date'         => array(
				'label'        => esc_html__( 'Post Date', 'umodel' ),
				'desc'         => esc_html__( 'Show post date?', 'umodel' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'umodel' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'umodel' )
				),
				'value'        => 'yes',
			),
			'post_tags'         => array(
				'label'        => esc_html__( 'Post Tags', 'umodel' ),
				'desc'         => esc_html__( 'Show post tags?', 'umodel' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'umodel' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'umodel' )
				),
				'value'        => 'yes',
			),
		)
	),
	'headers'     => array(
		'title'   => esc_html__( 'Theme Header', 'umodel' ),
		'options' => array(

			'header'       => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'header-thumbnail',
					'data-foo' => 'header',
				),
				'label'   => esc_html__( 'Template Header', 'umodel' ),
				'desc'    => esc_html__( 'Select one of predefined theme headers', 'umodel' ),
				'help'    => esc_html__( 'You can select one of predefined theme headers', 'umodel' ),
				'choices' => array(
					'1' => UMODEL_THEME_URI . '/img/theme-options/header1.png',
					'2' => UMODEL_THEME_URI . '/img/theme-options/header2.png',
					'3' => UMODEL_THEME_URI . '/img/theme-options/header3.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'header_button' => array(
				'type'          => 'popup',
				'label'         => esc_html__( 'Header Button', 'umodel' ),
				'popup-title'   => esc_html__( 'Edit Button', 'umodel' ),
				'button'   => esc_html__( 'Edit Button', 'umodel' ),
				'popup-options' => $header_button,
			),
			'header_phone' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Phone number', 'umodel' ),
				'desc'  => esc_html__( 'Number to appear in header', 'umodel' ),
				'help'  => esc_html__( 'Not all headers display this info', 'umodel' ),
			),
			'header_email' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Email', 'umodel' ),
				'desc'  => esc_html__( 'Email to appear in header', 'umodel' ),
				'help'  => esc_html__( 'Not all headers display this info', 'umodel' ),
			),
			'header_address' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Address', 'umodel' ),
				'desc'  => esc_html__( 'Address to appear in header', 'umodel' ),
				'help'  => esc_html__( 'Not all headers display this info', 'umodel' ),
			),
			//'social_icons'
			$header_social_icons,
		),
	),
	'breadcrumbs'          => array(
		'title'   => esc_html__( 'Theme Breadcrumbs', 'umodel' ),
		'options' => array(
			'breadcrumbs_visibility'         => array(
				'label'        => esc_html__( 'Breadcrumbs visibility', 'umodel' ),
				'desc'         => esc_html__( 'Show breadcrumbs?', 'umodel' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => '1',
					'label' => esc_html__( 'Yes', 'umodel' )
				),
				'left-choice'  => array(
					'value' => '0',
					'label' => esc_html__( 'No', 'umodel' )
				),
				'value'        => '0',
			),
			'breadcrumbs_image'            => array(
				'label' => esc_html__( 'Breadcrumbs Image', 'umodel' ),
				'desc'  => esc_html__( 'Upload breadcrumbs background image', 'umodel' ),
				'type'  => 'upload'
			)
		)
	),
	'footer'          => array(
		'title'   => esc_html__( 'Theme Footer', 'umodel' ),
		'options' => array(
			'footer'           => array(
				'label'   => esc_html__( 'Footer Columns', 'umodel' ),
				'desc'    => esc_html__( 'Select the number of footer columns', 'umodel' ),
				'type'    => 'short-select',
				'value'   => '1',
				'choices' => array(
					'1' => esc_html__( '1 column', 'umodel' ),
					'2' => esc_html__( '3 columns', 'umodel' ),
				),
			),
			'footer_image'            => array(
				'label' => esc_html__( 'Footer Image', 'umodel' ),
				'desc'  => esc_html__( 'Upload a footer image', 'umodel' ),
				'help'  => esc_html__( "This default footer image will be used for all theme pages.", "umodel" ),
				'type'  => 'upload'
			),
			'copyrights_text' => array(
				'type'  => 'textarea',
				'value' => '&copy; Copyright 2018 All Rights Reserved',
				'label' => esc_html__( 'Copyrights text', 'umodel' ),
				'desc'  => esc_html__( 'Please type your copyrights text', 'umodel' ),
			),
		),
	),
	'fonts_panel'     => array(
		'title'   => esc_html__( 'Theme Fonts', 'umodel' ),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__( 'Font for body', 'umodel' ),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'umodel' ),
								'desc'         => esc_html__( 'Enable custom body font', 'umodel' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'umodel' ),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__( 'Enabled', 'umodel' ),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Raleway',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 20,
										'line-height'    => 40,
										'letter-spacing' => 0,
										'color'          => '#323232'
									),
									'components' => array(
										'family'         => true,
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'umodel' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'umodel' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'umodel' ),
								),
							),
						),
					),
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__( 'Font for headings', 'umodel' ),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'umodel' ),
								'desc'         => esc_html__( 'Enable custom heading font', 'umodel' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'umodel' ),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__( 'Enabled', 'umodel' ),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 16,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#323232'
									),
									'components' => array(
										'family'         => true,
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'umodel' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'umodel' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'umodel' ),
								),
							),
						),
					),
				),
			),

		),
	),
	'preloader_panel' => array(
		'title' => esc_html__( 'Theme Preloader', 'umodel' ),

		'options' => array(
			'preloader_enabled' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Preloader', 'umodel' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'umodel' ),
				),
			),

			'preloader_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Custom preloader image', 'umodel' ),
				'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'umodel' ),
				'images_only' => true,
			),


		),
	),
	'share_buttons'   => array(
		'title' => esc_html__( 'Theme Share Buttons', 'umodel' ),

		'options' => array(
			'share_facebook'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Facebook Share Button', 'umodel' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'umodel' ),
				),
			),
			'share_twitter'     => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Twitter Share Button', 'umodel' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'umodel' ),
				),
			),
			'share_google_plus' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Google+ Share Button', 'umodel' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'umodel' ),
				),
			),
			'share_pinterest'   => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Pinterest Share Button', 'umodel' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'umodel' ),
				),
			),
			'share_linkedin'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable LinkedIn Share Button', 'umodel' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'umodel' ),
				),
			),
			'share_tumblr'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Tumblr Share Button', 'umodel' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'umodel' ),
				),
			),
			'share_reddit'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Reddit Share Button', 'umodel' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'umodel' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'umodel' ),
				),
			),

		),
	),

);