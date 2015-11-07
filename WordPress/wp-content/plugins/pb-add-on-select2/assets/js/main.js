
/**
 * Function that adds the Select2 field to the global fields object
 * declared in assets/js/jquery-manage-fields-live-change.js
 *
 * @since v.1.0.0
 */
function wppb_sl2_add_field() {
    if (typeof fields == "undefined") {
        return false;
    }
    fields["Select2"] = {
        'show_rows'	:	[
            '.row-field-title',
            '.row-meta-name',
            '.row-description',
            '.row-default-option',
            '.row-required',
            '.row-overwrite-existing',
            '.row-options',
            '.row-labels'
        ]
    };
}

jQuery( function() {
    wppb_sl2_add_field();
});
