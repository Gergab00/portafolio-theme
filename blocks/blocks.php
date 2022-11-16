<?php
/**
 * Understrap Child Theme registers a block type. The recommended way is to register a block type using the metadata stored in the block.json file.
 *
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.10.12
 * @since 2022.09.26
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 *
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 *
 * To use the callback function please check the link below.
 * To create the Template, put the file in the Tempaltes folder with the registered name of the block.
 *
 * @see https://happyprime.co/2021/09/14/using-block-json-to-register-a-custom-gutenberg-block/
 *
 */
function theme_register_block()
{
        /**
         * Copy the following function by changing someone to the name of the block. 
         * It will seek to implement a recursive function to register the names in an array only
         */
        register_block_type(
            __DIR__ . '/build/some-one',
            array(
                /**
                 * Render callback function.
                 *
                 * @param array    $attributes The block attributes.
                 * @param string   $content    The block content.
                 * @param WP_Block $block      Block instance.
                 *
                 * @return string The rendered output.
                 */
                'render_callback' => function ($attributes, $content, $block) {
                    ob_start();
                    require_once get_theme_file_path('blocks/build/some-one/render.php');
                    return ob_get_clean();
                },
            ));
}
add_action('init', 'theme_register_block');

require __DIR__.'/registrer-block/home-header.php';

