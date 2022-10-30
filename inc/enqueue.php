<?php
/**
 * 
 * Child Theme enqueue scripts and styles.
 * 
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.07.28
 * @since 2022.07.28
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



if ( ! function_exists( 'child_theme_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function child_theme_scripts() {

        	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

		//^Add Flickity Touch, responsive, flickable carousels See flickity.metafizzy.co for complete docs and demos.
        //Note move to plugin directory
		wp_enqueue_script('flickity', get_stylesheet_directory_uri() . "/js/flickity.pkgd.min.js", array(), '2.2', true);
		wp_enqueue_script('as-nav-for', get_stylesheet_directory_uri() . "/js/as-nav-for.js", array(), '3.0', true);

} 

    add_action( 'wp_enqueue_scripts', 'child_theme_scripts' );

}// End of if function_exists( 'child_theme_scripts' ).
