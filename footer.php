<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
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
$mail		= get_option( '_mail', 'contact@gerardo-gonzalez.dev');
$messenger	= get_option( '_messenger', 'https://m.me/GerardoGonzalezDev' )
?>

<footer class="wrapper" id="wrapper-footer">

    <div
        class="<?php echo esc_attr( $container ); ?> bg-primary py-32 d-flex flex-wrap justify-content-center align-items-center">

            <div class="row mw-1200 w-100 text-light p-16 justify-content-center">
                <div class="col-md-4 col-sm-6 order-md-1 order-2 mt-md-0 mt-16 text-center">
                    <p>
                        <span class="rounded-circle border border-3 border-light p-8 m-8">
                            <i class="fa-solid fa-phone fs-20 text-light"></i>
                        </span>
                    </p>
                    <p>
                        <span class="text-light fs-20">
                            < </span>
                                <a href="tel:+52<?php _e($phone, 'understrap'); ?>"
                                    class="text-light fs-20 text-decoration-none">
                                    <?php _e($phone, 'understrap'); ?>
                                </a>
                                <span class="text-light fs-20"> /> </span>
                    </p>
                </div>
                <div class="col-md-4 col-sm-12 order-md-2 order-1 mt-md-0 mt-16 text-center">
                    <p>
                        <span class="rounded-circle border border-3 border-light p-8">
                            <i class="fa-solid fa-envelope fs-20 text-light"></i>
                        </span>
                    </p>
                    <p>
                        <span class="text-light fs-20">
                            < </span>
                                <a href="mailto:<?php _e($mail, 'understrap'); ?>"
                                    class="text-light fs-20 text-decoration-none">
                                    <?php _e($mail, 'understrap'); ?>
                                </a>
                                <span class="text-light fs-20"> /> </span>
                    </p>

                </div>
                <div class="col-md-4 col-sm-6 order-3 mt-md-0 mt-16 text-center">
                    <p>
                        <span class="rounded-circle border border-3 border-light p-8">
                            <i class="fa-brands fa-facebook-messenger fs-20 text-light"></i>
                        </span>
                    </p>
                    <p>
                        <span class="text-light fs-20">
                            < </span>
                                <a href="<?php _e($messenger, 'understrap'); ?>"
                                    class="text-light fs-20 text-decoration-none">
                                    <?php _e(str_replace('https://m.me/','@',$messenger), 'understrap'); ?>
                                </a>
                                <span class="text-light fs-20"> /> </span>
                    </p>
                </div>
            </div>
            <div class="row mw-1200 w-100">
                <hr class="border boder-light opacity-100">
            </div>
            <div class="row text-light mw-1200 w-100">
                <div class="col-md-4 col-sm-6">
                    <h3 class="fs-34">
                        <span class="text-light">.</span> <span
                            class="text-light text-lowercase">About</span>
                    </h3>
                    <?php
							wp_nav_menu(
								array(
									'theme_location'  => 'about',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'list-group list-group-flush',
									'fallback_cb'     => '',
									'menu_id'         => 'about-menu',
									'depth'           => 1,
                                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							);
							?>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h3 class="fs-34">
                        <span class="text-light">.</span> <span
                            class="text-light text-lowercase">Resources</span>
                    </h3>
                    <?php
							wp_nav_menu(
								array(
									'theme_location'  => 'resources',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'list-group list-group-flush',
									'fallback_cb'     => '',
									'menu_id'         => 'resources-menu',
									'depth'           => 1,
                                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							);
							?>
                </div>
                <div class="col-md-4 col-sm-6">
                    <?php if ( is_active_sidebar( 'footerfull' ) ) : ?>
                        <?php dynamic_sidebar( 'footerfull' ); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row text-light mw-1200 w-100 justify-content-center py-31 my-64">
                <?php get_social_icons(); ?>
            </div>
        </div>


    </div><!-- container end -->

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>