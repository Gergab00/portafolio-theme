<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

$move = 0;

?>

<main class="<?php echo esc_attr($container); ?> d-flex flex-column align-items-center" id="archive-projects">
<div class="row mw-1200 justify-content-center w-100 py-16">
    <?php the_archive_title('<h1 class="text-center text-black">', '</h1>'); ?>
</div>
<section class="row mw-1200 w-100 pt-16 pb-32">
<?php   
if (have_posts()):
    while (have_posts()):
        the_post();
        $colors = array(
            array('bg-white','text-black','bg-secondary'),
            array('bg-info','text-white','bg-primary'),
            array('bg-dark','text-white','bg-primary'),
        );
        $mod = ($wp_query->current_post + $move) % 3;
        if(($wp_query->current_post % 3) === 2) $move++;
    ?>
    <div class="col-md-4 col-sm-6 py-64">
        <div class="card project shadow-regular <?php echo $colors[$mod][0]; ?>">
            <div class="card image shadow-regular w-75 mx-auto mt-n80">
              <?php the_post_thumbnail( '280-230', array('class' => 'card-img') ); ?>
              <div class="card-img-overlay <?php echo $colors[$mod][2]; ?> opacity-25">
              </div>
            </div>

            <div class="card-body <?php echo $colors[$mod][1]; ?>">
                <?php the_title( '<h2>', '</h2>' ); ?>
                <?php ProjectsBlock::the_category_projects(); ?>
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>    
    <?php
    endwhile;
else:
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;
    ?>
    </section>
</main>
<?php
get_footer();