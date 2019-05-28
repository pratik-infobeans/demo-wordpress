<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wordpress_Contributors_Plugin
 * @subpackage Wordpress_Contributors_Plugin/admin/partials
 */

?>

<p>
<?php
wp_nonce_field( 'post_contributors_nonce', 'wc_meta_box_nonce' );
foreach ( $authors as $author ) {
?>
<div class="contributors-checkbox-container">
	<input type="checkbox" id="contributor-checkbox" name="contributors_checkbox[]" value="<?php echo esc_attr( $author->ID ); ?>" <?php echo in_array( (string) $author->ID, $pc_checkbox, true ) ? 'checked="checked"' : ''; ?> />
	<label for="contributors_checkbox"><?php echo esc_attr( $author->display_name ); ?></label>
</div>
<?php } ?>
</p>
