<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wordpress_Contributors_Plugin
 * @subpackage Wordpress_Contributors_Plugin/public
 */

/**
 * Class to define public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wordpress_Contributors_Plugin
 * @subpackage Wordpress_Contributors_Plugin/public
 * @author     Pratik Raghuvanshi <pratik.raghuvanshi@infobeans.com>
 */
class Wordpress_Contributors_Plugin_Public {

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
			/**
			 * Function to enqueue CSS file.
			 */
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wordpress-contributors-plugin-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		// Enqueue public side script.
	}

	/**
	 * Function to display contributor box to post page.
	 *
	 * @global object $post <Post data>
	 * @param string $content <Post string>.
	 * @return string
	 */
	public function display_contributors_box( $content ) {
		global $post;
		$contributors_list = '';
		if ( is_singular( 'post' ) ) {
			$post_id      = $post->ID;
			$contributors = get_post_meta( $post_id, 'post_contributors_checkbox', true );
			if ( ! empty( $contributors ) ) {
				$contributors_list = $this->get_contributors_list( $contributors );
			}
		}
		return $content . $contributors_list;
	}
		/**
		 * Function to get contributor's box data.
		 *
		 * @param array $contributors <List of selected contributors>.
		 * @return string
		 */
	private function get_contributors_list( $contributors = [] ) {
		$args    = [
			'include' => $contributors,
			'orderby' => 'login',
			'order'   => 'ASC',
			'fields'  => [ 'ID', 'display_name' ],
		];
		$authors = [];
		$authors = get_users( $args );
		ob_start();
		include_once plugin_dir_path( __FILE__ ) . 'partials/wordpress-contributors-post-box.php';
		$return_str = ob_get_clean();
		return $return_str;
	}

}
