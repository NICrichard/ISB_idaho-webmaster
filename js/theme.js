jQuery( document ).ready( function ( $ ) {
	var anchor = window.location.hash.replace( "#", "" );

	if ( anchor && anchor !== '' ) {
		$( ".collapse" ).collapse( 'hide' );
		$( "#" + anchor ).find( '.collapse' ).collapse( 'show' );
	}
} );