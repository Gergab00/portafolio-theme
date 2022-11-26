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
  * copy this line into block.php -> require __DIR__.'/build/table-of-content/table-of-content.php';
  */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class TableOfContent {

    /**
	 * Constructor
	 */
	public static function init() {
		add_action( 'init', array( get_called_class(), 'registrer' ) );
	}

    public static function registrer()
    {
        register_block_type(
            get_theme_file_path('blocks/build/table-of-content'),
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
                    require_once get_theme_file_path('blocks/build/table-of-content/render.php');
                    return ob_get_clean();
                },
            ));
    }

    /**
	 * Load the filters.
	 *
	 * @return void
	 */
	public static function load_filters() 
    {
        global $post;

		if ( is_single( $post->ID )) {
			add_filter( 'the_content', array( get_called_class(), 'add_toc' ) );
		}
	}

    /**
	 * Add the TOC to the top of the page.
	 *
	 * @param string $content Page content.
	 *
	 * @return string
	 */
	public static function add_toc( $content = '' ) {
		$toc   = '';
        $h2s   = self::get_tags( 'h2', $content );
		$h3s   = self::get_tags( 'h3', $content );
		$h4s   = self::get_tags( 'h4', $content );
		$items = $h2s + $h3s + $h4s;

		$content = self::add_ids_and_jumpto_links( 'h2', $content );
		$content = self::add_ids_and_jumpto_links( 'h3', $content );
		$content = self::add_ids_and_jumpto_links( 'h4', $content );

		if ( $items ) {
			$toc .= '<div class="card bg-primary text-light shadow-regular">';
			$toc .= '<h3 class="mx-16" id="content"><i class="fa-solid fa-table-list"></i> Contents</h3>';
            $toc .= '<ul class="list-group list-group-flush">';
			foreach ( $items as $item ) {
				$toc .= '<li class="list-group-item list-group-item-action list-group-item-primary"><a href="#' . sanitize_title_with_dashes( $item[2] ) . '">' . $item[2] . '</a></li>';
			}
			$toc .= '</ul>';
			$toc .= '</div>';
		}

		return $toc . $content;
	}


    /**
	 * Add IDs and anchor links to the headings.
	 *
	 * @param string $tag     Tag to add anchor to.
	 * @param string $content Post content.
	 *
	 * @return string
	 */
	private static function add_ids_and_jumpto_links( $tag, $content ) {
		$items = self::get_tags( $tag, $content );
		$first = true;

		$matches      = array();
		$replacements = array();

		foreach ( $items as $item ) {
			$replacement = '';
			$matches[]   = $item[0];
			$id          = sanitize_title_with_dashes( $item[2] );

			if ( ! $first ) {
				$replacement .= '<p class="toc-jump"><a href="#content">&uarr; Top &uarr;</a></p>';
			} else {
				$first = false;
			}

			$replacement   .= sprintf( '<%1$s id="%2$s"><a href="#%2$s" class="anchor link-dark">%3$s <i class="fa-solid fs-12 fa-link"></i></a></%1$s>', $tag, $id, $item[2] );
			$replacements[] = $replacement;
		}

		$content = str_replace( $matches, $replacements, $content );

		return $content;
	}

    /**
	 * Get the tags from post_content
	 *
	 * @param string $tag     Tag to search for.
	 * @param string $content Post content.
	 *
	 * @return array
	 */
	private static function get_tags( $tag, $content = '' ) {
		if ( empty( $content ) ) {
			$content = get_the_content();
		}
		preg_match_all( "/(<{$tag}>)(.*)(<\/{$tag}>)/", $content, $matches, PREG_SET_ORDER );
		return $matches;
	}

}

TableOfContent::init();