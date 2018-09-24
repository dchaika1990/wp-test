<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

wp_enqueue_script(
	'fw-shortcode-theme-author-bio-nousewheel',
	UMODEL_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/author-bio/static/jquery.mousewheel.min.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);

wp_enqueue_script(
	'fw-shortcode-theme-author-bio',
	UMODEL_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/author-bio/static/scripts.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);