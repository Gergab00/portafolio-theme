<?php
/**
 * Check and setup theme's default settings
 *
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.09.26
 * @since 2022.09.26
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('after_setup_theme', 'setup_image_sizes');
function setup_image_sizes()
{
    add_image_size('logo-size', 162, 36); // 300 pixels wide (and unlimited height)
    add_image_size('third-320-241', 320, 241, array('center', 'top'));
    add_image_size('half-510-384', 520, 384, array('center', 'top'));
    add_image_size('280-230', 280, 230, array('center', 'top'));
}

register_nav_menus(
    array(
        'primary' => __( 'Primary Menu', 'understrap' ),
        'about' => __( 'About Menu', 'understrap' ),
        'resources' => __( 'Resources Menu', 'understrap' ),
    )
);

add_theme_support( 'yoast-seo-breadcrumbs' );