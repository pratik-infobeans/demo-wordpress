<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Simple_Alert_Plugin
 * @subpackage Simple_Alert_Plugin/admin/partials
 */

?>

<div class="wrap simple-alert-config-container">
<h1>Simple Alert Settings</h1>

<form method="post" action="options.php" id="simple-alert-setting-form">
	<?php settings_fields( 'simple-post-alert-group' ); ?>
	<?php do_settings_sections( 'simple-post-alert-group' ); ?>
	<table class="form-table">
		<tr valign="top">
		<th scope="row">Alert Box Text</th>
		<td><input type="text" name="simple_alert_text" value="<?php echo esc_attr( get_option( 'simple_alert_text' ) ); ?>" /></td>
		</tr>
		<tr valign="top">
		<th scope="row">Post Type</th>
		<td>
			<div class="sa-post-type-container">
				<?php
				foreach ( $public_post_types as $post_type_str ) {
					?>
				<div class="simple-alert-cb-container accordion">
					<input type="checkbox" <?php echo ! empty( $sa_post_ids[ $post_type_str ] ) ? 'checked="checked"' : ''; ?> class="simple-alert-checkboxes " name="" data-post-type="<?php echo esc_attr( $post_type_str ); ?>" value="1"/>
					<label for="simple-alert-checkboxes"><?php echo esc_attr( $post_type_str ); ?></label>
				</div>
				<div class="panel <?php echo ! empty( $sa_post_ids[ $post_type_str ] ) ? esc_attr( 'active' ) : ''; ?>" id="panel-<?php echo esc_attr( $post_type_str ); ?>" >
					<?php
					$args        = array(
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'DESC',
						'post_type'      => $post_type_str,
						'post_status'    => 'publish',
					);
					$posts_array = get_posts( $args );
					if ( ! empty( $posts_array ) ) {
					?>
					<select name="simple_alert_post_ids[<?php echo esc_attr( $post_type_str ); ?>][]" class="form-control" multiple='true' >
						<option value="">Select Post</option>
						<?php foreach ( $posts_array as $post_data ) { ?>
							<option <?php echo in_array( (string) $post_data->ID, $sa_post_ids[ $post_type_str ], true ) ? 'selected="selected"' : ''; ?> value="<?php echo esc_attr( $post_data->ID ); ?>"><?php echo esc_attr( $post_data->post_title ); ?></option>
						<?php } ?>
					</select>
					<?php } else { ?>
						<span>No post available.</span>
					<?php } ?>
				</div>
				<?php } ?>
			</div>     
		</td>
		</tr>
	</table>    
	<?php submit_button(); ?>

</form>
</div>
<script>

</script>
