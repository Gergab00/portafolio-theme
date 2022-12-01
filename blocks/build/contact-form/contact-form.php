<?php
/**
 * 
 * 
 * @author Gerardo Gonzalez
 * @version 1.0.0
 * @since 1.0.0
 * @package portafolio-theme
 * 
 */

 /**
  * copy this line into block.php -> require __DIR__.'/build/contact-form/contact-form.php';
  */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class ContactForm {

    /**
	 * Constructor
	 */
	public function init() {
		add_action( 'init', array( get_called_class(), 'registrer' ) );
	}

    public function registrer()
    {
        register_block_type(
            get_theme_file_path('blocks/build/contact-form'),
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
                'render_callback' => array( get_called_class(), 'renderBlock' ),
            ));
    }

    public static function renderBlock($attributes, $content, $block) 
    {
        ob_start();
        require_once get_theme_file_path('blocks/build/contact-form/render.php');
        return ob_get_clean();
    }

}

ContactForm::init();