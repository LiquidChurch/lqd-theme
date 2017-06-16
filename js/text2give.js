/**
 * Text2Give Functions File
 *
 * Mobile Landing Page Functions File
 */

jQuery( function( $ ) {
    "use strict";

    // bind change event to select
    $('#text2give').on('change', function () {
        var url = $(this).val();
        if (url) {
            window.location = url; // redirect
        }
        return false;
    } )
} );