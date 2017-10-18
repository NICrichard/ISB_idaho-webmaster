<?php
/**
 * Shortcode for displaying blog panels.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Idaho_Webmaster
 */

add_shortcode( 'blog-panel', 'idaho_webmaster_blog_panel_func' );


if ( ! function_exists( 'idaho_webmaster_blog_panel_func' ) ) :
	/**
	 * Function for rendering blog panels.
	 *
	 * @param string $atts Shortcode arguments.
	 * @param string $content Shortcode content.
	 */
	function idaho_webmaster_blog_panel_func( $atts, $content = '' ) {

		$panel = (string) '';

		$params = (array) shortcode_atts( array(
			'type' 				=> 'default',
			'heading' 		=> 'h4',
		), $atts );

		$args = array(
			'numberposts' => '1',
			'post_status' => 'publish',
		);

		$recent_posts = wp_get_recent_posts( $args );
		foreach ( $recent_posts as $recent ) {

			$panel .= sprintf('
				<div class="panel panel-%1$s">
					<div class="panel-heading">
						<%7$s class="panel-title">%2$s</%7$s>
					</div>
					<div class="panel-body">
						<div class="panel-image">%4$s%5$s</div>
						<p>%3$s</p>
						<a href="%6$s" class="read-more btn btn-success">Read More</a>
					</div>
				</div>',
				esc_attr( $params['type'] ),
				esc_attr( $recent['post_title'] ),
				wp_trim_words( $recent['post_content'], 40 ),
				get_the_post_thumbnail( $recent['ID'], 'panel-image', array( 'class' => 'visible-md visible-lg' ) ),
				get_the_post_thumbnail( $recent['ID'], array( 150, 150 ), array( 'class' => 'hidden-md hidden-lg' ) ),
				get_permalink( $recent['ID'] ),
				tag_escape( $params['heading'] )
			);
		}

		return $panel;
	};
endif;
