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
        add_action( 'wp_enqueue_scripts', array( get_called_class(),'enqueueScripts'));
        add_action( 'wp_ajax_nopriv_contact_form', array( get_called_class(), 'contactFormSend') );
        add_action( 'wp_ajax_contact_form', array( get_called_class(), 'contactFormSend') );
        add_action( 'init', array( get_called_class(), 'registerpostmeta') );
        add_action( 'rest_api_init', array( get_called_class(), 'registerRoutes'));
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

    public static function enqueueScripts()
    {
		wp_register_script('contact_form_script', get_stylesheet_directory_uri() .'/blocks/build/contact-form/script.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('contact_form_script');
		wp_localize_script('contact_form_script', 'contact_form',
			[ 'ajaxUrl'=>admin_url('admin-ajax.php'),
			'contact_formNonce' => wp_create_nonce('secret-key-form')
			]);
	}

    public static function registerRoutes() {
        register_rest_route( 'contact_form/v1', '/admin-ajax', array(
          'methods' => 'POST',
          'callback' => array( get_called_class(),'restRouteCallback'),
        ) );
    }

    function restRouteCallback( $data ) {
        $response = admin_url( 'admin-ajax.php' );

        $name = sanitize_file_name( $data['name'] );
        $email = sanitize_email($data['email']);
        $message = sanitize_textarea_field( $data['message'] );

        $to = 'gerardo.gv.dev@gmail.com';
        $subject = 'The subject';
        $body = 'The email body content: ' . $message;
        $headers = array('Content-Type: text/html; charset=UTF-8','From: My Site Name <support@example.com>');

        $sentSuccessfully = wp_mail( $to, $subject, $body, $headers );

        $res = sentSuccessfully ? [ 'status' => 1, 'message' => 'Your message was send...', 'data'=> $data ]
		:[ 'status' => 0, 'message' => 'Opps we make a b0o b0o' ];

        return new WP_REST_Response($res, 200);
    }

    public static function contactFormSend()
    {
        $name = sanitize_file_name( $_POST['name'] );
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field( $_POST['message'] );

        $to = 'emailsendto@example.com';
        $subject = 'The subject';
        $body = 'The email body content: ' . $message;
        $headers = array('Content-Type: text/html; charset=UTF-8','From: My Site Name <support@example.com>');

        wp_mail( $to, $subject, $body, $headers );

        $res = !true ? [ 'status' => 1, 'message' => 'Your message was send...' ]
		:[ 'status' => 0, 'message' => 'Opps we make a boo bo0' ];

		wp_send_json($res);
    }

    // register custom meta tag field
    public static function registerpostmeta() {
        register_post_meta( '', '_emailSendto', array(
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ) );
    }

}

ContactForm::init();