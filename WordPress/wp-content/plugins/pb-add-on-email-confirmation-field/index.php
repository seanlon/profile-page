<?php
/*
Plugin Name: Profile Builder - Email Confirmation Field
Plugin URI: http://www.cozmoslabs.com/wordpress-profile-builder/
Description: Adds an Email Confirmation field in the Manage Fields list from Profile Builder
Version: 1.0.2
Author: Cozmoslabs, Adrian Spiac
Author URI: http://www.cozmoslabs.com/
License: GPL2

== Copyright ==
Copyright 2014 Cozmoslabs (www.cozmoslabs.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

// Function that enqueues the necessary scripts
function wppb_ecf_scripts()
{
    wp_enqueue_script('wppb-ecf', plugin_dir_url(__FILE__) . 'assets/js/main.js', array('jquery', 'wppb-manage-fields-live-change'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'wppb_ecf_scripts');

//Add Email Confirmation field in the backend fields drop-down select
add_filter('wppb_manage_fields_types', 'wppb_ecf_add_email_confirmation_field');

// Add Email Confirmation field to the unique fields list + skip check for empty meta
add_filter('wppb_unique_field_list', 'wppb_ecf_add_email_confirmation_field');

function wppb_ecf_add_email_confirmation_field($fields)
{
    $fields[] = 'Email Confirmation';
    return $fields;
}


/* handle field output */
function wppb_ecf_email_confirmation_handler( $output, $form_location, $field, $user_id, $field_check_errors, $request_data ){
    if ( $field['field'] == 'Email Confirmation' ) {
        $item_title = apply_filters( 'wppb_' .$form_location.'_email_confirmation_custom_field_'.$field['id'].'_item_title', wppb_icl_t( 'plugin profile-builder-pro', 'custom_field_'.$field['id'].'_title_translation', $field['field-title'] ) );
        $item_description = wppb_icl_t( 'plugin profile-builder-pro', 'custom_field_'.$field['id'].'_description_translation', $field['description'] );

		$extra_attr = apply_filters( 'wppb_extra_attribute', '', $field );

        if( $form_location == 'edit_profile' )
            $input_value = get_the_author_meta( 'user_email', $user_id );
        else
            $input_value = '';

        $input_value = ( isset( $request_data['wppb_email_confirmation'] ) ? trim( $request_data['wppb_email_confirmation'] ) : $input_value );

        $error_mark = (($field['required'] == 'Yes') ? '<span class="wppb-required" title="' . wppb_required_field_error($field["field-title"]) . '">*</span>' : '');
        if (array_key_exists($field['id'], $field_check_errors))
            $error_mark = '<img src="' . WPPB_PLUGIN_URL . 'assets/images/pencil_delete.png" title="' . wppb_required_field_error($field["field-title"]) . '"/>';

        $output = '
		    <label for="wppb_email_confirmation">'.$item_title.$error_mark.'</label>
			<input class="extra_field_email_confirmation" name="wppb_email_confirmation" type="text" id="wppb_email_confirmation" value="'. esc_attr( wp_unslash( $input_value ) ) .'" '. $extra_attr .'/>';
        if( !empty( $item_description ) )
            $output .= '<span class="wppb-description-delimiter">'.$item_description.'</span>';

        return apply_filters( 'wppb_'.$form_location.'_email_confirmation_custom_field_'.$field['id'], $output, $form_location, $field, $user_id, $field_check_errors, $request_data, $input_value );
    }
}
add_filter( 'wppb_output_form_field_email-confirmation', 'wppb_ecf_email_confirmation_handler', 10, 6 );


/* handle field validation */
function wppb_ecf_check_email_value( $message, $field, $request_data, $form_location ){
    if( $field['field'] == 'Email Confirmation' ) {
        if ((isset($request_data['wppb_email_confirmation']) && (trim($request_data['wppb_email_confirmation']) == '')) && ($field['required'] == 'Yes'))
            return wppb_required_field_error($field["field-title"]);

        if ( (isset($request_data['wppb_email_confirmation'])) && ($field['required'] == 'Yes') && ( $request_data['email'] != $request_data['wppb_email_confirmation']) ) {
            return __('The email confirmation does not match your email address.', 'profilebuilder');
        }
    }
    return $message;
}
add_filter( 'wppb_check_form_field_email-confirmation', 'wppb_ecf_check_email_value', 10, 4 );


//Remove Email Confirmation field from UserListing merge tags (available Meta and Sort Variables list)
function wppb_ecf_remove_email_confirmation_from_userlisting($manage_fields){
    foreach ($manage_fields as $key => $value){
        if ($value['field'] == 'Email Confirmation') unset($manage_fields[$key]);
    }
    return array_values($manage_fields);
}
add_filter('wppb_userlisting_merge_tags', 'wppb_ecf_remove_email_confirmation_from_userlisting');

//Remove Email Confirmation field from the backend fields listing (runs at plugin deactivation -> register_deactivation_hook)
function wppb_ecf_remove_email_confirmation_field()
{
    if (get_option('wppb_manage_fields')) {
        $wppb_manage_fields = get_option('wppb_manage_fields');
        foreach ($wppb_manage_fields as $key => $value) {
            if ($value['field'] == 'Email Confirmation')
                unset($wppb_manage_fields[$key]);
        }
        update_option('wppb_manage_fields', array_values($wppb_manage_fields));
    }
}
register_deactivation_hook(__FILE__, 'wppb_ecf_remove_email_confirmation_field');