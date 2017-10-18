<?php
/**
 * Import shorcode files from the shortcodes folder.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Idaho_Webmaster
 */

/**
 * Collapse.
 */
require get_template_directory().'/inc/shortcodes/collapse.php';

/**
 * Panel.
 */
require get_template_directory().'/inc/shortcodes/panel.php';

/**
 * Tabs.
 */
require get_template_directory().'/inc/shortcodes/tab.php';

/**
 * YouTube.
 */
require get_template_directory().'/inc/shortcodes/youtube.php';

/**
 * Vimeo.
 */
require get_template_directory().'/inc/shortcodes/vimeo.php';

/**
 * Glyphicons.
 */
require get_template_directory().'/inc/shortcodes/glyphicon.php';

/**
 * Blog Panel.
 */
require get_template_directory().'/inc/shortcodes/blog-panel.php';

/**
 * Recent Posts.
 */
require get_template_directory().'/inc/shortcodes/recent-posts.php';

require get_template_directory().'/inc/shortcodes/iframe.php';


if ( ! function_exists( 'idaho_webmaster_add_shortcode_button' ) ) :
	/**
	 * Function creates the shortcode buttons in tinyMCE.
	 */
	function idaho_webmaster_add_shortcode_button() {
		// Check user permissions.
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		// Check if WYSIWYG is enabled.
		if ( 'true' === get_user_option( 'rich_editing' ) ) {

			add_filter( 'mce_buttons', 'idaho_webmaster_register_mce_shortcode_button' );
			add_filter( 'mce_buttons_2', 'idaho_webmaster_register_mce_glyphicon_button' );
		}
	}
endif;

add_action( 'admin_head', 'idaho_webmaster_add_shortcode_button', 20 );


if ( ! function_exists( 'idaho_webmaster_add_tinymce_shortcode_plugin' ) ) :
	/**
	 * Adds the required JS to tinyMCE load.
	 * @param array $plugin_array The current array of tinyMCE plugins.
	 */
	function idaho_webmaster_add_tinymce_shortcode_plugin( $plugin_array ) {
		$plugin_array['idaho_mce_shortcode_button'] = get_template_directory_uri() . '/js/mce-shortcode-button.js';
		$plugin_array['idaho_glyphicons'] = get_template_directory_uri() . '/js/mce-glyphicons-button.js';
		return $plugin_array;
	}
endif;

add_filter( 'mce_external_plugins', 'idaho_webmaster_add_tinymce_shortcode_plugin' );

/**
 * Creates the shortcode button.
 * @param  array $buttons Current tinyMCE buttons.
 * @return array          Array with new button added.
 */
function idaho_webmaster_register_mce_shortcode_button( $buttons ) {
	array_push( $buttons, 'idaho_mce_shortcode_button' );
	return $buttons;
}

/**
 * Creates the glyphicons button.
 * @param  array $buttons Current tinyMCE buttons.
 * @return array          Array with new button added.
 */
function idaho_webmaster_register_mce_glyphicon_button( $buttons ) {
	array_push( $buttons, 'idaho_glyphicons' );
	return $buttons;
}


/**
 * Adds glyphicons and other styles to the admin.
 * @return void
 */
function idaho_webmaster_admin_css() {
	wp_register_style( 'idaho_webmaster_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.2' );
	wp_enqueue_style( 'idaho_webmaster_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'idaho_webmaster_admin_css' );

?>
