<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

wp_deregister_style( 'fw-font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'umodel-icon-fonts',
	UMODEL_THEME_URI . '/css/fonts.css',
	array(),
	UMODEL_THEME_VERSION
);

if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'umodel-admin_bar',
		UMODEL_THEME_URI . '/css/admin-frontend.css',
		array(),
		UMODEL_THEME_VERSION
	);
	wp_enqueue_style( 'umodel-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'umodel-font',
	umodel_google_font_url(),
	array(),
	UMODEL_THEME_VERSION
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'umodel-keyboard-image-navigation',
		UMODEL_THEME_URI . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		UMODEL_THEME_VERSION
	);
}

//plugins theme script
wp_enqueue_script(
	'umodel-modernizr',
	UMODEL_THEME_URI . '/js/vendor/modernizr-2.6.2.min.js',
	false,
	'2.6.2',
	false
);

//plugins theme script
//replacing one compressed script with uncompressed versions - new theme requirements
wp_enqueue_script( 'bootstrap', UMODEL_THEME_URI . '/js/vendor/bootstrap.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'appear', UMODEL_THEME_URI . '/js/vendor/jquery.appear.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'hoverIntent', UMODEL_THEME_URI . '/js/vendor/jquery.hoverIntent.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'superfish', UMODEL_THEME_URI . '/js/vendor/superfish.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'easing', UMODEL_THEME_URI . '/js/vendor/jquery.easing.1.3.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'totop', UMODEL_THEME_URI . '/js/vendor/jquery.ui.totop.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'localScroll', UMODEL_THEME_URI . '/js/vendor/jquery.localscroll.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'scrollTo', UMODEL_THEME_URI . '/js/vendor/jquery.scrollTo.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'scrollbar', UMODEL_THEME_URI . '/js/vendor/jquery.scrollbar.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'parallax', UMODEL_THEME_URI . '/js/vendor/jquery.parallax-1.1.3.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'easypiechart', UMODEL_THEME_URI . '/js/vendor/jquery.easypiechart.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'bootstrap-progressbar', UMODEL_THEME_URI . '/js/vendor/bootstrap-progressbar.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'countTo', UMODEL_THEME_URI . '/js/vendor/jquery.countTo.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'prettyPhoto', UMODEL_THEME_URI . '/js/vendor/jquery.prettyPhoto.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'countdown', UMODEL_THEME_URI . '/js/vendor/jquery.countdown.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'isotope', UMODEL_THEME_URI . '/js/vendor/isotope.pkgd.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'owl-carousel', UMODEL_THEME_URI . '/js/vendor/owl.carousel.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'flexslider', UMODEL_THEME_URI . '/js/vendor/jquery.flexslider.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'price-slider', UMODEL_THEME_URI . '/js/vendor/price-slider.min.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );
wp_enqueue_script( 'cookie', UMODEL_THEME_URI . '/js/vendor/jquery.cookie.js', array( 'jquery' ), UMODEL_THEME_VERSION, true );

//custom plugins theme script
wp_enqueue_script(
	'umodel-plugins',
	UMODEL_THEME_URI . '/js/plugins.js',
	array( 'jquery' ),
	UMODEL_THEME_VERSION,
	true
);


//main theme script
wp_enqueue_script(
	'umodel-main',
	UMODEL_THEME_URI . '/js/main.js',
	array( 'jquery' ),
	UMODEL_THEME_VERSION,
	true
);

//if AccessPress is active
if ( class_exists( 'SC_Class' ) ) :
	wp_deregister_style( 'fontawesome-css' );
	wp_deregister_style( 'apsc-frontend-css' );
	wp_enqueue_style(
		'umodel-accesspress',
		UMODEL_THEME_URI . '/css/accesspress.css',
		array(),
		UMODEL_THEME_VERSION
	);
endif; //AccessPress

// Add Theme stylesheet.
wp_enqueue_style( 'umodel-css-style', get_stylesheet_uri() );

// Add Bootstrap Style
wp_enqueue_style(
	'umodel-bootstrap',
	UMODEL_THEME_URI . '/css/bootstrap.min.css',
	array(),
	UMODEL_THEME_VERSION
);

// Add Animations Style
wp_enqueue_style(
	'umodel-animations',
	UMODEL_THEME_URI . '/css/animations.css',
	array(),
	UMODEL_THEME_VERSION
);


// Add Theme Style
wp_enqueue_style(
	'umodel-main',
	UMODEL_THEME_URI . '/css/main.css',
	array(),
	UMODEL_THEME_VERSION
);

wp_add_inline_style( 'umodel-main', umodel_add_font_styles_in_head() );