<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022/08/29
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );
	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

// Themes's includes directory.
$understrapchild_inc_dir = 'inc/';

$understrapchild_includes = array(
	'safe-svg/safe-svg',					// Load save svg files
	//'child-theme-settings',                  // Initialize theme default settings.
	'child-setup',                           // Theme setup and custom theme supports.
	//'child-widgets',                         // Register widget area.
	//'child-enqueue',                         // Enqueue scripts and styles.
	'child-template-tags',                   // Custom template tags for this theme.
	//'child-pagination',                      // Custom pagination for this theme.
	//'child-hooks',                           // Custom hooks.
	'child-extras',                          // Custom functions that act independently of the theme templates.
	'custom-controls',						 // Load custom-controls files
	'child-customizer',                      // Customizer additions
	//'mx-metaboxes/mx-metaboxes',			 // Easy metaboxes create and set up
	//'mx-metaboxes/mx-metaboxes-examples',	 // Erase for remove the examples for the pages
	//'child-custom-comments',                 // Custom Comments file.
	'class-wp-bootstrap-navwalker',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	//'child-editor',                          // Load Editor functions.															
	//'logo-size',
);

// Include files.
foreach ( $understrapchild_includes as $file ) {
	require_once get_theme_file_path( $understrapchild_inc_dir . $file . '.php' );
}

// Blocks files.
require_once get_theme_file_path('blocks/blocks.php');

/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );
