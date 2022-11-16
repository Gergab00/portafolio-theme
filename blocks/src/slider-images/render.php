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

?>

<section <?php echo get_block_wrapper_attributes(['class' => 'my-class']); ?> data-block="slider-images">
    <div class="slider-images-carousel">
        <div class="carousel-cell">...</div>
        <div class="carousel-cell">...</div>
        <div class="carousel-cell">...</div>
    </div>
</section>