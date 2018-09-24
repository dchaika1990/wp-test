<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

$wpTheme = wp_get_theme();
define('UMODEL_THEME_VERSION', $wpTheme->get( 'Version' ));

//Since WP v4.7 using new functions
//https://developer.wordpress.org/themes/basics/linking-theme-files-directories/#linking-to-theme-directories
define( 'UMODEL_THEME_URI', get_parent_theme_file_uri() );
define( 'UMODEL_THEME_PATH', get_parent_theme_file_path() );

// You may request this demo id from this theme author to get a colorized demo content.
// See the Theme support service contacts information.
define( 'UMODEL_REMOTE_DEMO_ID', '20703480');
define( 'UMODEL_REMOTE_DEMO_VERSION', $wpTheme->get( 'Version' ));

/**
 * Theme Includes
 *
 * https://github.com/ThemeFuse/Theme-Includes
 */
require_once UMODEL_THEME_PATH . '/inc/init.php';

/**
 * TGM Plugin Activation
 */
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
	/**
	 * Include the TGM_Plugin_Activation class.
	 */
	require_once UMODEL_THEME_PATH . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
}

add_action( 'tgmpa_register', 'umodel_action_register_required_plugins' );


if ( ! function_exists( 'umodel_action_register_required_plugins' ) ):
	/** @internal */
	function umodel_action_register_required_plugins() {
		$plugins = array (
			array (
				'name'             => 'Unyson',
				'slug'             => 'unyson',
				'required'         => true,
			),
			array (
				'name'             => 'MailChimp',
				'slug'             => 'mailchimp-for-wp',
				'required'         => true,
			),
			array (
				'name'             => 'MWTemplates Theme Addons',
				'slug'             => 'mwt-addons',
				'source'           => UMODEL_THEME_PATH . '/inc/plugins/mwt-addons.zip',
				'required'         => true,
			),
			array (
				'name'             => 'MWTemplates Developer',
				'slug'             => 'mwt-developer',
				'source'           => UMODEL_THEME_PATH . '/inc/plugins/mwt-developer.zip',
				'required'         => false,
			),
			array (
				'name'             => 'MWTemplates Theme Widgets',
				'slug'             => 'mwt-widgets',
				'source'           => UMODEL_THEME_PATH . '/inc/plugins/mwt-widgets.zip',
				'required'         => true,
				'version'          => '1.0',
			),
			array (
				'name'             => 'Slider Revolution',
				'slug'             => 'rev-slider',
				'source'           => UMODEL_THEME_PATH . '/inc/plugins/revslider.zip',
				'required'         => false,
			),
			array (
				'name'      => 'MWT Unyson Extension',
				'slug'      => 'mwt-unyson-extensions',
				'source'    => UMODEL_THEME_PATH . '/inc/plugins/mwt-unyson-extensions.zip',
				'required'  => false,
			),
			array(
				'name'     				=> 'Sass Compiler',
				'slug'     				=> 'wp-scss',
				'required'              => true,
			),
			array (
				'name'      => 'Envato Market',
				'slug'      => 'envato-market',
				'source'    => esc_url('https://envato.github.io/wp-envato-market/dist/envato-market.zip'),
				'required'  => true,
			),
			array(
				'name'     				=> 'Instagram Feed',
				'slug'     				=> 'instagram-feed',
				'required'              => false,
			),
			array(
				'name'     				=> 'User custom avatar',
				'slug'     				=> 'wp-user-avatar',
				'required'              => false,
			),
			array(
				'name'     				=> 'AccessPress Social Counter',
				'slug'     				=> 'accesspress-social-counter',
				'required'              => true
			),
			array(
				'name'     				=> 'Snazzy Maps',
				'slug'     				=> 'snazzy-maps',
				'required'              => true,
			),
			array(
				'name'     				=> 'Widget CSS Classes',
				'slug'     				=> 'widget-css-classes',
				'required'              => false,
			),
		);
		$config = array(
			'domain'       => 'umodel',
			'dismissable'  => false,
			'is_automatic' => false
		);
		tgmpa( $plugins, $config );
	}
endif;