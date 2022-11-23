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
$mail		= get_option( '_mail', 'contacto@gerardogonzalez.dev');
$messenger	= get_option( '_messenger', 'https://m.me/GerardoGonzalezDev' )
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer class="wrapper" id="wrapper-footer">

    <div
        class="<?php echo esc_attr( $container ); ?> bg-info py-32 d-flex flex-wrap justify-content-center align-items-center">

            <div class="row mw-1200 w-100 text-primary p-16 justify-content-center">
                <div class="col-md-4 col-sm-6 order-md-1 order-2 mt-md-0 mt-16 text-center">
                    <p>
                        <span class="rounded-circle border border-3 border-primary p-8 m-8">
                            <i class="fa-solid fa-phone fs-20 text-primary"></i>
                        </span>
                    </p>
                    <p>
                        <span class="text-primary fs-20">
                            < </span>
                                <a href="tel:+52<?php _e($phone, 'understrap'); ?>"
                                    class="text-primary fs-20 text-decoration-none">
                                    <?php _e($phone, 'understrap'); ?>
                                </a>
                                <span class="text-primary fs-20"> /> </span>
                    </p>
                </div>
                <div class="col-md-4 col-sm-12 order-md-2 order-1 mt-md-0 mt-16 text-center">
                    <p>
                        <span class="rounded-circle border border-3 border-primary p-8">
                            <i class="fa-solid fa-envelope fs-20 text-primary"></i>
                        </span>
                    </p>
                    <p>
                        <span class="text-primary fs-20">
                            < </span>
                                <a href="mailto:<?php _e($mail, 'understrap'); ?>"
                                    class="text-primary fs-20 text-decoration-none">
                                    <?php _e($mail, 'understrap'); ?>
                                </a>
                                <span class="text-primary fs-20"> /> </span>
                    </p>

                </div>
                <div class="col-md-4 col-sm-6 order-3 mt-md-0 mt-16 text-center">
                    <p>
                        <span class="rounded-circle border border-3 border-primary p-8">
                            <i class="fa-brands fa-facebook-messenger fs-20 text-primary"></i>
                        </span>
                    </p>
                    <p>
                        <span class="text-primary fs-20">
                            < </span>
                                <a href="<?php _e($messenger, 'understrap'); ?>"
                                    class="text-primary fs-20 text-decoration-none">
                                    <?php _e(str_replace('https://m.me/','@',$messenger), 'understrap'); ?>
                                </a>
                                <span class="text-primary fs-20"> /> </span>
                    </p>
                </div>
            </div>
            <div class="row mw-1200 w-100">
                <hr class="border boder-primary opacity-100">
            </div>
            <div class="row text-primary mw-1200 w-100">
                <div class="col-md-4 col-sm-6">
                    <h3 class="fs-34">
                        <span class="text-primary">.</span> <span
                            class="text-primary text-lowercase">About</span>
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
                        <span class="text-primary">.</span> <span
                            class="text-primary text-lowercase">Resources</span>
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
                    <h3 class="fs-34 py-8">
                        <span class="text-primary">.</span> <span
                            class="text-primary text-lowercase">suscribe</span>
                    </h3>
                    <label for="email" class="form-label fs-20 text-primary py-8">
                        Sign up to me newsletter
                    </label>
                    <div class="input-group py-8">
                        <input type="text" class="form-control" id="email" placeholder="Write your email"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>

                </div>
            </div>
            <div class="row text-primary mw-1200 w-100 justify-content-center py-31 my-64">
                <?php get_social_icons(); ?>
            </div>
        </div>


    </div><!-- container end -->

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>