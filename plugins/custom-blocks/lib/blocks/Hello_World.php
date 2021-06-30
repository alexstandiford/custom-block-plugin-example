<?php

namespace Custom_Blocks\Blocks;


use Underpin_Blocks\Abstracts\Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Hello_World extends Block {

	use \Underpin\Traits\Templates;

	public $name        = 'My Custom Block';                       // Names your block. Used for debugging.
	public $description = 'A custom block specific to this site.'; // Describes your block. Used for debugging
	public $type        = 'custom-blocks/hello-world';             // See register_block_type

	public function __construct() {
		$this->args = [                         // See register_block_type
			'style'           => 'custom-blocks', // Stylesheet handle to use in the block
			'render_callback' => function () {
				return $this->get_template( 'wrapper' );
			},
		];
		parent::__construct();
	}

	public function get_templates() {
		return [ 'wrapper' => [ 'override_visibility' => 'public' ] ];
	}

	protected function get_template_group() {
		return 'hello-world';
	}

	protected function get_template_root_path() {
		return custom_blocks()->template_dir();
	}

	protected function get_override_dir() {
		return 'custom-blocks/';
	}
}