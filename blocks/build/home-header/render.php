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

$title = explode(" ", $title);
?>
<style>
    [data-block="home-header"] {
    background-image: url(<?php echo $media_bg['url'];?>);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 1920px auto;
    background-color: rgba(0, 0, 0);
    min-height: 1024px;
    }
</style>
<section
    <?php echo get_block_wrapper_attributes(['class' => 'container-fluid px-0 overflow-hidden vh-100 position-relative']); ?>
    data-block="home-header">

    <div class="row card-img-overlay bg-dark bg-opacity-50 d-flex align-items-center justify-content-center p-0 m-0 top-50 start-50 translate-middle w-100 h-100">
        <div class="row align-items-center h-100 px-0">
            <div class="col-md-4 mx-auto ps-md-48 text-center">
    
                <h1 class="display-1 text-light">
                    <span class="fw-bold"><?php _e(array_slice($title, 0, intdiv(sizeof($title),2))[0], 'understrap'); ?></span> <span class="text-light"><?php _e(array_slice($title, intdiv(sizeof($title),2))[0], 'understrap'); ?></span></h1>
                <a href="#" class="btn btn-primary fs-32 w-xxl-40 my-16"><?php _e($text_btn, 'understrap'); ?></a>
                <div class="text-white fs-24 rounded border-radius-10 p-16 my-16 bg-white bg-opacity-25 backdrop-filter-blur-10">
                    <?php _e($content, 'understrap'); ?>
                </div>
            </div>
            <!-- in mobile remove the clippath -->
            <div class="col-md-8 h-100 clipped-md-parallelogram my-md-0 my-16"
                style="min-height: 350px; background-image: url(<?php echo wp_get_attachment_image_url( $media['id'], 'full', false );  ?>); background-position: top center; background-size: cover;">
    
            </div>
        </div>
    </div>


</section>