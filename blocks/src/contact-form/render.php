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

<section <?php echo get_block_wrapper_attributes(['class' => 'container-fluid d-flex flex-column align-items-center bg-dark bg-cross-dots-info']); ?> data-block="contact-form">

<div class="row mw-1200 w-100 my-64">
	<div class="col-sm-6 d-flex flex-column align-items-center justify-content-center bg-primary bg-pattern-jupiter bg-blend-soft-light rounded-start border-radius-10">
		<?php the_title( '<h1 class="text-black">', '</h1>' ); ?>
	</div>
	<div class="col-sm-6 bg-light rounded-end border-radius-10 p-64">
		<form id="contact_form" action="">
			<div class="form-floating my-16">
				<label for="name" class="form-label">Name:</label>
				<input type="text" class="form-control" name="name" id="name" required>
			</div>
			<div class="form-floating my-16">
				<label for="email" class="form-label">E-mail:</label>
				<input type="email" class="form-control" name="email" id="email" required>
			</div>
			<div class="form-floating my-16">
				<label for="message" class="form-label">Message:</label>
				<textarea name="message" class="form-control" id="message" rows="10" required></textarea>
			</div>	
			<div class="form-check my-16">
				<input class="form-check-input" type="checkbox" id="terms" name="terms" required>
				<label class="form-check-label" id="lbl-terms" for="terms">Accept <a href="<?php echo esc_attr( esc_url( get_privacy_policy_url() ) ); ?>">Terms and Conditions</a></label>
			</div>
	
			<div class="frm-message alert d-none my-16" role="alert">
  				A simple dark alert—check it out!
			</div>

			<input id="submit" class="btn btn-primary btn-lg my-16" type="submit" name="submit" value="Contact Me">
		</form>
	</div>
</div>
	
</section>