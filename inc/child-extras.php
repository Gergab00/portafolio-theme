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

add_filter( 'get_the_archive_title', 'filter_archive_title' );

function filter_archive_title() {
	$title  = __( 'Archives' );
	$prefix = '';

	if ( is_category() ) {
		$title  = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title  = single_tag_title( '', false );
		$prefix = _x( 'Tag:', 'tag archive title prefix' );
	} elseif ( is_author() ) {
		$title  = get_the_author();
		$prefix = _x( 'Author:', 'author archive title prefix' );
	} elseif ( is_year() ) {
		$title  = get_the_date( _x( 'Y', 'yearly archives date format' ) );
		$prefix = _x( 'Year:', 'date archive title prefix' );
	} elseif ( is_month() ) {
		$title  = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
		$prefix = _x( 'Month:', 'date archive title prefix' );
	} elseif ( is_day() ) {
		$title  = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
		$prefix = _x( 'Day:', 'date archive title prefix' );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title' );
		}
	} elseif ( is_post_type_archive() ) {
		$title  = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$queried_object = get_queried_object();
		if ( $queried_object ) {
			$tax    = get_taxonomy( $queried_object->taxonomy );
			$title  = single_term_title( '', false );
			$prefix = sprintf(
				/* translators: %s: Taxonomy singular name. */
				_x( '%s:', 'taxonomy term archive title prefix' ),
				$tax->labels->singular_name
			);
		}
	}

	$original_title = $title;

	/**
	 * Filters the archive title prefix.
	 *
	 * @since 5.5.0
	 *
	 * @param string $prefix Archive title prefix.
	 */
	$prefix = apply_filters( 'get_the_archive_title_prefix', $prefix );
	if ( $prefix ) {
		$title = sprintf(
			/* translators: 1: Title prefix. 2: Title. */
			_x( '%1$s %2$s', 'archive title' ),
			$prefix,
			'<span>' . $title . '</span>'
		);
	} else {
        return $title;
    }

	/**
	 * Filters the archive title.
	 *
	 * @since 4.1.0
	 * @since 5.5.0 Added the `$prefix` and `$original_title` parameters.
	 *
	 * @param string $title          Archive title to be displayed.
	 * @param string $original_title Archive title without prefix.
	 * @param string $prefix         Archive title prefix.
	 */
	return apply_filters( 'get_the_archive_title', $title, $original_title, '' );
}
