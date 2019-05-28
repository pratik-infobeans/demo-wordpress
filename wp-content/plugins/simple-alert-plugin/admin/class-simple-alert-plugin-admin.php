<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Simple_Alert_Plugin
 * @subpackage Simple_Alert_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Simple_Alert_Plugin
 * @subpackage Simple_Alert_Plugin/admin
 * @author     Pratik Raghuvanshi <pratik.raghuvanshi@infobeans.com>
 */
class Simple_Alert_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}
		/**
		 * Function to add option page menu in Admin area.
		 */
	public function add_plugin_page() {
		add_options_page(
			'Settings Admin',
			__( 'Simple Alert Settings', 'simple-alert-plugin' ),
			'manage_options',
			'alert-setting-admin',
			array( $this, 'create_alert_setting_page' )
		);
	}
		/**
		 * Register new settings
		 */
	public function register_alert_settings() {
		// register our settings.
		register_setting( 'simple-post-alert-group', 'simple_alert_text' );
		register_setting( 'simple-post-alert-group', 'simple_alert_post_ids' );
	}
	/**
	 * Setting page template.
	 *
	 * @since    1.0.0
	 */
	public function create_alert_setting_page() {
		$sa_post_ids       = [];
		$public_post_types = [];
		$public_post_types = get_post_types( [ 'public' => true ] );
		$sa_post_ids       = get_option( 'simple_alert_post_ids', [] );
		include plugin_dir_path( __FILE__ ) . 'partials/simple-alert-plugin-admin-display.php';
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/simple-alert-plugin-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/simple-alert-plugin-admin.js', array( 'jquery' ), $this->version, false );
	}

}
