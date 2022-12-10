<?php
/**
 * Custom template tags for this theme
 *
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.09.08
 * @since 2022.09.08
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function get_social_icons()
{
    $social_links = explode(',',get_option( '_social_links' ));
    $social_icons = array(
        'facebook'=>' fa-facebook-f',
        'twitter'=>'fa-twitter',
        'linkedin'=>'fa-linkedin-in',
        'youtube'=>'fa-youtube',
        'behance'=>'fa-behance',
        'medium'=>'fa-medium',
        'github' => 'fa-github',
        'codepen' => 'fa-codepen',
    );
    $output = '';

    foreach ( $social_links as $link ) {
        foreach ($social_icons as $key => $value) {
            if(str_contains($link, $key)){
                $html = '<div class="col-auto mx-auto">';
                $html .= '<a class="" href="'.$link.'">';
                $html .= '<i class="fa-brands social-link fs-32 text-white '. $value . '"></i>';
                $html .= '</a>';
                $html .= '</div>';

                $output .= $html;
            }
        }
    }

    echo $output;
    
}