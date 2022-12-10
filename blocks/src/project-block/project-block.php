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
  * copy this line into block.php -> require __DIR__.'/build/project-block/project-block.php';
  */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class ProjectsBlock {
    
    /**
	 * Constructor
	 */
    public function __construct() {
        require __DIR__.'/buttonsproperties.php';
        require __DIR__.'/headerimage.php';
    }
    
	public static function init() {
        add_action( 'init', array( get_called_class(), 'registrer' ) );
        add_action( 'init', array( get_called_class(), 'projectsPosts' ), 0 );
        add_action( 'init', array( get_called_class(), 'projectsTaxonomy' ), 0 );
        add_action( 'init', array( get_called_class(), 'technology_tags'), 0 );
        add_filter( 'single_template', array( get_called_class(), 'get_custom_post_type_template' ) );
        add_filter( 'archive_template', array( get_called_class(), 'get_custom_post_type_template' ) );
        add_filter( 'excerpt_more', array( get_called_class(), 'projects_excerpt_more' ));
	}

    
    public static function registrer()
    {
        register_block_type(
            get_theme_file_path('blocks/build/project-block'),
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
        require get_theme_file_path('blocks/build/project-block/render.php');
        return ob_get_clean();
    }
    
    // Register Custom Post Type
    public static function projectsPosts() {
        
        $labels = array(
            'name'                  => _x( 'Projects', 'Post Type General Name', 'understrap' ),
            'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'understrap' ),
            'menu_name'             => __( 'Projects', 'understrap' ),
            'name_admin_bar'        => __( 'Project', 'understrap' ),
                'archives'              => __( 'Projects Archives', 'understrap' ),
                'attributes'            => __( 'Project Attributes', 'understrap' ),
                'parent_item_colon'     => __( 'Parent Item:', 'understrap' ),
                'all_items'             => __( 'All Projects', 'understrap' ),
                'add_new_item'          => __( 'Add New Project', 'understrap' ),
                'add_new'               => __( 'Add New', 'understrap' ),
                'new_item'              => __( 'New Project', 'understrap' ),
                'edit_item'             => __( 'Edit Project', 'understrap' ),
                'update_item'           => __( 'Update Project', 'understrap' ),
                'view_item'             => __( 'View Project', 'understrap' ),
                'view_items'            => __( 'View Projects', 'understrap' ),
                'search_items'          => __( 'Search Project', 'understrap' ),
                'not_found'             => __( 'Not found', 'understrap' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'understrap' ),
                'insert_into_item'      => __( 'Insert into project', 'understrap' ),
                'uploaded_to_this_item' => __( 'Uploaded to this project', 'understrap' ),
                'items_list'            => __( 'Projects list', 'understrap' ),
                'items_list_navigation' => __( 'Projects list navigation', 'understrap' ),
                'filter_items_list'     => __( 'Filter Projects list', 'understrap' ),
            );
            $args = array(
                'label'                 => __( 'Project', 'understrap' ),
                'description'           => __( 'Post for create your developer projects', 'understrap' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies'            => array( 'category_projects', 'technology' ),
                'hierarchical'          => true,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-embed-generic',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'rewrite'               => array('slug'=>'projects'),
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'show_in_rest'          => true,
            );
            register_post_type( 'post_projects', $args );
        
        }
        
            // Register Custom Taxonomy
            public static function projectsTaxonomy() {
            
                $labels = array(
                    'name'                       => _x( 'Categories', 'Taxonomy General Name', 'understrap' ),
                    'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'understrap' ),
                    'menu_name'                  => __( 'Category', 'understrap' ),
                    'all_items'                  => __( 'All Categories', 'understrap' ),
                    'parent_item'                => __( 'Parent Category', 'understrap' ),
                    'parent_item_colon'          => __( 'Parent Category:', 'understrap' ),
                    'new_item_name'              => __( 'New Category Name', 'understrap' ),
                    'add_new_item'               => __( 'Add Category Item', 'understrap' ),
                    'edit_item'                  => __( 'Edit Category', 'understrap' ),
                    'update_item'                => __( 'Update Category', 'understrap' ),
                    'view_item'                  => __( 'View Category', 'understrap' ),
                    'separate_items_with_commas' => __( 'Separate Categories with commas', 'understrap' ),
                    'add_or_remove_items'        => __( 'Add or remove Categories', 'understrap' ),
                    'choose_from_most_used'      => __( 'Choose from the most used', 'understrap' ),
                    'popular_items'              => __( 'Popular Categories', 'understrap' ),
                    'search_items'               => __( 'Search Categories', 'understrap' ),
                    'not_found'                  => __( 'Not Found', 'understrap' ),
                    'no_terms'                   => __( 'No Categories', 'understrap' ),
                    'items_list'                 => __( 'Categories list', 'understrap' ),
                    'items_list_navigation'      => __( 'Categories list navigation', 'understrap' ),
                );
                $args = array(
                    'labels'                     => $labels,
                    'hierarchical'               => true,
                    'public'                     => true,
                    'show_ui'                    => true,
                    'show_admin_column'          => true,
                    'show_in_nav_menus'          => true,
                    'show_tagcloud'              => true,
                    'show_in_rest'               => true,
                );
                register_taxonomy( 'category_projects', array( 'post_projects' ), $args );
            
            }

            // Register Custom Taxonomy
        public static function technology_tags() 
        {

            $labels = array(
                'name'                       => _x( 'Technologies', 'Taxonomy General Name', 'understrap' ),
                'singular_name'              => _x( 'Technology', 'Taxonomy Singular Name', 'understrap' ),
                'menu_name'                  => __( 'Technology', 'understrap' ),
                'all_items'                  => __( 'All Technologies', 'understrap' ),
                'parent_item'                => __( 'Parent Technology', 'understrap' ),
                'parent_item_colon'          => __( 'Parent Technology:', 'understrap' ),
                'new_item_name'              => __( 'New Technology Name', 'understrap' ),
                'add_new_item'               => __( 'Add New Technology', 'understrap' ),
                'edit_item'                  => __( 'Edit Technology', 'understrap' ),
                'update_item'                => __( 'Update Technology', 'understrap' ),
                'view_item'                  => __( 'View Technology', 'understrap' ),
                'separate_items_with_commas' => __( 'Separate Technologies with commas', 'understrap' ),
                'add_or_remove_items'        => __( 'Add or remove Technologies', 'understrap' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'understrap' ),
                'popular_items'              => __( 'Popular Technologies', 'understrap' ),
                'search_items'               => __( 'Search Technologies', 'understrap' ),
                'not_found'                  => __( 'Not Found', 'understrap' ),
                'no_terms'                   => __( 'No Technologies', 'understrap' ),
                'items_list'                 => __( 'Technologies list', 'understrap' ),
                'items_list_navigation'      => __( 'Technologieslist navigation', 'understrap' ),
            );
            
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => false,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'show_in_rest'               => true,
            );
            register_taxonomy( 'technology', array( 'post_projects' ), $args );

        }
            
            public static function get_custom_post_type_template( $template ) {
                global $post;
            
                if ( 'post_projects' === $post->post_type ) {
                    if( is_single() ) $template = __DIR__.'/templates/single-post_projects.php';
                    if( is_archive() ) $template = __DIR__.'/templates/archive-post_projects.php';
                }
            
                return $template;
            }

            public static function the_category_projects()
            {   
                $terms = get_the_terms( get_the_ID(), 'category_projects' );
                $outHTML = '';
                if($terms):
                    foreach ( $terms as $tax ) {
                        $outHTML .= '<span class="me-16 fs-12 ">' . __( $tax->name ) . '</span>';
                    }
                endif;
                echo $outHTML;
            }

            public static function projects_excerpt_more( $more ) 
            {
                return sprintf( '...</p><p class="read-more"> <a href="%1$s" class="btn btn-primary">%2$s</a>',
                      esc_url( get_permalink( get_the_ID() ) ),
                      sprintf( __( 'Continue reading %s', 'wpdocs' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
                );
            }

}

new ProjectsBlock;
ProjectsBlock::init();