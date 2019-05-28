<?php
/**
 * Contributor's box content.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wordpress_Contributors_Plugin
 * @subpackage Wordpress_Contributors_Plugin/public/partials
 */

?>
<div class="contributor-container">
	<div class="contributor-box-title"><?php esc_html_e( 'Contributors', 'wordpress-contributors-plugin' ); ?></div>
	<ul class="contributors-list-box">
	<?php foreach ( $authors as $author ) { ?>
		<li>
		<a href="<?php echo esc_url( get_author_posts_url( $author->ID ) ); ?>" class="contributor-link">
			<?php echo get_avatar( $author->ID, 24 ); ?>
			<span><?php echo esc_attr( $author->display_name ); ?></span>
		</a>
		</li>
	<?php } ?>
	</ul>
</div>
