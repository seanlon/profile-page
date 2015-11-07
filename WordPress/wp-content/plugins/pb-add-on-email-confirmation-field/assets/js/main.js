/**
 * Function that adds the Email Confirmation field to the global fields object
 * declared in assets/js/jquery-manage-fields-live-change.js
 *
 */
function addEmailConfirmationField(){

    if (typeof fields == "undefined") {
        return false;
    }

    fields['Email Confirmation'] = {
        'show_rows'	:	[
            '.row-field-title',
            '.row-field',
            '.row-description',
            '.row-required'
        ]
        ,
        'required'	:	[
            true
        ]
        ,'properties':	{
            'meta_name_value'	: ''
        }
    };

}
jQuery( function() {
    addEmailConfirmationField();
    // we need run this again after adding the Email Confirmation field to the global fields object
    wppb_hide_properties_for_already_added_fields( '#container_wppb_manage_fields' );
});