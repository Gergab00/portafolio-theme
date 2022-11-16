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
/* echo '<div class="text-white">';
print_r( $attributes );
echo $content;
echo '</div>'; */
$title = explode(" ", $title);
?>

<section
    <?php echo get_block_wrapper_attributes(['class' => 'container-fluid d-flex flex-column justify-content-start align-items-center px-0 mx-auto vh-100']); ?>
    data-block="home-header">

	<div class="row align-items-center justify-content-between w-100 h-100 mh-100vh">
        <div class="col-md-4 mx-auto text-center">

            <h1 class="display-1 font-weight-bold text-very-light-shade-magenta">
                <?php _e(array_slice($title, 0, intdiv(sizeof($title),2))[0], 'understrap'); ?> <span class="text-light-shade-cyan"><?php _e(array_slice($title, intdiv(sizeof($title),2))[0], 'understrap'); ?></span></h1>
            <a href="#" class="btn btn-medium-light-shade-red-orange text-very-light-shade-magenta fs-32 w-xxl-40 my-16"><?php _e($text_btn, 'understrap'); ?></a>
			<div class="text-white fs-24">
				<?php _e($content, 'understrap'); ?>
			</div>
        </div>
        <!-- in mobile remove the clippath -->
        <div class="col-md-8 h-100 clipped-md-parallelogram"
            style="min-height: 350px; background-image: url(<?php echo wp_get_attachment_image_url( $media['id'], 'full', false );  ?>); background-position: center; background-size: cover;">

        </div>
    </div>

</section>