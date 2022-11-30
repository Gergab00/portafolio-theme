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
  * copy this line into block.php -> require __DIR__.'/build/newsletter/newsletter.php';
  */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Newsletter {

    /**
     * Constructor
	 */
	public static function init() {
		add_action( 'init', array( get_called_class(), 'registrer' ) );
        add_action( 'init', array( get_called_class(), 'registrerContactsPostType' ), 0 );
        add_action( 'wp_ajax_nopriv_newsletter', array( get_called_class(), 'newsletterRegister') );
        add_action( 'wp_ajax_newsletter', array( get_called_class(), 'newsletterRegister') );
		add_action( 'wp_enqueue_scripts', array( get_called_class(),'enqueueScripts'));
	}
    
    public static function registrer()
    {
        register_block_type(
            get_theme_file_path('blocks/build/newsletter'),
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
                'render_callback' => array( get_called_class(), 'renderBlock' ) ,
            ));
    }

    public static function renderBlock($attributes, $content, $block) 
    {
        ob_start();
        require get_theme_file_path('blocks/build/newsletter/render.php');
        return ob_get_clean();
    }

    // Register Custom Post Type
function registrerContactsPostType() {

	$labels = array(
		'name'                  => _x( 'Contacts', 'Post Type General Name', 'understrap' ),
		'singular_name'         => _x( 'Contact', 'Post Type Singular Name', 'understrap' ),
		'menu_name'             => __( 'Contacts', 'understrap' ),
		'name_admin_bar'        => __( 'Contact', 'understrap' ),
		'archives'              => __( 'Contact Archives', 'understrap' ),
		'attributes'            => __( 'Contacts Attributes', 'understrap' ),
		'parent_item_colon'     => __( 'Parent Contact:', 'understrap' ),
		'all_items'             => __( 'All Contacts', 'understrap' ),
		'add_new_item'          => __( 'Add New Contact', 'understrap' ),
		'add_new'               => __( 'Add New', 'understrap' ),
		'new_item'              => __( 'New Contact', 'understrap' ),
		'edit_item'             => __( 'Edit Contact', 'understrap' ),
		'update_item'           => __( 'Update Contact', 'understrap' ),
		'view_item'             => __( 'View Contact', 'understrap' ),
		'view_items'            => __( 'View Contacts', 'understrap' ),
		'search_items'          => __( 'Search Contact', 'understrap' ),
		'not_found'             => __( 'Not found', 'understrap' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'understrap' ),
		'featured_image'        => __( 'Featured Image', 'understrap' ),
		'set_featured_image'    => __( 'Set featured image', 'understrap' ),
		'remove_featured_image' => __( 'Remove featured image', 'understrap' ),
		'use_featured_image'    => __( 'Use as featured image', 'understrap' ),
		'insert_into_item'      => __( 'Insert into Contact', 'understrap' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Contact', 'understrap' ),
		'items_list'            => __( 'Contacts list', 'understrap' ),
		'items_list_navigation' => __( 'Contacts list navigation', 'understrap' ),
		'filter_items_list'     => __( 'Filter Contacts list', 'understrap' ),
	);
	$args = array(
		'label'                 => __( 'Contact', 'understrap' ),
		'description'           => __( 'The people that register in your newsletter', 'understrap' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'contacts', $args );

}

    public static function newsletterRegister()
    {
        $email = sanitize_email($_POST['email']);

        $post_data = array(
            'post_title'	=> $email,
            'post_type'		=>'contacts',
            'post_status' 	=> 'private',
        );

        $inserPost = wp_insert_post($post_data);
 		$res = !is_wp_error( $inserPost ) ? [ 'status' => 1, 'message' => 'Se envió correctamente el formulario' ]
		:[ 'status' => 0, 'message' => 'Hubo un error en el envío' ];

		wp_send_json($res);
    }

	public static function enqueueScripts(){
		wp_register_script('newsletter_script', get_stylesheet_directory_uri() .'/blocks/js/script.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('newsletter_script');
		wp_localize_script('newsletter_script', 'newsletter_form',
			[ 'ajaxUrl'=>admin_url('admin-ajax.php'),
			'newsLetterNonce' => wp_create_nonce('secret-key-form')
			]);
	}

}

Newsletter::init();