jQuery( document ).ready( function() {
    pble_chosen();
    pble_select_option();
    pble_textarea_option();
} );

function pble_chosen() {
    jQuery( ".chosen-select, .mb-select" ).chosen( {
        disable_search_threshold: 5,
        no_results_text: "Nothing found!",
        width: "80%"
    } );
}

function pble_select_option() {
    jQuery( document ).on( 'change', '#pble-label', function() {
        pble_description( jQuery( this ) );
    } );
}

function pble_description( $this ) {
    if( $this.val() == "" ) {
        $this.siblings( '.description' ).text( "Here you will see the default label so you can copy it." );
    } else {
        $this.siblings( '.description' ).text( $this.val() );
    }
}

function pble_textarea_option() {
    jQuery( document ).on( 'change', '.wck-add-form #pble-label', function() {
        pble_textarea( jQuery( this ) );
    } );
}

function pble_textarea( $this ) {
    jQuery( '.wck-add-form .mb-textarea' ).text( $this.val() );
}

function pble_delete_all_fields(event, delete_all_button_id, nonce) {
    event.preventDefault();
    $deleteButton = jQuery('#' + delete_all_button_id);

    var response = confirm( "Are you sure you want to delete all items?" );

    if( response == true ) {
        $tableParent = $deleteButton.parents('table');

        var meta = $tableParent.attr('id').replace('container_', '');
        var post_id = parseInt( $tableParent.attr('post') );

        $tableParent.parent().css({'opacity':'0.4', 'position':'relative'}).append('<div id="mb-ajax-loading"></div>');

        jQuery.post( ajaxurl, { action: "pble_delete_all_fields", meta: meta, id: post_id, _ajax_nonce: nonce }, function(response) {

            /* refresh the list */
            jQuery.post( wckAjaxurl, { action: "wck_refresh_list"+meta, meta: meta, id: post_id}, function(response) {
                jQuery('#container_'+meta).replaceWith(response);
                $tableParent = jQuery('#container_'+meta);

                $tableParent.find('tbody td').css('width', function(){ return jQuery(this).width() });

                mb_sortable_elements();
                $tableParent.parent().css('opacity','1');

                jQuery('#mb-ajax-loading').remove();
            });

        });
    }
}