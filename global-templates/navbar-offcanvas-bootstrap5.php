<?php
/**
 * Header Navbar (bootstrap5)
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

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar bg-dark-shade-blue-magenta">

    <h2 id="main-nav-label" class="screen-reader-text">
        <?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
    </h2>


    <div class="<?php echo esc_attr( $container ); ?> justify-content-center">

        <div class="row w-100 mw-1200">
            <div class="col-6">
                <!-- Your site title as branding in the menu -->
                <?php if ( ! has_custom_logo() ) { ?>

                <?php if ( is_front_page() && is_home() ) : ?>

                <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                <?php else : ?>

                <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                    itemprop="url"><?php bloginfo( 'name' ); ?></a>

                <?php endif; ?>

                <?php
			} else {
				the_custom_logo();
			}
			?>
                <!-- end custom logo -->
            </div>
            <div class="col-3">
                Phone Here
            </div>
            <div class="col-3">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false"
                    aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
                    <i class="fa-solid fa-bars text-very-light-shade-magenta"></i>
                </button>

                <div class="offcanvas offcanvas-end bg-transparent backdrop-filter-5" tabindex="-1" id="navbarNavOffcanvas">


                    <div class="row vh-100">
                        <div class="col-8 bg-dark-shade-blue-magenta opacity-75 d-flex justify-content-center align-items-center">
                            <!-- Your site title as branding in the menu -->
                            <?php if ( ! has_custom_logo() ) { ?>

                            <?php if ( is_front_page() && is_home() ) : ?>

                            <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                    itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                            <?php else : ?>

                            <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
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
                        <div class="col-4 bg-white">
                            <div class="offcanvas-header justify-content-end">
                                <button type="button" class="btn-close bg-transparent mt-100 mx-auto" data-bs-dismiss="offcanvas" aria-label="Close">
									<i class="fa-solid fa-xmark fs-34"></i>
								</button>
                            </div><!-- .offcanvas-header -->
                            <!-- The WordPress Menu goes here -->
                            <?php
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container_class' => 'offcanvas-body',
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