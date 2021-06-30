// Imports the function to register a block type.
import { registerBlockType } from '@wordpress/blocks';

// Imports the translation function
import { __ } from '@wordpress/i18n';

// Registers our block type to the Gutenberg editor.
registerBlockType( 'custom-blocks/hello-world', {
	title: __( "Hello World!", 'beer' ),
	description: __( "Display Hello World text on the site", 'beer' ),
	edit(){
		return (
			<h1 className="hello-world">Hello World!</h1>
		)
	},
	save: () => null
} );