<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */


/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

require_once 'cmb-field-gallery/cmb-field-gallery.php';

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function idaho_webmaster_page_metabox() {
	// Start with an underscore to hide fields from custom fields list.
	$prefix = '_idaho_';
	
	$menu_options = array(
		'none' => 'None'
	);
	
	$menus = wp_get_nav_menus();
	foreach($menus as $menu){
		$menu_options[$menu->slug] = $menu->name;
	} 
	
	$idaho_meta_box = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Page Options', 'idaho-webmaster' ),
		'object_types'  => array( 'page' ), // Post type.
	) );

	$idaho_meta_box->add_field( array(
		'name' => __( 'Menu Override', 'idaho-webmaster' ),
		'desc' => __( 'Select a menu you wish to display.', 'idaho-webmaster' ),
		'id'   => $prefix . 'override_nav',
		'type' => 'select',
		'options' => $menu_options
	) );
	
	$idaho_meta_box->add_field( array(
		'name' => __( 'Description', 'idaho-webmaster' ),
		'desc' => __( 'Type a custom description for the page.', 'idaho-webmaster' ),
		'id'   => $prefix . 'description',
		'type' => 'textarea',
	) );

	$idaho_meta_box->add_field( array(
		'name' => __( 'Page Title', 'idaho-webmaster' ),
		'desc' => __( 'Disable the title on page.', 'idaho-webmaster' ),
		'id'   => $prefix . 'page_title',
		'type' => 'checkbox',
	) );

	$idaho_meta_box->add_field( array(
		'name' => __( 'Breadcrumbs', 'idaho-webmaster' ),
		'desc' => __( 'Disable breadcrumbs on page.', 'idaho-webmaster' ),
		'id'   => $prefix . 'breadcrumbs',
		'type' => 'checkbox',
	) );

	$idaho_meta_box->add_field( array(
		'name' => __( 'Carousel', 'idaho-webmaster' ),
		'desc' => __( 'Enable carousel on this page.', 'idaho-webmaster' ),
		'id'   => $prefix . 'enable_carousel',
		'type' => 'checkbox',
	) );

	$idaho_meta_box->add_field( array(
		'name' => 'Carousel Images',
		'desc' => 'Upload and manage carousel images',
		'button' => 'Manage carousel',
		'id'   => $prefix . 'carousel_images',
		'type' => 'pw_gallery',
		'sanitization_cb' => 'pw_gallery_field_sanitise',
	) );

}
add_action( 'cmb2_admin_init', 'idaho_webmaster_page_metabox' );


?>
