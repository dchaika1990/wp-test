<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

wp_enqueue_script(
	'fw-shortcode-theme-portfolio',
	UMODEL_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/portfolio/static/scripts.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);