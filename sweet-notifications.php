<?php
/**
 * DX Sources
 * 
 * @package     Sweet Notifications
 * @author  	DevriX
 * @copyright   2016 DevriX
 * @license     GPL-2.0+
 * 
 * Plugin Name: Sweet Notifications
 * Description: New custom notifications screen
 * Version: 1.0.0
 * Author: DevriX
 * Author URI: http://devrix.com
 * Text Domain: sweet-notifications
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

// The main class for the plugin
require_once plugin_dir_path( __FILE__ ) . 'inc/SN_Admin.class.php';

// Initialize and run the primary DX_Sources class
function run_dx_sources() {

	if ( is_admin() ) {
		// Build the metaboxes for the single post view editor.
		$SN_Admin = new SN_Admin();
	}
}

// This is where the plugin starts working :)
run_dx_sources();
