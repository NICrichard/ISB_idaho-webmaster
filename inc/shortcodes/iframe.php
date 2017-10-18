<?php
/**
 * Shortcode for displaying iFrame.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Idaho_Webmaster
 */

add_shortcode( 'iframe', 'idaho_iframe_func' );

/**
 * Function for rendering youtube video.
 *
 * @param string $atts Shortcode arguments.
 * @param string $content Shortcode content.
 */
function idaho_iframe_func( $atts, $content = '' ) {

	/** Returnable html string. */
	$iframe = (string) '';

	/** Convert $atts to $params. Merge with defaults. */
	$params = (array) shortcode_atts( array(
		'src' 		=> ''
	), $atts );


	$iframe .= sprintf('<iframe class="iframe-auto-height" data-src="%1$s" allowfullscreen width="100%%" style="width:100%%" scrolling="no" frameborder="no"></iframe>',
		esc_attr( $params['src'] )
	);

	/** Strip out new lines to avoid auto <p>s. */
	return $iframe;
};
