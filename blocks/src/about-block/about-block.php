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
  * copy this line into block.php -> require __DIR__.'/build/about-block/about-block.php';
  */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class AboutBlock {

    /**
	 * Constructor
	 */
	public static function init() {
		add_action( 'init', array( get_called_class(), 'registrer' ) );
	}

    public static function registrer()
    {
        register_block_type(
            get_theme_file_path('blocks/build/about-block'),
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

    public static function renderBlock($attributes, $content, $block) {
        ob_start();
        require_once get_theme_file_path('blocks/build/about-block/render.php');
        return ob_get_clean();
    }

    public static function getBlockContent($blockArray){
        $columns = array('core/columns', 'core/column');
        $contentHTML = array('core/heading', 'core/paragraph', 'core/list');
        $arrayRet = array();
        $innerHTML = '';
        foreach ($blockArray as $block) {
            if(is_array($block)) {
                $dev = AboutBlock::getBlockContent($block);
                (is_array($dev)) ? $arrayRet = array_merge($arrayRet, $dev) : $innerHTML .= $dev;
            } else {
                if(in_array($block, $columns)) array_push($arrayRet, $blockArray['attrs']['className']);
        
                if(in_array($block, $contentHTML)) return $blockArray['innerHTML'];
            }
        }
        if('' != $innerHTML) array_push($arrayRet, $innerHTML);
        return $arrayRet;
    }

    public static function theBlockContent($blockArray){
        echo vsprintf(
            '<div class="%1$s"><div class="%2$s">%3$s</div><div class="%4$s">%5$s</div></div>', 
            AboutBlock::getBlockContent($blockArray)
        );
    }

}

AboutBlock::init();