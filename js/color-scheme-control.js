/* global colorScheme, Color */
/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.
 * Also trigger an update of the Color Scheme CSS when a color is changed.
 */

( function( api ) {
	var cssTemplate = wp.template( 'idaho-webmaster-color-scheme' ),
		colorSchemeKeys = [
			'header_textcolor',
			'background_color',
			'idaho_color_header_bg',
			'idaho_color_link',
			'idaho_color_primary',
			'idaho_color_light_blue',
			'idaho_color_ui_blue',
			'idaho_color_secondary',
			'idaho_color_nav_hover',
			'idaho_color_home_panel'
		],
		colorSettings = [
			'header_textcolor',
			'background_color',
			'idaho_color_header_bg',
			'idaho_color_link',
			'idaho_color_primary',
			'idaho_color_light_blue',
			'idaho_color_ui_blue',
			'idaho_color_secondary',
			'idaho_color_nav_hover',
			'idaho_color_home_panel'
		];

	api.controlConstructor.select = api.Control.extend( {
		ready: function() {
			if ( 'color_scheme' === this.id ) {
				this.setting.bind( 'change', function( value ) {
					var colors = colorScheme[value].colors;

					// Update Header Text Color
					var color = colors[0];
					api( 'header_textcolor' ).set( color );
					api.control( 'header_textcolor' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Background Color.
					color = colors[1];
					api( 'background_color' ).set( color );
					api.control( 'background_color' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Header Background Color.
					color = colors[2];
					api( 'idaho_color_header_bg' ).set( color );
					api.control( 'idaho_color_header_bg' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Link Color.
					color = colors[3];
					api( 'idaho_color_link' ).set( color );
					api.control( 'idaho_color_link' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Primary Button & Sub-Nav Hover Color.
					color = colors[4];
					api( 'idaho_color_primary' ).set( color );
					api.control( 'idaho_color_primary' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Search Box & U.S. Map Color.
					color = colors[5];
					api( 'idaho_color_light_blue' ).set( color );
					api.control( 'idaho_color_light_blue' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Top Nav Border & Footer Background Color
					color = colors[6];
					api( 'idaho_color_ui_blue' ).set( color );
					api.control( 'idaho_color_ui_blue' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Page Heading Color.
					color = colors[7];
					api( 'idaho_color_secondary' ).set( color );
					api.control( 'idaho_color_secondary' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Navigation Hover Color.
					color = colors[8];
					api( 'idaho_color_nav_hover' ).set( color );
					api.control( 'idaho_color_nav_hover' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

					// Update Home Panel Color.
					color = colors[9];
					api( 'idaho_color_home_panel' ).set( color );
					api.control( 'idaho_color_home_panel' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', color )
						.wpColorPicker( 'defaultColor', color );

				} );
			}
		}
	} );

	// Generate the CSS for the current Color Scheme.
	function updateCSS() {
		var scheme = api( 'color_scheme' )(),
			css,
			colors = _.object( colorSchemeKeys, colorScheme[ scheme ].colors );

		// Merge in color scheme overrides.
		_.each( colorSettings, function( setting ) {
			colors[ setting ] = api( setting )();
		} );

		css = cssTemplate( colors );

		api.previewer.send( 'update-color-scheme-css', css );
	}

	// Update the CSS whenever a color setting is changed.
	_.each( colorSettings, function( setting ) {
		api( setting, function( setting ) {
			setting.bind( updateCSS );
		} );
	} );
} )( wp.customize );
