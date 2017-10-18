<?php
/**
 * Template part for displaying logo header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Idaho_Webmaster
 */

?>

<div class="brand-logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php echo esc_url( get_theme_mod( 'idaho_logo', get_stylesheet_directory_uri() . '/img/logo.svg' ) ); ?>"
					 alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
					 srcset="<?php echo esc_attr( idaho_webmaster_logo_srcset() ); ?>" />
		</a>
</div>
