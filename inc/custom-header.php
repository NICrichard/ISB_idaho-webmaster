<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Idaho_Webmaster
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses idaho_webmaster_header_style()
 * @uses idaho_webmaster_admin_header_style()
 * @uses idaho_webmaster_admin_header_image()
 */
function idaho_webmaster_custom_header_setup() {

	$color_scheme    = idaho_webmaster_get_color_scheme();
	$default_color	 = trim( $color_scheme[0], '#' );

	add_theme_support( 'custom-header', apply_filters( 'idaho_webmaster_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/img/header.jpg',
		'default-text-color'     => $default_color,
		'width'                  => 1220,
		'height'                 => 130,
		'flex-height'            => true,
		'uploads'       				 => true,
		'wp-head-callback'       => 'idaho_webmaster_header_style',
		'admin-head-callback'    => 'idaho_webmaster_admin_header_style',
		'admin-preview-callback' => 'idaho_webmaster_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'idaho_webmaster_custom_header_setup' );

if ( ! function_exists( 'idaho_webmaster_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see idaho_webmaster_custom_header_setup().
 */
function idaho_webmaster_header_style() {

	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}

		#masthead .header-background {
			background-image: url(<?php echo esc_attr( $header_image ); ?>);
			background-repeat: no-repeat;
      <?php if ( get_theme_mod( 'idaho_full_header_image', false ) ) : ?>
        background-position: center;
        background-size: cover;
      <?php else: ?>
        background-position: right top;
      <?php endif; ?>

		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // idaho_webmaster_header_style

if ( ! function_exists( 'idaho_webmaster_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see idaho_webmaster_custom_header_setup().
 */
function idaho_webmaster_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // idaho_webmaster_admin_header_style

if ( ! function_exists( 'idaho_webmaster_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see idaho_webmaster_custom_header_setup().
 */
function idaho_webmaster_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // idaho_webmaster_admin_header_image
