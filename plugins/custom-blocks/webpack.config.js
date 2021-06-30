/**
 * WordPress Dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );

/**
 * External Dependencies
 */
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	...{
		entry: {
			"custom-blocks": path.resolve( process.cwd(), 'src', 'custom-blocks.js' ), // Create "custom-blocks.js" file in "build" directory
			"custom-block-styles": path.resolve( process.cwd(), 'src', 'custom-block-styles.css' )
		}
	}
}