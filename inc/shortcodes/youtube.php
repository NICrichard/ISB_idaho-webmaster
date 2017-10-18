<?php
/**
 * Shortcode for displaying YouTube videos.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Idaho_Webmaster
 */

add_shortcode( 'youtube', 'idaho_youtube_func' );

/**
 * Function for rendering youtube video.
 *
 * @param string $atts Shortcode arguments.
 * @param string $content Shortcode content.
 */
function idaho_youtube_func( $atts, $content = '' ) {

	/** Returnable html string. */
	$video = (string) '';

	/** Convert $atts to $params. Merge with defaults. */
	$params = (array) shortcode_atts( array(
		'url' 		=> 'https://www.youtube.com/watch?v=DPBU2SOSC5c',
		'aspect' 	=> '16by9',
	), $atts );

	preg_match( "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $params['url'], $matches );

	$video .= sprintf('<div class="embed-responsive embed-responsive-%1$s"><iframe class="embed-responsive-item" src="%2$s" allowfullscreen></iframe></div>',
		esc_attr( $params['aspect'] ),
		esc_url( 'https://www.youtube.com/embed/' . $matches[0] )
	);

	/** Strip out new lines to avoid auto <p>s. */
	return $video;
};
