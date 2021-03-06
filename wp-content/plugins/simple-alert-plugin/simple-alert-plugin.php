<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Simple_Alert_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Alert Plugin
 * Plugin URI:        #
 * Description:       This plugin will add a alert box to the Post/Page or any other custom post type's post page.It will add an option page under setting tab in admin area.
 * Version:           1.0.0
 * Author:            Pratik Raghuvanshi
 * Author URI:        #
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SIMPLE_ALERT_PLUGIN_VERSION', '1.0.0' );

/**
 * The below function will run during plugin activation.
 * if any database level transaction needed during the activation will be written in it.
 * This action is documented in includes/class-simple-alert-plugin-activator.php
 */
function activate_simple_alert_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-alert-plugin-activator.php';
	Simple_Alert_Plugin_Activator::activate();
}

/**
 * The below function will run during plugin deactivation.
 * if any database level transaction needed during the deactivation will be written in it.
 * This action is documented in includes/class-simple-alert-plugin-deactivator.php
 */
function deactivate_simple_alert_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-alert-plugin-deactivator.php';
	Simple_Alert_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_alert_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_simple_alert_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-alert-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_simple_alert_plugin() {

	$plugin = new Simple_Alert_Plugin();
	$plugin->run();

}
run_simple_alert_plugin();
