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

<div <?php echo get_block_wrapper_attributes(['class' => 'carousel-cell d-flex flex-column justify-content-around align-items-center text-black']); ?> data-block="carousel-cell">
        <?php
				foreach ($block->parsed_block['innerBlocks'] as $block) {
					echo $block['innerHTML'];
				}
			?>
</div>