<?php
/**
 * 
 * 
 * @author Gerardo Gonzalez
 * @version 0.9.0
 * @since 0.9.0
 * @package portafolio-theme
 * 
 */

 /**
  * copy this line into block.php -> require __DIR__.'/build/carousel-cell/carousel-cell.php';
  */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class CarouselCell {

    /**
	 * Constructor
	 */
	public static function init() {
		add_action( 'init', array( get_called_class(), 'registrer' ) );
	}

    public static function registrer()
    {
        register_block_type(
            get_theme_file_path('blocks/build/carousel-cell'),
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
                    require get_theme_file_path('blocks/build/carousel-cell/render.php');
                    return ob_get_clean();
                },
            ));
    }

}

CarouselCell::init();