<?php 
/**
 *
 * Child Theme Metaboxes set up.
 *
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.09.08
 * @since 2022.09.08
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// D:\OSPanel\domains\mx-metaboxes.local/wp-content/themes/twentytwentyone/mx-metaboxes
if ( ! defined( 'MX_METABOXEX_PATH_TO_FOLDER' ) ) {

	define( 'MX_METABOXEX_PATH_TO_FOLDER', get_stylesheet_directory() . '/inc/mx-metaboxes' );

}

// http://mx-metaboxes.local/wp-content/themes/twentytwentyone/mx-metaboxes
if ( ! defined( 'MX_METABOXEX_URL_TO_FOLDER' ) ) {

	define( 'MX_METABOXEX_URL_TO_FOLDER', get_stylesheet_directory_uri() . '/inc/mx-metaboxes' );

}

require MX_METABOXEX_PATH_TO_FOLDER . '/inc/metabox.php';

require MX_METABOXEX_PATH_TO_FOLDER . '/inc/metabox-uploader.php';

/**
* multibox
*/
require MX_METABOXEX_PATH_TO_FOLDER . '/inc/multibox.php';