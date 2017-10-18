<?php
/**
 * Shortcode for displaying tabs.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Idaho_Webmaster
 */

add_shortcode( 'tab', 'idaho_tab_func' );

/**
 * Function for rendering tab pane.
 *
 * @param string $atts Shortcode arguments.
 * @param string $content Shortcode content.
 */
function idaho_tab_func( $atts, $content = '' ) {

	/** Returnable html string. */
	$tab = (string) '';

	/** Convert $atts to $params. Merge with defaults. */
	$params = (array) shortcode_atts( array(
		'title' => 'Tab',
		'open' 	=> 'false',
	), $atts );

	$tab .= sprintf('<div role="tabpanel" class="tab-pane %3$s" id="tab-%1$s">%2$s</div>',
		esc_attr( sanitize_title( strtolower( $params['title'] ) ) ),
		$content,
		( isset( $params['open'] ) && 'true' === $params['open'] ) ? 'active' : ''
	);

	/** Strip out new lines to avoid auto <p>s. */
	return $tab;
};

add_shortcode( 'tabs', 'idaho_tabs_func' );

/**
 * Function for rendering tabs group parent.
 *
 * @param string $atts Shortcode arguments.
 * @param string $content Shortcode content.
 */
function idaho_tabs_func( $atts, $content ) {

	$content = str_replace( "\r\n", '', $content );

	$group = (string) '<div><ul class="nav nav-tabs" role="tablist">';

	/** Shortcode regex pattern from wordpress. */
	$pattern = get_shortcode_regex();

	/** Get all the tab panes inside the content and build a navigation. */
	if ( preg_match_all( '/' . $pattern . '/s', $content, $matches ) && array_key_exists( 2, $matches ) && in_array( 'tab', $matches[2] ) ) {
		foreach ( $matches[3] as $tab ) {
			$atts = shortcode_parse_atts( $tab );

			$group .= sprintf('<li role="presentation" class="%1$s"><a href="#tab-%2$s" aria-controls="tab-%2$s" role="tab" data-toggle="tab" class="no-icon-link">%3$s</a></li>',
				( isset( $atts['open'] ) && 'true' === $atts['open'] ) ? 'active' : '',
				esc_attr( sanitize_title( strtolower( $atts['title'] ) ) ),
				esc_attr( $atts['title'] )
			);
		}
	}

	$group .= sprintf( '</ul><div class="tab-content">%1$s</div></div>', do_shortcode( $content ) );

	return $group;
};
?>
