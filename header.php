<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portafolio-theme
 * 
 * @version 0.9.0
 * @since 0.9.0
 * @author Gerardo Gonzalez
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container 	= get_option( '_container' );
$phone		= get_option( '_phone_number' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
    <?php do_action( 'wp_body_open' ); ?>
    <div class="site" id="page">

        <!-- ******************* The Navbar Area ******************* -->
        <header id="wrapper-navbar">
            <nav id="main-nav" class="navbar bg-primary">

                <h2 id="main-nav-label" class="screen-reader-text">
                    <?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
                </h2>


                <div class="<?php echo esc_attr( $container ); ?> justify-content-center">

                    <div class="row w-100 mw-1200 align-items-center">
                        <div class="col-sm-6 text-sm-start text-center text-light">
                            <!-- Your site title as branding in the menu -->
                            <?php if ( ! has_custom_logo() ) { ?>

                            <?php if ( is_front_page() && is_home() ) : ?>

                            <h1 class="navbar-brand mb-0 text-light"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                    itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                            <?php else : ?>

                            <a class="navbar-brand text-light" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                itemprop="url"><?php bloginfo( 'name' ); ?></a>

                            <?php endif; ?>

                            <?php
        } else {
            the_custom_logo();
        }
        ?>
                            <!-- end custom logo -->
                        </div>
                        <div class="col-md-3 col-sm-5 text-center">
                            <span class="text-light fs-20">
                                < </span>
                                    <span class="text-light fs-20">
                                        Call me:
                                    </span>
                                    <a href="tel:+52<?php _e($phone, 'understrap'); ?>"
                                        class="text-light fs-20 text-decoration-none">
                                        <?php _e($phone, 'understrap'); ?>
                                    </a>
                                    <span class="text-light fs-20"> /> </span>
                        </div>
                        <div class="col-md-3 col-sm-1 text-sm-end text-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas"
                                aria-expanded="false"
                                aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
                                <i class="fa-solid fa-bars fs-32 text-light"></i>
                            </button>

                            <div class="offcanvas offcanvas-end bg-primary backdrop-filter-5" tabindex="-1"
                                id="navbarNavOffcanvas">


                                <div class="row vh-100">
                                    <div
                                        class="col-md-8 col-sm-6 bg-primary opacity-75 shadow-right-offcanvas d-flex justify-content-center align-items-center">
                                        <!-- Your site title as branding in the menu -->
                                        <?php if ( ! has_custom_logo() ) { ?>

                                        <?php if ( is_front_page() && is_home() ) : ?>

                                        <h1 class="navbar-brand text-light mb-0"><a rel="home"
                                                href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                                itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                                        <?php else : ?>

                                        <a class="navbar-brand text-light" rel="home"
                                            href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                            itemprop="url"><?php bloginfo( 'name' ); ?></a>

                                        <?php endif; ?>

                                        <?php
                        } else {
                            $logo_id = get_theme_mod( 'custom_logo' );
                            echo wp_get_attachment_image($logo_id, array('600', '300'), "", array( "class" => "img-fluid w-75" ));
                        }
                        ?>
                                        <!-- end custom logo -->
                                    </div>
                                    <div class="col-md-4 col-sm-6 bg-dark shadow-left-offcanvas">
                                        <div class="offcanvas-header justify-content-end">
                                            <button type="button"
                                                class="btn-close bg-transparent mt-md-100 mt-sm-50 mt-25 mx-auto"
                                                data-bs-dismiss="offcanvas" aria-label="Close">
                                                <i class="fa-solid fa-xmark text-light fs-34"></i>
                                            </button>
                                        </div><!-- .offcanvas-header -->
                                        <!-- The WordPress Menu goes here -->
                                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'primary',
                                'container_class' => 'offcanvas-body text-start',
                                'container_id'    => '',
                                'menu_class'      => 'navbar-nav justify-content-end flex-grow-1 pe-3',
                                'fallback_cb'     => '',
                                'menu_id'         => 'main-menu',
                                'depth'           => 2,
                                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                            )
                        );
                        ?>
                                    </div>
                                </div>

                            </div><!-- .offcanvas -->
                        </div>
                    </div>


                </div><!-- .container(-fluid) -->

            </nav><!-- .site-navigation -->
        </header><!-- #wrapper-navbar -->