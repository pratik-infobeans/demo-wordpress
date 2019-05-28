<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Simple_Alert_Plugin
 * @subpackage Simple_Alert_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Simple_Alert_Plugin
 * @subpackage Simple_Alert_Plugin/public
 * @author     Pratik Raghuvanshi <pratik.raghuvanshi@infobeans.com>
 */
class Simple_Alert_Plugin_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/simple-alert-plugin-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/simple-alert-plugin-public.js', array( 'jquery' ), $this->version, false );
	}
		/**
		 * Function to check if post is selected for alert.
		 *
		 * @global objecy $post <post object>
		 */
	public function check_simple_alert() {
		if ( is_single() || is_page() ) {
			global $post;
			$post_type          = get_post_type();
			$post_id            = $post->ID;
			$checked_post_types = get_option( 'simple_alert_post_ids', [] );
			if ( ! empty( $checked_post_types[ $post_type ] ) && in_array( (string) $post_id, $checked_post_types[ $post_type ], true ) ) {
				add_action(
					'wp_print_footer_scripts',
					array( $this, 'add_script_to_footer' )
				);
			}
		}
	}
		/**
		 * Function to add script to footer.
		 */
	public function add_script_to_footer() {
		$simple_alert_text = get_option( 'simple_alert_text' );
		echo '<script  type="text/javascript"> alert(" ' . $simple_alert_text . '" );</script>'; // @codingStandardsIgnoreLine
	}

}
