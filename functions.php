<?php
/**
 * Include CSS files
 */
function theme_enqueue_scripts() {
	wp_enqueue_style( 'Font_Awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/dist/css/bootstrap.min.css' );	
    wp_enqueue_style( 'Style', get_template_directory_uri() . '/style.css' );
	
	// jQuery
    wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/dist/js/jquery-3.3.1.min.js', array(), '3.3.1', true );
	// wp_enqueue_script('jquery', false, array(), false, false);
	
    wp_enqueue_script( 'Tether', get_template_directory_uri() . '/dist/js/popper.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array(), '1.0.0', true );
	
	// Angularjs
	wp_register_script( 'angularjs', get_stylesheet_directory_uri() . '/dist/js/angular.min.js' );
	wp_register_script( 'angularjs-route', get_stylesheet_directory_uri() . '/dist/js/angular-route.js' );
	wp_register_script( 'angularjs-sanitize', get_stylesheet_directory_uri() . '/dist/js/angular-sanitize.js' );
	wp_enqueue_script( 'my-scripts', get_stylesheet_directory_uri() . '/app.js', array( 'angularjs', 'angularjs-route', 'angularjs-sanitize' ) );
	
	// Custome Script
	wp_enqueue_script( 'apply-form', get_template_directory_uri().'/apply_form.js', array(), '1.0.0', true);
	
	// API endpoint
	wp_localize_script( 'my-scripts', 'AppAPI', array( 'url' => get_bloginfo('wpurl').'/') );
	// wp_localize_script( 'my-scripts', 'myLocalized', array( 'views' => trailingslashit( get_template_directory_uri() ) . 'views/' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

// REMOVE WP EMOJI
/* remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); */

// include_once ('custom_functions.php');
include_once ('old/old_functions.php');
include_once ('old/old_functions_tambahan.php');

include_once ('custom_api_functions.php');
include_once ('custom_page_functions.php');
?>