<?php
/**
 * Template part for displaying small footer navigation.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idaho_Webmaster
 */

?>

<?php wp_nav_menu( array(
	'menu' => 'footer',
	'theme_location' => 'footer',
	'depth' => 1,
	'container' => 'div',
	'container_class' => 'col-sm-10',
	'container_id' => false,
	'menu_class' => 'footer-menu nav nav-pills',
	'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
	'walker' => new wp_bootstrap_navwalker(),
) ); ?>
