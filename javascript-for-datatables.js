// The description data we want to display
function format () {
    return '<?php echo get_the_content() ?>';
}

jQuery(document).ready( function () {
     jQuery('#groups').DataTable( {
         paging: false,
         responsive: true,
         fixedHeader: {
             header: true,
             footer: false
         },
         scrollY: false
     });
    jQuery('#groups').on('click', 'td.details-control', function() {
        var tr = jQuery(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // Row open, close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Row closed, open it
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } )
 } );
