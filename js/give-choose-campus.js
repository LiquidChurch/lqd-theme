/**
 * For Giving Page Functions File
 *
 * Processes campus selection from dropdown.
 */

jQuery( function( $ ) {
    "use strict";

    // bind change event to select
    $('#setup-gift-dropdown').on('change', function () {
        var url = $(this).val();
        if (url) {
            window.location = url; // redirect
        }
        return false;
    } )
} );