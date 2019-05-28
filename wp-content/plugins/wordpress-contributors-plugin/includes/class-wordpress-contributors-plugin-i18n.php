<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wordpress_Contributors_Plugin
 * @subpackage Wordpress_Contributors_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wordpress_Contributors_Plugin
 * @subpackage Wordpress_Contributors_Plugin/includes
 * @author     Pratik Raghuvanshi <pratik.raghuvanshi@infobeans.com>
 */
class Wordpress_Contributors_Plugin_I18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wordpress-contributors-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
