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

<section
    <?php echo get_block_wrapper_attributes(['class' => 'container-fluid d-flex flex-column justify-content-center align-items-center px-0 py-64 mx-auto bg-danger bg-gradient position-relative']); ?>
    data-block="about-block">
    <?php
		AboutBlock::theBlockContent($block->parsed_block['innerBlocks'][0]);
	?>
    <div class="shape bg-secondary bg-gradient">
    </div>
    <div class="shape-small bg-success bg-gradient">
    </div>    
    <div class="shape-medium bg-primary bg-gradient">
    </div>
</section>