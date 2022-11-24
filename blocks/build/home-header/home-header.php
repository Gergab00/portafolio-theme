<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class HomeHeader {

    /**
	 * Constructor
	 */
	public function init() {
		add_action( 'init', array( get_called_class(), 'registrer' ) );
	}

    public function registrer()
    {
        register_block_type(
            get_theme_file_path('blocks/build/home-header'),
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
                    require_once get_theme_file_path('blocks/build/home-header/render.php');
                    return ob_get_clean();
                },
            ));
    }

}

$HomeHeader = new HomeHeader;
$HomeHeader->init();