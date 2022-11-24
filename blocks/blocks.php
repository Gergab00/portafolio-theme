<?php
/**
 * Understrap Child Theme registers a block type. The recommended way is to register a block type using the metadata stored in the block.json file.
 *
 * @package UnderstrapChild
 * @author Gerardo Gonzalez
 * @version 2022.10.12
 * @since 2022.09.26
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 *
 */

require __DIR__.'/registrer-block/home-header.php';
require __DIR__.'/build/carousel-cell/carousel-cell.php';
require __DIR__.'/build/slider-images/slider-images.php';
require __DIR__.'/build/about-block/about-block.php';
require __DIR__.'/build/project-block/project-block.php';
require __DIR__.'/build/table-of-content/table-of-content.php';

