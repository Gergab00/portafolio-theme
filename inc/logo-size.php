<?php
/**
 * This file adds the option to resize the logo in the customizer.
 * 
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.07.28
 * @since 2022.07.28
 * 
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

// Register our size logo controls
add_action( 'customize_register', 'logo_size' );

function logo_size($wp_customize){

    //Ajusta el tamaño height de Logo

    $wp_customize->add_setting( 'logo_size_height_control',
	array(
        'type' => 'option',
        'default' => 180,
		'transport' => 'refresh',
		'sanitize_callback' => 'skyrocket_sanitize_integer'
	)
);
    $wp_customize->add_control( new Skyrocket_Slider_Custom_Control( $wp_customize, 'logo_size_height_control',
	array(
		'label' => esc_html__( 'Logo Size Height' ),
		'section' => 'title_tagline',
		'input_attrs' => array(
			'min' => 25, // Required. Minimum value for the slider
			'max' => 1000, // Required. Maximum value for the slider
			'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
		),
	)
) );

 //Ajusta el tamaño width de Logo

 $wp_customize->add_setting( 'logo_size_width_control',
 array(
     'type' => 'option',
     'default' => 260,
     'transport' => 'refresh',
     'sanitize_callback' => 'skyrocket_sanitize_integer'
 )
);
 $wp_customize->add_control( new Skyrocket_Slider_Custom_Control( $wp_customize, 'logo_size_width_control',
 array(
     'label' => esc_html__( 'Logo Size Width' ),
     'section' => 'title_tagline',
     'input_attrs' => array(
         'min' => 25, // Required. Minimum value for the slider
         'max' => 1000, // Required. Maximum value for the slider
         'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
     ),
 )
) );

}

/**
 *
 * @author Gerardo González <gergab00@hotmail.com>
 * @category Función que modifica el tamaño de la imagen del logo. Function that modifies the size of the logo image
 * @version 2022.08.03
 * @since 2018.03.14
 * @package Genesis Pluings
 */
if (!function_exists('child_theme_custom_logo_setup')) {
    function child_theme_custom_logo_setup($width=260,$height=180)
    {
        $width_mod = get_option( 'logo_size_width_control', $width );
        $height_mod = get_option( 'logo_size_height_control', $height );
        $custom_logo_id = get_theme_mod('custom_logo');
        //console_log($custom_logo_id);
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        //console_log(esc_url($logo[0]));
        if (has_custom_logo()) {
            $html = sprintf(
                '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
                esc_url( home_url( '/' ) ),
                '<img class="pxw-140" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . 
                '" width="'.$width_mod.'px" height="'.$height_mod.'px">'
            );
            echo $html;
        } else {
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        }
        ;
    }
}