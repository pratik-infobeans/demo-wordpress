<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wordpress_Contributors_Plugin
 * @subpackage Wordpress_Contributors_Plugin/admin
 */

/**
 * Class to define admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wordpress_Contributors_Plugin
 * @subpackage Wordpress_Contributors_Plugin/admin
 * @author     Pratik Raghuvanshi <pratik.raghuvanshi@infobeans.com>
 */
class Wordpress_Contributors_Plugin_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * Hook to add css style.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wordpress-contributors-plugin-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * Hook to add css style.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wordpress-contributors-plugin-admin.js', array( 'jquery' ), $this->version, false );
	}
		/**
		 * Function to add meta box to edit post page.
		 */
	public function add_contributors_meta_boxes() {
		add_meta_box( 'contributors-meta-box', 'Contributors', [ $this, 'admin_contributors_form' ], 'post', 'normal', 'high' );
	}
		/**
		 * Function to display meta box content form.
		 *
		 * @global object $post <post data>
		 */
	public function admin_contributors_form() {
		global $post;
				$authors     = [];
				$pc_checkbox = [];
		$values              = get_post_custom( $post->ID );
		$pc_checkbox         = isset( $values['post_contributors_checkbox'] ) ? esc_attr( $values['post_contributors_checkbox'] ) : [];
		$args                = [
			'orderby' => 'login',
			'order'   => 'ASC',
			'fields'  => [ 'ID', 'display_name' ],
			'who'     => 'authors',
		];
		$authors             = get_users( $args );
		include_once plugin_dir_path( __FILE__ ) . 'partials/wordpress-contributors-admin-metabox.php';
	}
		/**
		 * Function to save the post meta data.
		 *
		 * @param int $post_id <ID of post>.
		 * @return null
		 */
	public function save_contributors_meta_box_data( $post_id ) {
		$post_data = filter_input_array( INPUT_POST );
		// Bail if we're doing an auto save.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// if our nonce isn't there, or we can't verify it, bail.
		if ( ! isset( $post_data['wc_meta_box_nonce'] ) || ! wp_verify_nonce( $post_data['wc_meta_box_nonce'], 'post_contributors_nonce' ) ) {
			return;
		}

		// if our current user can't edit this post, bail.
		if ( ! current_user_can( 'edit_post' ) ) {
			return;
		}

		if ( ! empty( $post_data['contributors_checkbox'] ) ) {
			update_post_meta( $post_id, 'post_contributors_checkbox', $post_data['contributors_checkbox'] );
		}
	}

}
