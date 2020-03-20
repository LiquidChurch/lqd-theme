/**
 * Live-update changed settings in real time in the Customizer preview.
 */

( function( $ ) {
	var style = $( '#liquidchurch-color-scheme-css' );

	if ( ! style.length ) {
		style = $( 'head' ).append( '<style type="text/css" id="liquidchurch-color-scheme-css" />' )
		                    .find( '#liquidchurch-color-scheme-css' );
	}

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Add custom-background-image body class when background image is added.
	wp.customize( 'background_image', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).toggleClass( 'custom-background-image', '' !== to );
		} );
	} );

	// Color Scheme CSS.
	wp.customize.bind( 'preview-ready', function() {
		wp.customize.preview.bind( 'update-color-scheme-css', function( css ) {
			style.html( css );
		} );
	} );
} )( jQuery );
