<?php
/**
 * Idaho Webmaster Theme Customizer.
 *
 * @package Idaho_Webmaster
 */

include( 'color.php' );

/**
 * Sets up the WordPress core custom background features.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see idaho_webmaster_header_style()
 */
function idaho_webmaster_custom_background() {
	$color_scheme    = idaho_webmaster_get_color_scheme();
	$default_color	 = trim( $color_scheme[1], '#' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'idaho_webmaster_custom_background_args', array(
		'default-color' => $default_color,
	) ) );
}
add_action( 'after_setup_theme', 'idaho_webmaster_custom_background' );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function idaho_webmaster_customize_register( $wp_customize ) {

	$color_scheme    = idaho_webmaster_get_color_scheme();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_control( 'background_repeat' );
	$wp_customize->remove_control( 'background_attachment' );

	$wp_customize->add_setting( 'idaho_gradient_top', array(
		'default' 					=> 400,
		'capability' 				=> 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'idaho_gradient_top', array(
		'label'       => __( 'Gradient Top Space', 'idaho-webmaster' ),
		'description'	=> __( 'Moves the gradient cutoff.', 'idaho-webmaster' ),
		'section'     => 'background_image',
		'settings'    => 'idaho_gradient_top',
		'type'        => 'number',
	) ) );

	$wp_customize->add_setting( 'idaho_size_background', array(
    'default'   				=> false,
		'capability' 				=> 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_size_background', array(
		'settings' 		=> 'idaho_size_background',
		'label'    		=> __( 'Disable background sizing', 'idaho-webmaster' ),
		'description' => __( 'This will convert the background sizing to cover.', 'idaho-webmaster' ),
		'section'  		=> 'background_image',
		'type'     		=> 'checkbox',
	));

	$wp_customize->add_setting( 'idaho_background_shadow', array(
		'default'   				=> false,
		'capability' 				=> 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_background_shadow', array(
    'settings' 		=> 'idaho_background_shadow',
		'label'    		=> __( 'Disable background shadow', 'idaho-webmaster' ),
		'description' => __( 'This removes the shadows from the outside of the background image.', 'idaho-webmaster' ),
    'section'  		=> 'background_image',
		'type'     		=> 'checkbox',
	));

	$wp_customize->add_section( 'idaho_logo_section', array(
		'title'       => __( 'Logo', 'idaho-webmaster' ),
		'priority'    => 30,
		'capability' 	=> 'edit_theme_options',
		'description' => 'Upload a logo to replace the default.',
	) );

	$wp_customize->add_setting( 'idaho_logo', array(
		'default' => get_template_directory_uri() . '/img/logo.svg',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'idaho_logo', array(
		'label'    		=> __( 'Logo', 'idaho-webmaster' ),
		'section'  		=> 'idaho_logo_section',
		'capability' 	=> 'edit_theme_options',
		'settings' 		=> 'idaho_logo',
	) ) );

	$wp_customize->add_setting( 'idaho_logo_retina', array(
		'default' 					=> get_template_directory_uri() . '/img/logo.svg',
		'capability' 				=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'idaho_logo_retina', array(
		'label'    => __( 'Retina Logo', 'idaho-webmaster' ),
		'section'  => 'idaho_logo_section',
		'settings' => 'idaho_logo_retina',
	) ) );

	$wp_customize->add_section( 'idaho_settings', array(
		'title' => __( 'Settings', 'idaho-webmaster' ),
	) );

	$wp_customize->add_setting( 'idaho_tagline', array(
		'default' 					=> 'Adventures in Living',
		'capability'  			=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'idaho_tagline', array(
		'label'       => __( 'Tag Line', 'idaho-webmaster' ),
		'description'	=> __( 'Changes the tagline located in the utility bar.', 'idaho-webmaster' ),
		'section'     => 'idaho_settings',
		'settings'    => 'idaho_tagline',
		'type'        => 'text',
	) ) );

	$wp_customize->add_setting( 'idaho_search_affiliate', array(
		'default' 					=> 'idahogov',
		'capability'  			=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'idaho_search_affiliate', array(
		'label'       => __( 'Search Affiliate Identifier', 'idaho-webmaster' ),
		'description'	=> __( 'Uses custom search affiliate instead of idahogov.', 'idaho-webmaster' ),
		'section'     => 'idaho_settings',
		'settings'    => 'idaho_search_affiliate',
		'type'        => 'text',
	) ) );

  $wp_customize->add_setting( 'idaho_google_analytics', array(
		'default' 					=> '',
		'capability'  			=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'idaho_google_analytics', array(
		'label'       => __( 'Google Analytics ID', 'idaho-webmaster' ),
		'description'	=> __( 'Helps track your site\'s visitors using Google Analytics.', 'idaho-webmaster' ),
		'section'     => 'idaho_settings',
		'settings'    => 'idaho_google_analytics',
		'type'        => 'text',
	) ) );

	$wp_customize->add_setting('idaho_header_layout', array(
		'default'        		=> 'overmedium',
		'capability'     		=> 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_header_layout', array(
		'settings' 		=> 'idaho_header_layout',
		'label'   		=> __( 'Header Layout', 'idaho-webmaster' ),
		'description' => __( 'There are 4 options for headers. Each one goes alongside the IDAHO Logo.', 'idaho-webmaster' ),
		'section' 		=> 'idaho_settings',
		'type'    		=> 'select',
		'choices'    	=> array(
			'logo' 				=> 'Displays uploaded logo',
			'large' 			=> 'One Large Line',
			'overmedium' 	=> 'Small line over a medium line',
			'oversmall' 	=> 'Medium line over a small line',
			'medium' 			=> 'Two medium lines',
		),
	) );

	$wp_customize->add_setting('idaho_footer_layout', array(
		'default'       	  => '5col',
		'capability'     		=> 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_footer_layout', array(
		'settings' 		=> 'idaho_footer_layout',
		'label'   		=> __( 'Footer Layout', 'idaho-webmaster' ),
		'description' => __( 'This determines the footer layout at the bottom of the page.', 'idaho-webmaster' ),
		'section' 		=> 'idaho_settings',
		'type'    		=> 'select',
		'choices'    	=> array(
			'5col' 				=> 'Five column footer',
			'2col'		 		=> 'Two column footer',
			'nav' 				=> 'Horizontal navigation',
		),
	) );

	$wp_customize->add_setting( 'idaho_horizontal_navigation', array(
    'default'   	=> true,
		'capability'  => 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_horizontal_navigation', array(
		'settings' 		=> 'idaho_horizontal_navigation',
		'label'    		=> __( 'Horizontal Navigation', 'idaho-webmaster' ),
		'description' => __( 'When enabled the the default horizontal navigation is shown under the header. When disabled the menu will be shown above the sidebar.', 'idaho-webmaster' ),
		'section'  		=> 'idaho_settings',
		'type'     		=> 'checkbox',
	) );

  $wp_customize->add_setting( 'idaho_full_header_image', array(
    'default'   	=> false,
		'capability'  => 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_full_header_image', array(
		'settings' 		=> 'idaho_full_header_image',
		'label'    		=> __( 'Full Width Header Image', 'idaho-webmaster' ),
		'description' => __( 'This extends the header image to be full width.', 'idaho-webmaster' ),
		'section'  		=> 'idaho_settings',
		'type'     		=> 'checkbox',
	) );

	$wp_customize->add_setting( 'idaho_grey_logo', array(
		'default'   	=> false,
		'capability'  => 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_grey_logo', array(
		'settings' 		=> 'idaho_grey_logo',
		'label'    		=> __( 'Use Grey Logo', 'idaho-webmaster' ),
		'description' => __( 'Switches the idaho logo from black to grey. (#a6a6a6)', 'idaho-webmaster' ),
		'section'  		=> 'idaho_settings',
		'type'     		=> 'checkbox',
	) );

	$wp_customize->add_setting( 'idaho_search_header', array(
    'default'   	=> false,
		'capability'  => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_search_header', array(
    'settings' 		=> 'idaho_search_header',
		'label'    		=> __( 'Disable search field', 'idaho-webmaster' ),
		'description' => __( 'This will hide the search field in the header on every page.', 'idaho-webmaster' ),
    'section'  		=> 'idaho_settings',
		'type'     		=> 'checkbox',
	));

	$wp_customize->add_setting( 'idaho_search_home', array(
    'default'   	=> false,
		'capability'  => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_search_home', array(
    'settings' 		=> 'idaho_search_home',
		'label'    		=> __( 'Disable home page search field', 'idaho-webmaster' ),
		'description' => __( 'This will hide the search field on the home page.', 'idaho-webmaster' ),
    'section'  		=> 'idaho_settings',
		'type'     		=> 'checkbox',
	));
	
	$wp_customize->add_setting( 'idaho_search_local', array(
    'default'   	=> false,
		'capability'  => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'idaho_search_local', array(
    'settings' 		=> 'idaho_search_local',
		'label'    		=> __( 'Local search', 'idaho-webmaster' ),
		'description' => __( 'Search using WordPress.', 'idaho-webmaster' ),
    'section'  		=> 'idaho_settings',
		'type'     		=> 'checkbox',
	));


	/**
	 * Color Settings.
	 */
	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'default',
		'sanitize_callback' => 'idaho_webmaster_sanitize_color_scheme',
		'capability'				=> 'update_core',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'color_scheme', array(
		'label'    => __( 'Base Color Scheme', 'idaho-webmaster' ),
		'section'  => 'colors',
		'type'     => 'select',
		'choices'  => idaho_webmaster_get_color_scheme_choices(),
		'priority' => 1,
	) );

	$wp_customize->add_setting( 'idaho_color_header_bg', array(
		'default' 					=> $color_scheme[2],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_header_bg', array(
		'label' 		=> __( 'Header Background Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_header_bg',
	) ) );

	$wp_customize->add_setting( 'idaho_color_link', array(
		'default' 					=> $color_scheme[3],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_link', array(
		'label' 		=> __( 'Link Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_link',
	) ) );

	$wp_customize->add_setting( 'idaho_color_primary', array(
		'default' 					=> $color_scheme[4],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_primary', array(
		'label' 		=> __( 'Primary Button & Sub-Nav Hover Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_primary',
	) ) );

	$wp_customize->add_setting( 'idaho_color_light_blue', array(
		'default' 					=> $color_scheme[5],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_light_blue', array(
		'label' 		=> __( 'Search Box & U.S. Map Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_light_blue',
	) ) );

	$wp_customize->add_setting( 'idaho_color_ui_blue', array(
		'default' 					=> $color_scheme[6],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_ui_blue', array(
		'label' 		=> __( 'Top Nav Border & Footer Background Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_ui_blue',
	) ) );

	$wp_customize->add_setting( 'idaho_color_secondary', array(
		'default' 					=> $color_scheme[7],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_secondary', array(
		'label' 		=> __( 'Page Heading Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_secondary',
	) ) );

	$wp_customize->add_setting( 'idaho_color_nav_hover', array(
		'default' 					=> $color_scheme[8],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_nav_hover', array(
		'label' 		=> __( 'Navigation Hover Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_nav_hover',
	) ) );

	$wp_customize->add_setting( 'idaho_color_home_panel', array(
		'default' 					=> $color_scheme[9],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_home_panel', array(
		'label' 		=> __( 'Home Panel Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_home_panel',
	) ) );

	$wp_customize->add_setting( 'idaho_color_data_table', array(
		'default' 					=> $color_scheme[10],
		'capability'  			=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   			=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idaho_color_data_table', array(
		'label' 		=> __( 'Data Table Color', 'idaho-webmaster' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_data_table',
	) ) );

}
add_action( 'customize_register', 'idaho_webmaster_customize_register' );

/**
 * Registers color schemes for Idaho Webmaster.
 *
 * Can be filtered with {@see 'idaho_webmaster_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Header Text Color.
 * 2. Background Color.
 * 3. Header Background Color.
 * 4. Link Color.
 * 5. Primary Button & Sub-Nav Hover Color.
 * 6. Search Box & U.S. Map Color.
 * 7. Top Nav Border & Footer Background Color
 * 8. Page Heading Color.
 * 9. Navigation Hover Color.
 * 10. Home Panel Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @return array An associative array of color scheme options.
 */
function idaho_webmaster_get_color_schemes() {
	/**
	 * Filter the color schemes registered for use with Idaho Webmaster.
	 *
	 * @since Idaho Webmaster 1.0
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, page
	 *                              background, link, main text, secondary text.
	 *     }
	 * }
	 */
	return apply_filters( 'idaho_webmaster_color_schemes', array(
		'default' => array(
			'label'  => __( 'Sawtooth', 'idaho-webmaster' ),
			'colors' => array(
				'#666666', // Header
				'#073570', // Background
				'#c7c7c7', // Header Background
				'#0027c1', // Link
				'#2968c0', // Primary
				'#7696C9', // Search
				'#172f51', // Top Nav
				'#054E3A', // Heading 2
				'#879967', // Navigation Hover
				'#B7C2A4', // Home Panel
				'#0027c1', // DataTable
			),
		),
		'garnet' => array(
			'label'  => __( 'Garnet', 'idaho-webmaster' ),
			'colors' => array(
				'#666666', // Header
				'#5e0505', // Background
				'#c7c7c7', // Header Background
				'#022ed1', // Link
				'#2968c0', // Primary
				'#013f8a', // Search
				'#002f56', // Top Nav
				'#941324', // Heading 2
				'#013f8a', // Navigation Hover
				'#7c7c7c', // Home Panel
				'#0027c1', // DataTable
			),
		),
		'bluebird' => array(
			'label'  => __( 'Bluebird', 'idaho-webmaster' ),
			'colors' => array(
				'#666666', // Header
				'#344558', // Background
				'#c7c7c7', // Header Background
				'#047ce5', // Link
				'#2f92e2', // Primary
				'#5ea9f9', // Search
				'#233a30', // Top Nav
				'#019999', // Heading 2
				'#c5ed9a', // Navigation Hover
				'#abcecb', // Home Panel
				'#0027c1', // DataTable
			),
		),
		'ponderosa' => array(
			'label'  => __( 'Ponderosa', 'idaho-webmaster' ),
			'colors' => array(
				'#666666', // Header
				'#303018', // Background
				'#c7c7c7', // Header Background
				'#0063d6', // Link
				'#481800', // Primary
				'#604830', // Search
				'#301800', // Top Nav
				'#82832c', // Heading 2
				'#2c5b34', // Navigation Hover
				'#2c5b34', // Home Panel
				'#0027c1', // DataTable
			),
		),
		'stanley' => array(
			'label'  => __( 'Stanley', 'idaho-webmaster' ),
			'colors' => array(
				'#666666', // Header
				'#655643', // Background
				'#c7c7c7', // Header Background
				'#2e7a00', // Link
				'#5a6600', // Primary
				'#61290e', // Search
				'#2e001a', // Top Nav
				'#487f64', // Heading 2
				'#c75d3d', // Navigation Hover
				'#c75d3d', // Home Panel
				'#0027c1', // DataTable
			),
		),
	) );
}

if ( ! function_exists( 'idaho_webmaster_get_color_scheme' ) ) {
	/**
	 * Retrieves the current Twenty Sixteen color scheme.
	 *
	 * Create your own twentysixteen_get_color_scheme() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return array An associative array of either the current or default color scheme HEX values.
	 */
	function idaho_webmaster_get_color_scheme() {
		$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
		$color_schemes       = idaho_webmaster_get_color_schemes();

		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		}

		return $color_schemes['default']['colors'];
	}
}

if ( ! function_exists( 'idaho_webmaster_get_color_scheme_choices' ) ) {
	/**
	 * Retrieves an array of color scheme choices registered for Idaho Webmaster.
	 *
	 * Create your own idaho_webmaster_get_color_scheme_choices() function to override
	 * in a child theme.
	 *
	 * @since Idaho Webmaster 1.0
	 *
	 * @return array Array of color schemes.
	 */
	function idaho_webmaster_get_color_scheme_choices() {
		$color_schemes                = idaho_webmaster_get_color_schemes();
		$color_scheme_control_options = array();

		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}

		return $color_scheme_control_options;
	}
}


if ( ! function_exists( 'idaho_webmaster_sanitize_color_scheme' ) ) {
	/**
	 * Handles sanitization for Idaho Webmaster color schemes.
	 *
	 * Create your own idaho_webmaster_sanitize_color_scheme() function to override
	 * in a child theme.
	 *
	 * @since Idaho Webmaster 1.0
	 *
	 * @param string $value Color scheme name value.
	 * @return string Color scheme name.
	 */
	function idaho_webmaster_sanitize_color_scheme( $value ) {
		$color_schemes = idaho_webmaster_get_color_scheme_choices();

		if ( ! array_key_exists( $value, $color_schemes ) ) {
			return 'default';
		}

		return $value;
	}
}

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );

	// Don't do anything if the default color scheme is selected.
	if ( 'default' === $color_scheme_option ) {
		return;
	}

	$color_scheme = idaho_webmaster_get_color_scheme();

	// If we get this far, we have a custom color scheme.
	$colors = array(
		'header_textcolor'      	=> $color_scheme[0],
		'background_color' 				=> $color_scheme[1],
		'idaho_color_header_bg' 	=> $color_scheme[2],
		'idaho_color_link'      	=> $color_scheme[3],
		'idaho_color_primary'  		=> $color_scheme[4],
		'idaho_color_light_blue'  => $color_scheme[5],
		'idaho_color_ui_blue'  		=> $color_scheme[6],
		'idaho_color_secondary'  	=> $color_scheme[7],
		'idaho_color_nav_hover'  	=> $color_scheme[8],
		'idaho_color_home_panel'  => $color_scheme[9],
	);

	$color_scheme_css = idaho_webmaster_get_color_scheme_css( $colors );

	wp_add_inline_style( 'idaho-webmaster-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_color_scheme_css' );

/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since Idaho Webmaster 1.0
 */
function idaho_webmaster_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20150825', true );
	wp_localize_script( 'color-scheme-control', 'colorScheme', idaho_webmaster_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'idaho_webmaster_customize_control_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function idaho_webmaster_customize_preview_js() {
	wp_enqueue_script( 'idaho_webmaster_customizer_jss', get_template_directory_uri() . '/js/jss.js', array(), '20130508', true );
	wp_enqueue_script( 'idaho_webmaster_customizer_tinycolor', get_template_directory_uri() . '/js/tinycolor.js', array(), '20130508', true );
	wp_enqueue_script( 'idaho_webmaster_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'idaho_webmaster_customizer_jss', 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'idaho_webmaster_customize_preview_js' );

/**
 * Convert colors to old colors hue/saturation.
 * @param  string $color    Hex of new color.
 * @param  string $original Hex of original color.
 * @return string           Hex of combined color.
 */
function idaho_webmaster_shift_hsl_to( $color, $original ) {
	$color_hsl = Color::hexToHsl( $color );
	$original_hsl = Color::hexToHsl( $original );
	$color_hsl['S'] = $original_hsl['S'];
	$color_hsl['L'] = $original_hsl['L'];

	return '#' . Color::hslToHex( $color_hsl );
}

/**
 * Returns CSS for the color schemes.
 *
 * @since Idaho Webmaster 1.0
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function idaho_webmaster_get_color_scheme_css( $colors ) {

	$colors = wp_parse_args( $colors, array(
		'header_textcolor'      	=> '',
		'background_color' 				=> '',
		'idaho_color_header_bg' 	=> '',
		'idaho_color_link'      	=> '',
		'idaho_color_primary'  		=> '',
		'idaho_color_light_blue'  => '',
		'idaho_color_ui_blue'  		=> '',
		'idaho_color_secondary'  	=> '',
		'idaho_color_nav_hover'  	=> '',
		'idaho_color_home_panel'  => '',
		'idaho_color_data_table'  => '',
	) );

	$colors['background_gradient'] 				= idaho_webmaster_hex_2_rgba( $colors['background_color'], .01 );
	$colors['idaho_color_primary_hover'] 	= idaho_webmaster_adjust_brightness( $colors['idaho_color_primary'], -25 );
	$colors['idaho_color_primary_border'] = idaho_webmaster_adjust_brightness( $colors['idaho_color_primary'], 99 );
	$colors['idaho_color_ui_blue_shadow'] = idaho_webmaster_adjust_brightness( $colors['idaho_color_ui_blue'], -50 );

	$colors['datatable_bg'] 		= idaho_webmaster_shift_hsl_to( $colors['idaho_color_data_table'], '#eef7fb' );
	$colors['datatable_border'] = idaho_webmaster_shift_hsl_to( $colors['idaho_color_data_table'], '#d9edf7' );

	$footer_links = ( '#000000' === idaho_webmaster_b_or_w( $colors['idaho_color_ui_blue'] ) ) ? idaho_webmaster_adjust_brightness( idaho_webmaster_b_or_w( $colors['idaho_color_ui_blue'] ), -25 ) : idaho_webmaster_adjust_brightness( idaho_webmaster_b_or_w( $colors['idaho_color_ui_blue'] ), 25 );

	$font_colors = array(
		'idaho_color_primary' 		=> idaho_webmaster_b_or_w( $colors['idaho_color_primary'] ),
		'idaho_color_ui_blue' 		=> idaho_webmaster_b_or_w( $colors['idaho_color_ui_blue'] ),
		'idaho_color_light_blue' 	=> idaho_webmaster_b_or_w( $colors['idaho_color_light_blue'] ),
		'idaho_color_nav_hover'		=> idaho_webmaster_b_or_w( $colors['idaho_color_nav_hover'] ),
		'idaho_color_home_panel'	=> idaho_webmaster_b_or_w( $colors['idaho_color_home_panel'] ),
	);

	return "
	/* Color Scheme */

	body {
		background-color: {$colors['background_color']};
	}

	#masthead .site-branding {
		background: {$colors['idaho_color_header_bg']};
	}

	.gradient-background-cutoff {
		background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, {$colors['background_gradient']}),color-stop(10%, {$colors['background_color']}));
		background-image: -moz-linear-gradient({$colors['background_gradient']} 0%, {$colors['background_color']} 10%);
		background-image: -webkit-linear-gradient({$colors['background_gradient']} 0%, {$colors['background_color']} 10%);
		background-image: linear-gradient({$colors['background_gradient']} 0%, {$colors['background_color']} 10%);
	}


	table.dataTable thead td {
		background: {$colors['datatable_bg']};
		border-color: {$colors['datatable_border']};
	}

	.table-striped > thead > tr, table.dataTable tbody tr:first-child td {
		border-color: {$colors['datatable_border']};
	}

	.table-hover > tbody > tr:hover {
		background: {$colors['datatable_border']};
	}

	a,
	.navbar-default .navbar-nav>li>a,
	.pagination>li>a,
	a:hover,
	.pagination>li>a {
		color: {$colors['idaho_color_link']};
	}

	.dropdown-menu li a:hover {
		background: {$colors['idaho_color_primary']};
	}

	.btn.btn-primary {
		background	: {$colors['idaho_color_primary']};
		border-color: {$colors['idaho_color_primary']};
	}

	.btn.btn-primary:hover {
		background	: {$colors['idaho_color_primary_hover']};
		border-color: {$colors['idaho_color_primary_hover']};
	}

	.btn.btn-default {
		border-color: {$colors['idaho_color_primary_border']};
	}

  .widget-menu .nav-pills>li>a {
		border-color: {$colors['idaho_color_primary_border']};
    color       : {$colors['idaho_color_primary']};
	}

  .widget-menu .nav-pills>li>a:hover {
		border-color: {$colors['idaho_color_primary']};
    background  : {$colors['idaho_color_primary']};
    color       : {$font_colors['idaho_color_primary']};
	}

	.btn.btn-default:hover {
		background	: {$colors['idaho_color_primary']};
		border-color: {$colors['idaho_color_primary']};
		color				: {$font_colors['idaho_color_primary']};
	}

	.site-footer {
		background: {$colors['idaho_color_ui_blue']};
	}

	.navbar-default, #masthead .site-branding {
		border-color: {$colors['idaho_color_ui_blue']};
	}

	.site-footer h3 {
		border-bottom: 1px solid {$font_colors['idaho_color_ui_blue']};
		box-shadow: 0 1px 0 {$colors['idaho_color_ui_blue_shadow']};
		color: {$font_colors['idaho_color_ui_blue']};
	}

	.site-footer a {
		color: {$footer_links};
	}

	.site-footer a:hover {
		color: {$font_colors['idaho_color_ui_blue']};
	}

	.search-form .input-group {
		border       : 4px solid {$colors['idaho_color_light_blue']};
		background   : {$colors['idaho_color_light_blue']};
	}

	.search-form .btn {
		background  : {$colors['idaho_color_light_blue']};
		border-color: {$colors['idaho_color_light_blue']};
		color: {$font_colors['idaho_color_light_blue']};
	}

	.search-form .btn:focus {
		background  : {$colors['idaho_color_light_blue']};
		border-color: {$colors['idaho_color_light_blue']};
		color: {$font_colors['idaho_color_light_blue']};
	}

	.search-form input.form-control  {
		border-color: {$colors['idaho_color_light_blue']};
	}

	.navbar-default .navbar-nav>li>a:hover,
	.navbar-default .navbar-nav>li>a:focus,
	.sidebar-menu>ul>li>a:hover,
	.pagination>.active>a:hover {
		background: {$colors['idaho_color_nav_hover']};
		color: {$font_colors['idaho_color_nav_hover']};
	}

	h2,
	h1.entry-title {
		color: {$colors['idaho_color_secondary']};
	}

	.panel.panel-default.alt .panel-heading {
		background: {$colors['idaho_color_home_panel']};
		border-color: {$colors['idaho_color_home_panel']};
		color: {$font_colors['idaho_color_home_panel']};
	}

	.panel.panel-default.alt {
		border-color: {$colors['idaho_color_home_panel']};
	}

	";

}


/**
 * Outputs an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 * @since Idaho Webmaster 1.0
 */
function idaho_webmaster_color_scheme_css_template() {
	$colors = array(
		'header_textcolor'      	=> '{{ data.header_textcolor }}',
		'background_color' 				=> '{{ data.background_color }}',
		'idaho_color_header_bg' 	=> '{{ data.idaho_color_header_bg }}',
		'idaho_color_link'      	=> '{{ data.idaho_color_link }}',
		'idaho_color_primary'  		=> '{{ data.idaho_color_primary }}',
		'idaho_color_light_blue'  => '{{ data.idaho_color_light_blue }}',
		'idaho_color_ui_blue'  		=> '{{ data.idaho_color_ui_blue }}',
		'idaho_color_secondary'  	=> '{{ data.idaho_color_secondary }}',
		'idaho_color_nav_hover'  	=> '{{ data.idaho_color_nav_hover }}',
		'idaho_color_home_panel'  => '{{ data.idaho_color_home_panel }}',
	);
	?>
	<script type="text/html" id="tmpl-idaho-webmaster-color-scheme">
		<?php echo idaho_webmaster_get_color_scheme_css( $colors ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'idaho_webmaster_color_scheme_css_template' );


/**
 * Enqueues front-end CSS for misc rules that don't fit elsewhere.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_customize_misc_css() {

	$gradient_top 		= get_theme_mod( 'idaho_gradient_top', 400 );

	$shadow_height 		= intval(get_theme_mod( 'idaho_gradient_top', 400 )) + 300;

	$background_size 	= ( get_theme_mod( 'idaho_size_background', false ) ) ? '100%' : 'auto';

	$background_color 		= '#'.get_theme_mod( 'background_color', '073570' );
	$background_gradient	= idaho_webmaster_hex_2_rgba( $background_color, .01 );

	$css = '
		/* Custom Misc CSS */

		body.custom-background#site-body {
			background-size: %1$s;
		}

		.gradient-background-cutoff {
			top: %2$spx;
		}

		.background-shadow-left, .background-shadow-right {
			height: %5$spx;
		}

		.gradient-background-cutoff {
			background-image: -webkit-gradient(linear, 50%% 0%%, 50%% 100%%, color-stop(0%%, %4$s), color-stop(100%%, %3$s));
			background-image: -moz-linear-gradient(%4$s 0%%, %3$s 100%%);
			background-image: -webkit-linear-gradient(%4$s 0%%, %3$s 100%%);
			background-image: linear-gradient(%4$s 0%%, %3$s 100%%);
		}



	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $background_size, $gradient_top, $background_color, $background_gradient, $shadow_height ) );

}

add_action( 'wp_enqueue_scripts', 'idaho_webmaster_customize_misc_css' );


function idaho_webmaster_check_color( $color ) {

	$color_index = array( 'header_textcolor', 'background_color', 'idaho_color_header_bg', 'idaho_color_link', 'idaho_color_primary', 'idaho_color_light_blue', 'idaho_color_ui_blue', 'idaho_color_secondary', 'idaho_color_nav_hover', 'idaho_color_home_panel' );

	$color_scheme    = idaho_webmaster_get_color_scheme();
	$default_color   = $color_scheme[ array_search( $color, $color_index ) ];
	$theme_color 		 = get_theme_mod( $color, $default_color );

	// Don't do anything if the current color is the default.
	if ( strtolower( $theme_color ) === strtolower( $default_color ) ) {
		return false;
	} else {
		return $theme_color;
	}
}

/**
 * Enqueues front-end CSS for the Header Text Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_header_textcolor_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_header_bg' );

	if ( ! $color ) {
		return;
	}

	$css = '
		/* Custom Header Text Color */

		#masthead .site-branding {
			background: %1$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_header_textcolor_css', 11 );


/**
 * Enqueues front-end CSS for the Data Table Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_data_table_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_data_table' );

	$color_bg 		= idaho_webmaster_shift_hsl_to( $color, '#eef7fb' );
	$color_border = idaho_webmaster_shift_hsl_to( $color, '#d9edf7' );

	if ( ! $color ) {
		return;
	}

	$css = '
		/* Custom DataTable Color */

		table.dataTable thead td {
			background: %1$s;
			border-color: %2$s;
		}

		.table-striped > thead > tr, table.dataTable tbody tr:first-child td {
			border-color: %2$s;
		}

		.table-hover > tbody > tr:hover {
			background: %2$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color_bg, $color_border ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_data_table_css', 11 );


/**
 * Enqueues front-end CSS for the Link Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_idaho_color_link_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_link' );

	if ( ! $color ) {
		return;
	}

	$css = '
		/* Custom Link Color */

		a,
		.navbar-default .navbar-nav>li>a,
		.pagination>li>a,
		a:hover,
		.pagination>li>a {
			color: %1$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_idaho_color_link_css', 11 );

/**
 * Enqueues front-end CSS for the Primary Button & Sub-Nav Hover Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_idaho_color_primary_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_primary' );

	if ( ! $color ) {
		return;
	}

	$css = '
		/* Custom Primary Button & Sub-Nav Hover Color */

		.dropdown-menu li a:hover {
			background: %1$s;
		}

		.btn.btn-primary {
			background	: %1$s;
			border-color: %1$s;
		}

    .widget-menu .nav-pills>li>a {
  		border-color: %3$s;
      color       : %1$s;
  	}

    .widget-menu .nav-pills>li>a:hover {
  		border-color: %1$s;
      color				: %4$s;
      background	: %1$s;
  	}

		.btn.btn-primary:hover {
			background	: %2$s;
			border-color: %2$s;
		}

		.btn.btn-default {
			border-color: %3$s;
		}

		.btn.btn-default:hover {
			background	: %1$s;
			border-color: %1$s;
			color				: %4$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color, idaho_webmaster_adjust_brightness( $color, -25 ), idaho_webmaster_adjust_brightness( $color, 99 ), idaho_webmaster_b_or_w( $color ) ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_idaho_color_primary_css', 11 );

/**
 * Enqueues front-end CSS for the Top Nav Border & Footer Background Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_idaho_color_ui_blue_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_ui_blue' );

	if ( ! $color ) {
		return;
	}

	$footer_links = ('#000000' === idaho_webmaster_b_or_w($color)) ? idaho_webmaster_adjust_brightness(idaho_webmaster_b_or_w($color), -25) : idaho_webmaster_adjust_brightness(idaho_webmaster_b_or_w($color), 25);

	$css = '
		/* Custom Top Nav Border & Footer Background Color */

		.site-footer {
			background: %1$s;
		}

		.navbar-default {
			border-color: %1$s;
		}

		#masthead .site-branding {
			border-bottom-color: %1$s;
		}

		.site-footer h3 {
			border-bottom: 1px solid %3$s;
			box-shadow: 0 1px 0 %2$s;
			color: %3$s;
		}

		.site-footer a {
			color: %4$s;
		}

		.site-footer a:hover {
			color: %3$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color, idaho_webmaster_b_or_w( $color ), idaho_webmaster_b_or_w( $color ), $footer_links ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_idaho_color_ui_blue_css', 11 );

/**
 * Enqueues front-end CSS for the Search Box & U.S. Map Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_idaho_color_light_blue_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_light_blue' );

	if ( ! $color ) {
		return;
	}

	$css = '
		/* Custom Search Box & U.S. Map Color */

		.search-form .input-group {
			border       : 4px solid %1$s;
			background   : %1$s;
		}

		.search-form .btn {
			background  : %1$s;
			border-color: %1$s;
			color: %2$s;
		}

		.search-form .btn:focus {
			background  : %1$s;
			border-color: %1$s;
			color: %2$s;
		}

		.search-form input.form-control  {
			border-color: %1$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color, idaho_webmaster_b_or_w( $color ) ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_idaho_color_light_blue_css', 11 );

/**
 * Enqueues front-end CSS for the Page Heading Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_idaho_color_secondary_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_secondary' );

	if ( ! $color ) {
		return;
	}

	$css = '
		/* Custom Page Heading Color */

		h2,
		h1.entry-title {
			color: %1$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_idaho_color_secondary_css', 11 );

/**
 * Enqueues front-end CSS for the Navigation Hover Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_idaho_color_nav_hover_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_nav_hover' );

	if ( ! $color ) {
		return;
	}

	$css = '
		/* Custom Navigation Hover Color */

		.navbar-default .navbar-nav>li>a:hover,
		.navbar-default .navbar-nav>li>a:focus,
		.sidebar-menu>ul>li>a:hover,
		.pagination>.active>a:hover {
			background: %1$s;
			color: %2$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color, idaho_webmaster_b_or_w( $color ) ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_idaho_color_nav_hover_css', 11 );

/**
 * Enqueues front-end CSS for the Home Panel Color.
 *
 * @since Idaho Webmaster 1.0
 *
 * @see wp_add_inline_style()
 */
function idaho_webmaster_idaho_color_home_panel_css() {

	$color = idaho_webmaster_check_color( 'idaho_color_home_panel' );

	if ( ! $color ) {
		return;
	}

	$css = '
		/* Custom Navigation Hover Color */

		.panel.panel-default.alt .panel-heading {
			background: %1$s;
			border-color: %1$s;
			color: %2$s;
		}

		.panel.panel-default.alt {
			border-color: %1$s;
		}
	';

	wp_add_inline_style( 'idaho-webmaster-style', sprintf( $css, $color, idaho_webmaster_b_or_w( $color ) ) );
}
add_action( 'wp_enqueue_scripts', 'idaho_webmaster_idaho_color_home_panel_css', 11 );
