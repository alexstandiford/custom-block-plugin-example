<?php
/*
Plugin Name: Custom Blocks
Description: Plugin Description Replace Me
Version: 1.0.0
Author: An awesome developer
Text Domain: custom_blocks
Domain Path: /languages
Requires at least: 5.1
Requires PHP: 7.0
Author URI: https://www.designframesolutions.com
*/

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fetches the instance of the plugin.
 * This function makes it possible to access everything else in this plugin.
 * It will automatically initiate the plugin, if necessary.
 * It also handles autoloading for any class in the plugin.
 *
 * @since 1.0.0
 *
 * @return \Underpin\Factories\Underpin_Instance The bootstrap for this plugin.
 */
function custom_blocks() {
	return Underpin::make_class( [
		'root_namespace'      => 'Custom_Blocks',
		'text_domain'         => 'custom_blocks',
		'minimum_php_version' => '7.0',
		'minimum_wp_version'  => '5.1',
		'version'             => '1.0.0',
	] )->get( __FILE__ );
}

// Lock and load.
custom_blocks();

// Registers block
custom_blocks()->blocks()->add( 'my_custom_block', 'Custom_Blocks\Blocks\Hello_World' );

custom_blocks()->scripts()->add( 'custom_blocks', [
	'handle'      => 'custom-blocks',                                          // Script Handle used in wp_*_script
	'src'         => custom_blocks()->js_url() . 'custom-blocks.js',           // Src used in wp_register_script
	'name'        => 'Custom Blocks Script',                                   // Names your script. Used for debugging.
	'description' => 'Script that loads in the custom blocks',                 // Describes your script. Used for debugging.
	'deps'        => custom_blocks()->dir() . 'build/custom-blocks.asset.php', // Load these scripts first.
	'middlewares' => [
		'Underpin_Scripts\Factories\Enqueue_Admin_Script',                       // Enqueues the script in the admin area
	],
] );

custom_blocks()->styles()->add( 'custom_block_styles', [
	'handle'      => 'custom-blocks',                                        // handle used in wp_register_style
	'src'         => custom_blocks()->css_url() . 'custom-block-styles.css', // src used in wp_register_style
	'name'        => 'Custom Blocks Style',                                  // Names your style. Used for debugging
	'description' => 'Styles for custom Gutenberg blocks',                   // Describes your style. Used for debugging
] );

