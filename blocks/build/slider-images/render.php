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

<div <?php echo get_block_wrapper_attributes(['class' => 'container-fluid d-flex flex-column justify-content-center align-items-center px-0 mx-auto py-sm-48 py-24 shadow-y-inset']); ?> data-block="slider-images">
    <div class="slider-images-carousel row w-100">
        <?php echo $content; ?>
    </div>
</div>