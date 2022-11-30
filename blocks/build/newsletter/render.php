<?php
/**
 * 
 * 
 * @author Gerardo Gonzalez
 * @version 1.0.0
 * @since 1.0.0
 * @package portafolio-theme
 * 
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

extract( $attributes );

?>

<form <?php echo get_block_wrapper_attributes(['class' => 'row needs-validation']); ?> id="newsletter" action="" novalidate data-block="newsletter">
	<h3 class="fs-34 py-8">
		<span class="text-light">.</span> <span
			class="text-light text-lowercase">suscribe</span>
	</h3>
	<label for="email" class="form-label fs-20 text-light py-8">
		I want to know the last news for Wordpress World
	</label>
	<div class="input-group py-8">
		<input type="hidden" name="action" value="newsletter">
		<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
		<input type="text" class="form-control" id="email" name="email" placeholder="Write your email"
			aria-label="Recipient's username" aria-describedby="button-addon2">
		<button class="btn btn-outline-light" type="submit" id="button-addon2"><i class="fa-solid fa-chevron-right"></i></button>
	</div>
	<div class="frm-message alert d-none" role="alert">
  		A simple dark alert—check it out!
	</div>
</form>