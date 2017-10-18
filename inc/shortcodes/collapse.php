<?php
/**
 * Shortcode for displaying collapsable accordions.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Idaho_Webmaster
 */

/**
 * Global variable for the collapse group ID. Used in
 * each panel to relate to the parent.
 * @var string
 */
$idaho_collapse_group_ID = (string) '';

add_shortcode( 'collapse', 'idaho_collapse_func' );

/**
 * [collapse type="alert" title="Title" open="y || n"]
 *
 * @param string $atts Shortcode arguments.
 * @param string $content Shortcode content.
 */
function idaho_collapse_func( $atts, $content = '' ) {

	global $idaho_collapse_group_ID;

	/**
	 * Html output string.
	 * @var string
	 */
	$collapse = (string) '';

	$params = (array) shortcode_atts( array(
		'type' 	=> 'default',
		'title' => 'Collapse',
		'open' 	=> 'false',
	), $atts );

	/**
	 * Create a unique ID for #id purposes.
	 * @var string
	 */
	$uniqueID 		= (string) uniqid();
	$collapse .= sprintf('<div class="panel %1$s" id="%2$s"><div class="panel-heading" role="tab" id="heading-%2$s"><h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#%3$s" href="#collapse-%2$s" aria-expanded="%6$s" aria-controls="collapse-%2$s" class="no-icon-link">%4$s</a></h4></div><div id="collapse-%2$s" class="panel-collapse collapse %7$s" role="tabpanel" aria-labelledby="heading-%2$s"><div class="panel-body">%5$s</div></div></div>',
		esc_attr( 'panel-'.$params['type'] ),
		esc_attr( sanitize_title( $params['title'] ) ),
		esc_attr( $idaho_collapse_group_ID ),
		esc_attr( $params['title'] ),
		$content,
		esc_attr( $params['open'] ),
		( 'true' === $params['open'] ) ? 'in' : ''
	);

	return $collapse;

};

add_shortcode( 'accordion', 'idaho_accordion_func' );

/**
 * [collapse_group]
 *
 * @param string $atts Shortcode arguments.
 * @param string $content Shortcode content.
 */
function idaho_accordion_func( $atts, $content ) {

	/**
	 * Setup the global string for the groups ID.
	 */
	global $idaho_collapse_group_ID;
	$idaho_collapse_group_ID 	= (string) 'accordion-'.uniqid();

	/**
	 * HTML output string.
	 * @var string
	 */
	$group = (string) '';

	$group .= sprintf( '<div class="panel-group" id="%1$s" role="tablist" aria-multiselectable="true">%2$s</div>', esc_attr( $idaho_collapse_group_ID ), do_shortcode( remove_empty_p( shortcode_unautop( $content ) ) ) );

	return $group;
};
?>
