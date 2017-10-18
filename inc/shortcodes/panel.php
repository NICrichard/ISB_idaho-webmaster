<?php
/**
 * Shortcode for displaying panels.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Idaho_Webmaster
 */

add_shortcode( 'panel', 'idaho_panel_func' );

/**
 * Function for rendering panels.
 *
 * @param string $atts Shortcode arguments.
 * @param string $content Shortcode content.
 */
function idaho_panel_func( $atts, $content = '' ) {

	$panel = (string) '';

	$params = (array) shortcode_atts( array(
		'type' 	=> 'default',
		'title' => 'Panel',
	), $atts );

	$panel .= sprintf('<div class="panel %1$s"><div class="panel-heading"><h4 class="panel-title">%2$s</h4></div><div class="panel-body">%3$s</div></div>',
		esc_attr( 'panel-'.$params['type'] ),
		esc_attr( $params['title'] ),
		do_shortcode( remove_empty_p( shortcode_unautop( $content ) ) )
	);

	return $panel;

};
