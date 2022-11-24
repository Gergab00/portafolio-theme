<?php
/**
 * 
 * 
 * @author Gerardo Gonzalez
 * @version 0.9.0
 * @since 0.9.0
 * @package portafolio-theme
 * 
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

extract( $attributes );

// WP_Query arguments
$args = array(
	'post_type'              => array( 'post_projects' ),
	'posts_per_page'         => '6',
);

// The Query
$query = new WP_Query( $args );

?>

<section <?php echo get_block_wrapper_attributes(['class' => 'container-fluid d-flex flex-column align-items-center']); ?> data-block="project-block">
<div class="row mw-1200 justify-content-center w-100 py-16">
    <h2 class="text-center text-dark"><?php echo $title; ?></h1>
</div>
<div class="row mw-1200 w-100 mt-80 pt-16 pb-32">
<?php   
if ($query->have_posts()):
    while ($query->have_posts()):
        $query->the_post();
        $move = 2;
        $colors = array(
            array('bg-white','text-dark','bg-secondary'),
            array('bg-info','text-light','bg-primary'),
            array('bg-dark','text-light','bg-primary'),
        );
        if($wp_query->current_post == 2) $i++;
        $mod = ($wp_query->current_post + $move) % 3;
    ?>
    <div class="col-md-4 col-sm-6">
        <div class="card project shadow-regular <?php echo $colors[$mod][0]; ?>">
            <div class="card image shadow-regular w-75 mx-auto mt-n80">
              <?php the_post_thumbnail( 'medium', array('class' => 'card-img') ); ?>
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
// Restore original Post Data
wp_reset_postdata();
    ?>
    </div>	
</section>