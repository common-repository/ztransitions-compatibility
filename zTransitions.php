<?php
/**
 * Plugin Name:       zTransitions Compatibility Plugin
 * Plugin URI:        https://www.ztransitions.com
 * Description:       Easily create free stunning next generation video/image Carousel Galleries at zTransitions.com and use this free zTransitions compatibility plugin for Wordpress to easily display your zTransitions creation on your Wordpress site
 * Version:           1.0.0
 * Author:            Navisen
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ABS
 *
 * @link              https://www.ztransitions.com
 * @package           ABS
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'ABS_VERSION' ) ) {
	define( 'ABS_VERSION', '2.0.0' );
}
if ( ! defined( 'ABS_NAME' ) ) {
	define( 'ABS_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}
if ( ! defined( 'ABS_DIR' ) ) {
	define( 'ABS_DIR', WP_PLUGIN_DIR . '/' . ABS_NAME );
}
if ( ! defined( 'ABS_URL' ) ) {
	define( 'ABS_URL', WP_PLUGIN_URL . '/' . ABS_NAME );
}
/**
 * zTransitions code
 *
 * @since 1.0.0
 */
//if ( file_exists( ABS_DIR . '/shortcode/shortcode-zTransitions.php' ) ) {
//	require_once( ABS_DIR . '/shortcode/shortcode-zTransitions.php' );
//}

/**
 * zTransitions shortcode
 *
 * Write [zTransitions] in your post editor to render this shortcode.
 *
 * @package	 ABS
 * @since    1.0.0
 */
if ( ! function_exists( 'ztransitions_shortcode' ) ) {
	// Add the action.
	add_action( 'plugins_loaded', function() {
		// Add the shortcode.
		add_shortcode( 'zTransitions', 'ztransitions_shortcode' );
	});
	/**
	 * Shortcode Function
	 *
	 * @param  Attributes $atts code TEXT
	 * @return string
	 * @since  1.0.0
	 */
	function ztransitions_shortcode( $atts ) {
		// Save $atts.
		$_atts = shortcode_atts( array(

			'div' => 'PLACEHOLDER', //user specified div ID reference

			'library' => 'PLACEHOLDER', //user specified JS library URL reference

			'code'  => 'PLACEHOLDER' // user specified

		), $atts );
		// Code.
        $_div = $_atts['div'];

				$_library = $_atts['library'];

				$_code = $_atts['code'];

       // Return it, Safe in PHP 7.0.
		$_return = '<div id="' . $_div . '"></div><script src="' . $_library . '"></script><script>zTransitions("' . $_code . '");</script>';
		// Return the data.
		return $_return;
	}
} // End if()
