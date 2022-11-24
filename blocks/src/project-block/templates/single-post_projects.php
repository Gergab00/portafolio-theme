<?php
/**
 * 
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package portafolio-theme
 * 
 * @version 0.9.0
 * @since 0.9.0
 * @author Gerardo Gonzalez
 * 
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header( );

$container = get_option('_container');

?>

<main class="<?php echo esc_attr($container); ?> bg-dark px-0 pb-32" id="single-projects">
<?php   
if (have_posts()):
    while (have_posts()):
        the_post();
        $headerImage = get_post_meta( get_the_ID(), '_header_imageheader_image', true );
        $btnTextRepositorie = get_post_meta( get_the_ID(), '_butttons_repositorie', true );
        $btnURLRepositorie = get_post_meta( get_the_ID(), '_butttons_url_repositorie', true );
        $btnTextDemo = get_post_meta( get_the_ID(), '_butttons_demo', true );
        $btnURLDemo = get_post_meta( get_the_ID(), '_butttons_url_demo', true );
?>
    <style>
        .bg-image {
            background-image: url(<?php echo wp_get_attachment_url( $headerImage )?>);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 1920px auto;
            background-color: rgba(0, 0, 0);
            max-height: 650px;
            height: 650px;
        }
    </style>
    <header class="bg-image container-fluid position-relative p-0">
        <div class="row card-img-overlay bg-dark bg-opacity-50 overflow-hidden">
        </div>
    </header>
    <article class="container-fluid mw-1200 bg-light w-100 mt-n160 py-32 px-16 rounded border-radius-10 position-relative">
        <div class="row justify-content-center">
            <?php the_post_thumbnail( 'large', array( 'class' => 'mw-640 mt-n100 mb-16 p-0 shadow-regular rounded border-radius-10') ); ?>
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<div class="breadcrumb d-flex justify-content-center text-primary">','</div>' );
                }
            ?>
            <?php the_title( '<h1 class="text-uppercase text-center text-dark my-16">', '</h1>' ); ?>
            <div class="col-12 d-flex justify-content-center my-16">
                <a class="btn btn-primary mx-16" href="<?php echo $btnURLRepositorie ?>" role="button" target="_blank"><?php echo $btnTextRepositorie; ?></a>
                <a class="btn btn-secondary mx-16" href="<?php echo $btnURLDemo; ?>" role="button" target="_blank"><?php echo $btnTextDemo; ?></a>
            </div>
            <section class="col-12 p-32 mw-640 text-dark">
                <?php the_content(); ?>
            </section>
        </div>
    </article>
    <?php
        
    endwhile;
else:
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;
    ?>
</main>

<?php
get_footer();