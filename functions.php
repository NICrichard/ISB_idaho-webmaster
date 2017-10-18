<?php
/**
 * Idaho Webmaster functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Idaho_Webmaster
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( function_exists( 'domain_mapping_post_content' ) ) :

	add_filter( 'wp_get_attachment_url', 'domain_mapping_post_content' );
endif;

if ( ! function_exists( 'idaho_webmaster_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function idaho_webmaster_setup() {
	    /*
	     * Make theme available for translation.
	     * Translations can be filed in the /languages/ directory.
	     * If you're building a theme based on Idaho Webmaster, use a find and replace
	     * to change 'idaho-webmaster' to the name of your theme in all the template files.
	     */
	    load_theme_textdomain( 'idaho-webmaster', get_template_directory().'/languages' );

	    // Add default posts and comments RSS feed links to head.
	    add_theme_support( 'automatic-feed-links' );

	    /*
	     * Let WordPress manage the document title.
	     * By adding theme support, we declare that this theme does not use a
	     * hard-coded <title> tag in the document head, and expect WordPress to
	     * provide it for us.
	     */
	    add_theme_support( 'title-tag' );

	    /*
	     * Enable support for Post Thumbnails on posts and pages.
	     *
	     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	     */
	    add_theme_support( 'post-thumbnails', array( 'post' ) );
			set_post_thumbnail_size( 900, 400, true );

			add_image_size( 'panel-image', 900, 350, true );
			add_image_size( 'gallery-thumbnail', 600, 600, true );

			// This theme uses wp_nav_menu() in four location.
			register_nav_menus( array(
				'primary' => __( 'Primary Menu', 'idaho-webmaster' ),
				'social'  => __( 'Social Links Menu', 'idaho-webmaster' ),
				'top' 		=> __( 'Top Menu', 'idaho-webmaster' ),
				'footer' 	=> __( 'Horizontal Footer Menu', 'idaho-webmaster' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			$color_scheme    = idaho_webmaster_get_color_scheme();
			$default_color	 = trim( $color_scheme[1], '#' );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'idaho_webmaster_custom_background_args', array(
				'default-color' => $default_color,
				'default-image' => '',
			) ) );
	}
endif; // Idaho_webmaster_setup.

add_action( 'after_setup_theme', 'idaho_webmaster_setup' );



if ( ! function_exists( 'idaho_webmaster_required_links' ) ) :

	/**
	 * Adds links to wordpress footer menu.
	 * @param  array $items Stuff from the menu.
	 * @param  array $args  More stuff from the menu.
	 * @return array        Menu.
	 */
	function idaho_webmaster_required_links( $items, $args ) {

		if ( $args->theme_location === 'footer' || ( isset( $args->include_links ) && $args->include_links ) ) {
			$items .= '<li><a href="http://www.idaho.gov/home/privacy.html">Privacy</a></li>';
			$items .= '<li><a href="http://www.idaho.gov/home/security.html">Security</a></li>';
		}

		return $items;
	}
endif;

add_filter( 'wp_nav_menu_items', 'idaho_webmaster_required_links', 10, 2 );



if ( ! function_exists( 'idaho_webmaster_title_tag' ) ) :

	/**
	 * Correct the title tag
	 */
	function idaho_webmaster_title_tag() {

		$title = get_the_title() . ' | ';

		// Add the site description for the home/front page.
		$title .= get_bloginfo( 'description', 'display' );

		// Add the site name.
		$title .= ' ' . get_bloginfo( 'name' );

		return $title;
	}
endif;

add_filter( 'pre_get_document_title', 'idaho_webmaster_title_tag' );



if ( ! function_exists( 'idaho_webmaster_widgets_init' ) ) :
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function idaho_webmaster_widgets_init() {
		register_sidebar( array(
			'name' 					=> esc_html__( 'General Sidebar', 'idaho-webmaster' ),
			'id' 						=> 'sidebar-1',
			'description' 	=> '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
		));

		register_sidebar( array(
			'name' 					=> esc_html__( 'Home Sidebar', 'idaho-webmaster' ),
			'id' 						=> 'sidebar-home',
			'description' 	=> '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default alt">',
			'after_widget' 	=> '</div></aside>',
			'before_title' 	=> '<div class="panel-heading"><h3 class="panel-title">',
			'after_title' 	=> '</h3></div><div class="panel-body">',
		));

		register_sidebar( array(
			'name' 					=> esc_html__( 'Page Sidebar', 'idaho-webmaster' ),
			'id' 						=> 'sidebar-page',
			'description' 	=> '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
		));


		/**
		 * Footer Sidebar Register
		 *
		 * To repeat 5 times for widget footer.
		 *
		 * @param int $index For registering 5 sidebars for widgetized footers.
		 */
		function footer_sidebar_register( $index ) {
			register_sidebar(array(
				'name' 					=> esc_html__( 'Footer Column ', 'idaho-webmaster' ) . $index,
				'id' 						=> 'footer-column-'.$index,
				'description' => '',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		};

		footer_sidebar_register( 1 );
		footer_sidebar_register( 2 );
		footer_sidebar_register( 3 );
		footer_sidebar_register( 4 );
		footer_sidebar_register( 5 );
	}
endif;

add_action( 'widgets_init', 'idaho_webmaster_widgets_init' );



if ( ! function_exists( 'idaho_webmaster_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function idaho_webmaster_scripts() {
		wp_enqueue_style( 'idaho-webmaster-style', get_stylesheet_uri() );
		wp_enqueue_style( 'idaho-webmaster-font', 'https://fonts.googleapis.com/css?family=Amethysta' );

		wp_enqueue_script( 'idaho-webmaster-bootstrap', get_template_directory_uri().'/js/bootstrap.js', array( 'jquery' ), '3.3.5', true );
		wp_enqueue_script( 'idaho-webmaster-bootstrap-accessibility', get_template_directory_uri().'/js/bootstrap-accessibility.js', array( 'jquery', 'idaho-webmaster-bootstrap' ), '1.0.4', true );

		wp_enqueue_script( 'idaho-webmaster-theme', get_template_directory_uri().'/js/theme.js', array( 'idaho-webmaster-bootstrap' ), '1.2', true );

		if ( is_page_template('page-webmaster.php') ) {
        wp_enqueue_script('webmaster', get_template_directory_uri().'/js/webmaster.js', array( 'idaho-webmaster-bootstrap' ), null, true );
    }

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;

add_action( 'wp_enqueue_scripts', 'idaho_webmaster_scripts' );



if ( ! function_exists( 'idaho_webmaster_html_js_class' ) ) :
	/**
	 * Add no-js when browser doesn't support Javascript.
	 */
	function idaho_webmaster_html_js_class() {
		echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
	}
endif;

add_action( 'wp_head', 'idaho_webmaster_html_js_class', 1 );



if ( ! function_exists( 'idaho_webmaster_external_link_style' ) ) :
	/**
	 * Add no-js when browser doesn't support Javascript.
	 */
	function idaho_webmaster_external_link_style() {
		$siteURL = site_url();
		if ( empty( $siteURL ) ) {
			$siteURL = 'localhost';
		}
		echo '<style> #content a:not([href*=".gov"]):not([href^="#"]):not([href^="tel:"]):not(.no-icon-link):after { position:relative!important;top:0px;display:inline;font-family:Glyphicons!important;font-style:normal;font-weight:400;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;content:"\E390";margin-left:3px;font-size:.9em } </style>'. "\n" ;
	}
endif;

add_action( 'wp_head', 'idaho_webmaster_external_link_style', 1 );



if ( ! function_exists( 'idaho_webmaster_add_editor_styles' ) ) :

	/**
	 * Apply theme's stylesheet to the visual editor.
	 *
	 * @uses add_editor_style() Links a stylesheet to visual editor
	 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
	 */
	function idaho_webmaster_add_editor_styles() {
		add_editor_style();
	}
endif;

add_action( 'init', 'idaho_webmaster_add_editor_styles' );



if ( ! function_exists( 'idaho_webmaster_unhide_kitchen_sink' ) ) :
	/**
	 * Disalbes the kitchen sink hiding.
	 * @param  array $args Editor Options, look for wordpress_adv_hidden.
	 * @return array       Editor Options modified.
	 */
	function idaho_webmaster_unhide_kitchen_sink( $args ) {
		$args['wordpress_adv_hidden'] = false;
		return $args;
	}
endif;

add_filter( 'tiny_mce_before_init', 'idaho_webmaster_unhide_kitchen_sink' );



if ( ! function_exists( 'remove_empty_p' ) ) :

	/**
	 * Removes empty <p> tags from the $content.
	 * @param  string $content Content from the shortcode or post.
	 * @return string          The fixed string.
	 */
	function remove_empty_p( $content ) {
		$content = force_balance_tags( $content );
		return preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	}
endif;



if ( ! function_exists( 'bootstrap_comment' ) ) :

	/**
	 * Fixes WordPress comments to more closely match Bootstrap.
	 * @param  string $comment Comment input.
	 * @param  array  $args 	 Arguments from the array.
	 * @param  int    $depth	 How deep it goes.
	 */
	function idaho_webmaster_comments( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) {
			case 'pingback' :
			case 'trackback' : ?>

        <li class="comment media" id="comment-<?php comment_ID(); ?>">
          <div class="media-body">
            <p>
							<?php esc_html__( 'Pingback:', 'idaho-webmaster' ); ?>
							<?php comment_author_link(); ?>
            </p>
          </div><!--/.media-body -->

			<?php
			break;
			default :
				// Proceed with normal comments.
				global $post; ?>

				<li class="comment media" id="li-comment-<?php comment_ID(); ?>">
          <a href="<?php esc_url( $comment->comment_author_url ); ?>" class="pull-left">
            <?php esc_html( get_avatar( $comment, 64 ) ); ?>
          </a>
          <div class="media-body">
            <h4 class="media-heading comment-author vcard">
						<?php
						printf( '<cite class="fn">%1$s %2$s</cite>',
							get_comment_author_link(),
							( $comment->user_id === $post->post_author ) ? '<span class="label"> ' . esc_html_e( 'Post author', 'idaho-webmaster' ) . '</span> ' : ''
						);
						?>
            </h4>

            <?php if ( '0' === $comment->comment_approved ) : ?>
              <p class="comment-awaiting-moderation">
								<?php esc_html_e( 'Your comment is awaiting moderation.', 'idaho-webmaster' ); ?>
							</p>
            <?php endif; ?>

						<?php comment_text(); ?>

						<p class="meta">
							<?php

							printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								sprintf(
									esc_html__( '%1$s at %2$s', 'idaho-webmaster' ),
									get_comment_date(),
									get_comment_time()
								));
							?>
            </p>

						<p class="reply">
							<?php comment_reply_link( array_merge( $args, array(
								'reply_text' => esc_html__( 'Reply', 'idaho-webmaster' ),
								'depth'      => $depth,
								'max_depth'  => $args['max_depth'],
							))); ?>

						</p>
          </div><!--/.media-body -->
    	<?php
			break;
		}
	}
endif;



if ( ! function_exists( 'idaho_plugin_check' ) ) :

	/**
	 * Check if a plugin is active
	 * @param  array $plugin Subdirectory/file.php.
	 * @return boolean       Boolean declaring it's active state.
	 */
	function idaho_plugin_check( $plugin ) {
		return ( is_plugin_active( $plugin ) );
	}
endif;



if ( ! function_exists( 'idaho_webmaster_logo_srcset' ) ) :

	/**
	 * Checks for a retina image. If so formats the tag.
	 */
	function idaho_webmaster_logo_srcset() {
		$logo = get_theme_mod( 'idaho_logo', false );
		$retina = get_theme_mod( 'idaho_logo_retina', false );

		if ( $logo && $retina ) {
			return sprintf( '%1$s 1x, %2$s 2x', $logo, $retina );
		} else {
			return '';
		}
	}
endif;



if ( ! function_exists( 'idaho_webmaster_meta' ) ) :

	/**
	 * Checks for a post meta key and returns default if none is provided.
	 * @param  string $name    Name of key.
	 * @param  string $default What it should default to.
	 * @param  bool   $single  Whether or not it's a single.
	 * @return string          The default or the key value.
	 */
	function idaho_webmaster_meta( $name, $default = '', $single = true ) {
		$meta = get_post_meta( get_the_ID(), $name, $single );

		if ( ! empty( $meta ) ) {
			return $meta;
		} else {
			return $default;
		}
	}
endif;



if ( ! function_exists( 'idaho_webmaster_comment_form_fields' ) ) :
	/**
	 * Replaces comment fields to match Bootstrap.
	 * @param  array $fields Fields for comment menu.
	 * @return array         Modified fields array.
	 */
	function idaho_webmaster_comment_form_fields( $fields ) {
		$commenter = wp_get_current_commenter();

		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

		$fields = array(
			'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
									'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
			'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
									'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
			'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
									'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
		);

		return $fields;
	}
endif;

add_filter( 'comment_form_default_fields', 'idaho_webmaster_comment_form_fields' );



if ( ! function_exists( 'idaho_webmaster_comment_defaults' ) ) :
	/**
	 * Switch around wordpress comment form to match Bootstrap.
	 * @param  array $defaults Bootstrap supplied arguments.
	 * @return array       		 Arguments as fixed by function.
	 */
	function idaho_webmaster_comment_defaults( $defaults ) {
		$defaults['comment_field'] = '<div class="form-group comment-form-comment">
			<label for="comment">' . esc_html__( 'Comment', 'idaho-webmaster' ) . '</label>
				<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
	    </div>';

		$defaults['class_submit'] = 'btn btn-primary'; // Since WP 4.1.

		return $defaults;
	}
endif;

add_filter( 'comment_form_defaults', 'idaho_webmaster_comment_defaults' );



if ( ! function_exists( 'idaho_webmaster_adjust_brightness' ) ) :
	/**
	 * Adjusts the brightness on a hex value.
	 * For customizer to figure out hover colors.
	 * @param  string $hex   #123123.
	 * @param  int    $steps Between -255 to 255.
	 * @return string        Hex value.
	 */
	function idaho_webmaster_adjust_brightness( $hex, $steps ) {
		// Steps should be between -255 and 255. Negative = darker, positive = lighter.
		$steps = max( -255, min( 255, $steps ) );

		// Normalize into a six character long hex string.
		$hex = str_replace( '#', '', $hex );

		// If the string is 3 length then repeat to 6.
		if ( 3 === strlen( $hex ) ) {
			$hex = str_repeat( substr( $hex,0,1 ), 2 ).str_repeat( substr( $hex,1,1 ), 2 ).str_repeat( substr( $hex,2,1 ), 2 );
		}

		// Split into three parts: R, G and B.
		$color_parts = str_split( $hex, 2 );
		$return = '#';

		foreach ( $color_parts as $color ) {
			$color   = hexdec( $color ); // Convert to decimal.
			$color   = max( 0, min( 255, $color + $steps ) ); // Adjust color.
			$return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code.
		}

		return $return;
	}
endif;



if ( ! function_exists( 'idaho_webmaster_b_or_w' ) ) :
	/**
	 * Checks whether text should be white or black.
	 * @param  string $hexcolor Background color.
	 * @return string           Hex value for text.
	 */
	function idaho_webmaster_b_or_w( $hexcolor ) {
		$r = hexdec( substr( $hexcolor, 1, 2 ) );
		$g = hexdec( substr( $hexcolor, 3, 2 ) );
		$b = hexdec( substr( $hexcolor, 5, 2 ) );
		$yiq = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;
		return ( $yiq >= 128) ? '#000000' : '#ffffff';
	}
endif;



if ( ! function_exists( 'idaho_webmaster_hex_2_rgba' ) ) :

	/**
	 * Converts hex to rgba.
	 * @param  string $color   Hex value of color.
	 * @param  int    $opacity If you wish to give it opacity.
	 * @return string          RGBA ready for css.
	 */
	function idaho_webmaster_hex_2_rgba( $color, $opacity = false ) {
		$default = 'rgb(0,0,0)';

		// Return default if no color provided.
		if ( empty( $color ) ) {
			return $default;
		}

		// Sanitize $color if "#" is provided.
		if ( '#' === $color[0] ) {
			$color = substr( $color, 1 );
		}

		// Check if color has 6 or 3 characters and get values.
		if ( 6 === strlen( $color ) ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( 3 === strlen( $color ) ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		// Convert hexadec to rgb.
		$rgb = array_map( 'hexdec', $hex );

		// Check if opacity is set(rgba or rgb).
		if ( $opacity ) {
			if ( abs( $opacity ) > 1 ) {
				$opacity = 1.0;
			}
			$output = 'rgba('.implode( ',',$rgb ).','.$opacity.')';
		} else {
			$output = 'rgb('.implode( ',',$rgb ).')';
		}

		// Return rgb(a) color string.
		return $output;
	}
endif;



if ( ! function_exists( 'idaho_webmaster_page_description' ) ) :
	/**
	 * Figures out the page description. Checks for description meta or uses first sentences until 250 max.
	 * @return string Description.
	 */
	function idaho_webmaster_page_description() {
		$_idaho_description = get_post_meta( get_the_ID(), '_idaho_description', true );
		$post_object = get_post( get_the_ID() );
		$post_excerpt = wp_html_excerpt( wp_trim_words( $post_object->post_content, 50, '' ), 250 );

		return( $_idaho_description ) ? $_idaho_description : substr( $post_excerpt, 0, ( strrpos( $post_excerpt, '.' ) ) ) . '.';
	}
endif;



if ( ! function_exists( 'idaho_webmaster_find_twitter_handle' ) ) :
	/**
	 * Figures out the page description. Checks for description meta or uses first sentences until 250 max.
	 * @return string Description.
	 */
	function idaho_webmaster_find_twitter_handle() {
		$re = '/(?:https?:\\/\\/)?(?:www\\.)?twitter\\.com\\/(?:#!\\/)?@?([^\\/\\?\\s]*)/';
		$url = get_theme_mod( 'idaho_social_twitter', 'https://twitter.com/@idahogov' );

		preg_match_all( $re, $url, $matches );

		if ( isset( $mathes[1][0] ) ) {
			return '@' . $matches[1][0];
		} else {
			return '@';
		}
	}
endif;



if ( ! function_exists( 'idaho_webmaster_custom_wysiwyg' ) ) :
	/**
	 * Sets the wysiwyg options.
	 * @param  array $in Default parameters.
	 * @return array     New parameters.
	 */
	function idaho_webmaster_custom_wysiwyg( $in ) {
		$in['toolbar1'] = 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,spellchecker,wp_fullscreen,wp_adv,idaho_mce_shortcode_button';
		$in['toolbar2'] = 'styleselect,formatselect,alignjustify,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help,idaho_glyphicons';
		return $in;
	}
endif;

add_filter( 'tiny_mce_before_init', 'idaho_webmaster_custom_wysiwyg' );



if ( ! function_exists( 'idaho_webmaster_disable_wp_emojicons' ) ) :
	/**
	 * Remove the emoji print styles.
	 */
	function idaho_webmaster_disable_wp_emojicons() {
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		// Filter to remove TinyMCE emojis.
	}
endif;

add_action( 'init', 'idaho_webmaster_disable_wp_emojicons' );



if ( ! function_exists( 'idaho_webmaster_responsive_video_embeds' ) ) :

	/**
	 * Adds in responsive video classes for bootstrap compatibility.
	 * @param  string $html HTML from oEmbed.
	 * @param  array  $data Contains tag information from oEmebed/Shortcode.
	 * @return string       HTML for the embed.
	 */
	function idaho_webmaster_responsive_video_embeds( $html, $data ) {
		// Verify oembed data (as done in the oEmbed data2html code).
		if ( ! is_object( $data ) || empty( $data->type ) ) {
			return $html;
		}

		// Verify that it is a video.
		if ( 'video' !== $data->type ) {
			return $html;
		}

		// Calculate aspect ratio.
		$ar = $data->width / $data->height;
		$ar_mod = ( abs( $ar - ( 4 / 3 ) ) < abs( $ar - ( 16 / 9 ) ) ? 'embed-responsive-4by3' : 'embed-responsive-16by9' );

		$html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
		return '<div class="embed-responsive ' . $ar_mod . '" data-aspectratio="' . number_format( $ar, 5, '.', ',' ) . '">' . $html . '</div>';
	}
endif;

add_filter( 'oembed_dataparse', 'idaho_webmaster_responsive_video_embeds', 10, 2 );



function idaho_myme_types($mime_types){
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
		$mime_types['ai'] = 'image/vnd.adobe.illustrator'; //Adding illustrator files
    return $mime_types;
}
add_filter('upload_mimes', 'idaho_myme_types', 1, 1);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory().'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory().'/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/**
 * Bootstrap Menu Walker.
 */
require get_template_directory().'/inc/bootstrap-navwalker.php';

/**
 * Bootstrap Menu Walker.
 */
require get_template_directory().'/inc/bootstrap-breadcrumbs.php';

/**
 * Meta Boxes.
 */
require get_template_directory().'/inc/meta-boxes.php';

/**
 * Meta Boxes.
 */
require get_template_directory().'/inc/bootstrap-side-nav.php';

/**
 * Shortcodes.
 */
require get_template_directory().'/inc/shortcodes.php';

/**
 * Formats.
 */
require get_template_directory().'/inc/editor-formats.php';

/**
 * Load prebuilt layouts pour la Site Origins Editor.
 */
require get_template_directory().'/inc/prebuilt-layouts.php';

/**
 * Load prebuilt layouts pour la Site Origins Editor.
 */
require get_template_directory().'/inc/gravity-forms.php';
