<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.09.13
 * @since 2022.09.13
 * @see https://developer.wordpress.org/reference/functions/get_post_galleries/
 * 
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action( 'after_setup_theme', 'remove_parent_filters' );

/**
 * Remove parent filters
 *
 * @return void
 */
function remove_parent_filters(){
    remove_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
    remove_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );
}

add_filter('the_content', 'filter_the_content');

/**
 * Undocumented function
 *
 * @param [type] $content
 * @return void
 * @see https://developer.wordpress.org/reference/hooks/the_content/
 */
function filter_the_content( $content )
{
    //Add your code here to modify the content output.


    return $content;
}

add_filter('wp_trim_excerpt', 'filter_the_excerpt');

/**
 * Undocumented function
 *
 * @param [type] $post_exceprt
 * @return void
 * @see https://developer.wordpress.org/reference/functions/wp_trim_excerpt/
 * @see https://developer.wordpress.org/reference/functions/wp_trim_excerpt/#hooks
 * 
 */
function filter_the_excerpt( $post_exceprt ) 
{
    // Add your code here to modify the excerpt output.

    return $post_exceprt;
}

add_filter('excerpt_more', 'filter_excerpt_more');

/**
 * Undocumented function
 *
 * @param [type] $more
 * @return void
 * @see https://developer.wordpress.org/reference/hooks/excerpt_more/
 * 
 */
function filter_excerpt_more ( $more ) 
{
    // Add your code here to modify the more link output.
    
    return $more;
}

add_filter('excerpt_length', 'filter_excerpt_length');
/**
 * Undocumented function
 *
 * @param [type] $length
 * @return void
 * @see https://developer.wordpress.org/reference/hooks/excerpt_length/
 */
function filter_excerpt_length( $length )
{
    // Add your code here to modify the length of the excerpt

    return $length;
}