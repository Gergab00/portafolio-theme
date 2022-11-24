<?php
/**
 * 
 * @author Gerardo Gonzalez
 * @version 0.9.0
 * @since 0.9.0
 * @package portafolio-theme
 * 
 *  
 * Retrieving the values:
 * $btnTextRepositorie = get_post_meta( get_the_ID(), '_butttons_repositorie', true )
 * $btnURLRepositorie = get_post_meta( get_the_ID(), '_butttons_url_repositorie', true )
 * $btnTextDemo = get_post_meta( get_the_ID(), '_butttons_demo', true )
 * $btnURLDemo = get_post_meta( get_the_ID(), '_butttons_url_demo', true )
 */
class ButtonsProperties {
	private $config = '{"title":"Buttons Properties","description":"Add the text and url for the buttons","prefix":"_butttons","domain":"understrap","class_name":"ButtonsProperties","post-type":[],"context":"side","priority":"default","cpt":"post_projects","fields":[{"type":"text","label":"Repositorie","default":"Github Repositorie","id":"_butttons_repositorie"},{"type":"url","label":"URL of the repositorie","default":"https:\/\/github.com\/Gergab00\/understrap-framework-theme","id":"_butttons_url_repositorie"},{"type":"text","label":"Demo","default":"Demo","id":"_butttons_demo"},{"type":"url","label":"URL of the Demo","default":"#","id":"_butttons_url_demo"}]}';

	public function __construct() {
		$this->config = json_decode( $this->config, true );
		$this->process_cpts();
		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		add_action( 'admin_head', [ $this, 'admin_head' ] );
		add_action( 'save_post', [ $this, 'save_post' ] );
	}

	public function process_cpts() {
		if ( !empty( $this->config['cpt'] ) ) {
			if ( empty( $this->config['post-type'] ) ) {
				$this->config['post-type'] = [];
			}
			$parts = explode( ',', $this->config['cpt'] );
			$parts = array_map( 'trim', $parts );
			$this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
		}
	}

	public function add_meta_boxes() {
		foreach ( $this->config['post-type'] as $screen ) {
			add_meta_box(
				sanitize_title( $this->config['title'] ),
				$this->config['title'],
				[ $this, 'add_meta_box_callback' ],
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function admin_head() {
		global $typenow;
		if ( in_array( $typenow, $this->config['post-type'] ) ) {
			?><?php
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				case 'url':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = esc_url_raw( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
					break;
				default:
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
			}
		}
	}

	public function add_meta_box_callback() {
		echo '<div class="rwp-description">' . $this->config['description'] . '</div>';
		$this->fields_div();
	}

	private function fields_div() {
		foreach ( $this->config['fields'] as $field ) {
			?><div class="components-base-control">
				<div class="components-base-control__field"><?php
					$this->label( $field );
					$this->field( $field );
				?></div>
			</div><?php
		}
	}

	private function label( $field ) {
		switch ( $field['type'] ) {
			default:
				printf(
					'<label class="components-base-control__label" for="%s">%s</label>',
					$field['id'], $field['label']
				);
		}
	}

	private function field( $field ) {
		switch ( $field['type'] ) {
			default:
				$this->input( $field );
		}
	}

	private function input( $field ) {
		printf(
			'<input class="components-text-control__input %s" id="%s" name="%s" %s type="%s" value="%s">',
			isset( $field['class'] ) ? $field['class'] : '',
			$field['id'], $field['id'],
			isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function value( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
		} else if ( isset( $field['default'] ) ) {
			$value = $field['default'];
		} else {
			return '';
		}
		return str_replace( '\u0027', "'", $value );
	}

}
new ButtonsProperties;