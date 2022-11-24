<?php 
/**
 *
 * Child Theme Metaboxes Examples.
 *
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.08.31
 * @since 2022.07.28
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

Mx_Metaboxes_Uploader_Class::register_scrips();


// add text input
new Mx_Metaboxes_Class(
	[
		'id'			=> 'text-metabox',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'Text field', 'mx-domain' ),
		'default' 		=> 'News & Media'
	]
);

// add email input
new Mx_Metaboxes_Class(
	[
		'id'			=> 'email-metabox',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'E-mail field', 'mx-domain' ),
		'metabox_type'	=> 'input-email'
	]
);

// add url input
new Mx_Metaboxes_Class(
	[
		'id'			=> 'url-metabox',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'URL field', 'mx-domain' ),
		'metabox_type'	=> 'input-url'
	]
);

// description
new Mx_Metaboxes_Class(
	[
		'id'			=> 'desc-metabox',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'Some Description', 'mx-domain' ),
		'metabox_type'	=> 'textarea'
	]
);

// add checkboxes
new Mx_Metaboxes_Class(
	[
		'id'			=> 'checkboxes-metabox',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'Checkbox Buttons', 'mx-domain' ),
		'metabox_type'	=> 'checkbox',
		'options' 		=> [
			[
				'value' => 'Dog',
				'checked' 	=> true
			],
			[
				'value' 	=> 'Cat'
			],
			[
				'value' 	=> 'Fish'
			]		
		]
	]
);

// add radio buttons
new Mx_Metaboxes_Class(
	[
		'id'			=> 'radio-buttons-metabox',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'Radio Buttons', 'mx-domain' ),
		'metabox_type'	=> 'radio',
		'options' 		=> [
			[
				'value' => 'red'
			],
			[
				'value' => 'green'
			],
			[
				'value' 	=> 'Yellow',
				'checked' 	=> true
			]		
		]
	]
);

// image upload
new Mx_Metaboxes_Class(
	[
		'id'			=> 'featured-image-metabox',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'Featured image', 'mx-domain' ),
		'metabox_type'	=> 'image'
	]
);

/* new Mx_Metaboxes_Class(
	[
		'id'			=> 'header_image',
		'post_types' 	=> 'post_projects',
		'name'			=> esc_html( 'Header image', 'understrap' ),
		'metabox_type'	=> 'image',
		'context' 		=> 'side',
	]
); */

// video upload
new Mx_Metaboxes_Class(
	[
		'id'			=> 'featured-video-metabox',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'Video Upload', 'mx-domain' ),
		'metabox_type'	=> 'video',
		'context' 		=> 'side',
		'priority' 		=> 'low'
	]
);

// save HTML
new Mx_Metaboxes_Class(
	[
		'id'			=> 'some-html-to-save',
		'post_types' 	=> 'page',
		'name'			=> esc_html( 'Save HTML', 'mx-domain' ),
		'metabox_type'	=> 'html'
	]
);

// Document upload
new Mx_Metaboxes_Class(
	[
		'id'			=> 'featured-document-metabox',
		'post_types' 	=> 'documents',
		'name'			=> esc_html( 'Document Upload', 'mx-domain' ),
		'metabox_type'	=> 'document'
	]
);

/**
* multibox
*/
$multibox = new Mx_Multibox_Class(
    [
        'id'			=> 'text-metabox-multibox',
        'post_types' 	=> 'post',
        'name'			=> esc_html( 'MultiBox', 'mx-domain' ),
        'blocks' 		=> [

            // block 1
            'block_1' 		=> [
                [ 'section_name' => 'Some section' ],
                [
                    'type' => 'input-text',
                    'label' => esc_html( 'Enter Title', 'mx-domain' ),
                ],
                [
                    'type' => 'textarea',
                    'label' => esc_html( 'Enter the text', 'mx-domain' ),
                ]
            ],

            // block 2
            'block_2' 		=> [
                [ 'section_name' => 'Some section 2' ],
                [
                    'type' => 'input-text',
                    'label' => esc_html( 'Enter Title 2', 'mx-domain' ),
                ]
            ]

        ]
        
    ]
);

$multibox->register_scrips();

$multibox->ajax_multibox();