<?php

/*
    Plugin Name: Profile Builder - Placeholder Labels Add-On
    Plugin URI: http://www.cozmoslabs.com/
	Description: This plugin transform labels of Profile Builder forms into placeholders.
	Author: Cozmoslabs, Cristophor Hurduban
	Version: 2.0
	Author URI: http://www.cozmoslabs.com
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


/* Define plugin directory */
define( 'PBPL_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );


/*
 * Function that enqueues the necessary scripts in the front-end area
 *
 * @since v.1.0
 *
 */
function pbpl_scripts_and_styles() {
	if( file_exists( PBPL_PLUGIN_DIR . '/assets/css/style.css' ) ) {
		wp_enqueue_style( 'pbpl_css', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
	}

	if( is_rtl() ) {
		if( file_exists( PBPL_PLUGIN_DIR . '/assets/css/rtl.css' ) ) {
			wp_enqueue_style( 'pbpl_css_rtl', plugin_dir_url( __FILE__ ) . 'assets/css/rtl.css' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'pbpl_scripts_and_styles' );


/*
 * Function that adds a new class to each form field
 *
 * @since v.1.0
 *
 * @param string		$field		Contain the class of each form field
 *
 * @return string
 */
function pbpl_field_css_class( $field ) {
	$css_class = $field . ' pbpl-class';

	return $css_class;
}


/*
 * Function that adds a new placeholder attribute to each form field
 *
 * @since v.1.0
 *
 * @param array		$field		Contain each form field
 *
 * @return string
 */
function pbpl_extra_attribute( $extra_attribute, $field ) {
	$extra_attr_only_for = array(
		'Default - Username',
		'Default - First Name',
		'Default - Last Name',
		'Default - Nickname',
		'Default - E-mail',
		'Default - Website',
		'Default - Password',
		'Default - Repeat Password',
		'Default - Biographical Info',
		'Input',
		'Textarea',
		'Email Confirmation',
	);

	if( ! empty ( $field ) && in_array( $field['field'], $extra_attr_only_for ) ) {
		$extra_attribute .= 'placeholder = "' . $field['field-title'] . ( ( $field['required'] == 'Yes' ) ? '*' : '' ) . '"';
	}

	return $extra_attribute;
}


/*
 * Function that adds a new placeholder attribute to each WooCommerce Add-on form field
 *
 * @since v.1.1
 *
 * @param array		$field		Contain each form field
 *
 * @return string
 */
function pbpl_woo_extra_attribute( $extra_attribute, $field ) {
	$extra_attribute .= 'placeholder = "' . $field['label'] . ( ( $field['required'] == 'Yes' ) ? '*' : '' ) . '"';

	return $extra_attribute;
}


/*
 * Function that adds a Meta Box on each edit Register and Edit-Profile forms when Multiple Forms are active
 *
 * @since v.2.0
 *
 */
function pbpl_add_meta_boxes() {
	$pbpl_pb_moduleSettings = get_option( 'wppb_module_settings', 'not_found' );

	if( $pbpl_pb_moduleSettings['wppb_multipleRegistrationForms'] != 'not_found' && $pbpl_pb_moduleSettings['wppb_multipleRegistrationForms'] == 'show' ) {
		add_meta_box( 'pbpl-rf-side', __( 'Placeholder Labels', 'pbpl' ), 'pbpl_meta_box_content', 'wppb-rf-cpt', 'side', 'low' );
	}

	if( $pbpl_pb_moduleSettings['wppb_multipleEditProfileForms'] != 'not_found' && $pbpl_pb_moduleSettings['wppb_multipleEditProfileForms'] == 'show' ) {
		add_meta_box( 'pbpl-epf-side', __( 'Placeholder Labels', 'pbpl' ), 'pbpl_meta_box_content', 'wppb-epf-cpt', 'side', 'low' );
	}
}
add_action( 'add_meta_boxes', 'pbpl_add_meta_boxes' );


/*
 * Function that adds content to Meta Boxes on each edit Register and Edit-Profile forms
 *
 * @since v.2.0
 *
 * @param object		$post		Contain the post data
 */
function pbpl_meta_box_content( $post ) {
	$pbpl_select_value = get_post_meta( $post->ID, 'pbpl-active', true );

	?>
	<div class="wrap">
		<p>
			<label for="pbpl-active" ><?php _e( 'Replace labels with placeholders:', 'pbpl' ) ?></label>
		</p>
		<select name="pbpl-active" id="pbpl-active" class="mb-select">
			<option value="yes" <?php selected( $pbpl_select_value, 'yes' ); ?>><?php _e( 'Yes', 'pbpl' ) ?></option>
			<option value="no" <?php selected( $pbpl_select_value, 'no' ); ?>><?php _e( 'No', 'pbpl' ) ?></option>
		</select>
	</div>
<?php
}


/*
 * Function that saves the Meta Box option
 *
 * @since v.2.0
 *
 */
function pbpl_save_meta_box_option() {
	global $post;

	if( isset( $_POST['pbpl-active'] ) ) {
		$pbpl_select_value = $_POST['pbpl-active'];

		update_post_meta( $post->ID, 'pbpl-active', $pbpl_select_value );
	}
}
add_action( 'save_post', 'pbpl_save_meta_box_option' );


/*
 * Function that activate or deactivate replacement of labels with placeholders in form
 *
 * @since v.2.0
 *
 * @param array		$form		Contain the form args
 */
function pbpl_activate( $form ) {
	$pbpl_pb_moduleSettings = get_option( 'wppb_module_settings', 'not_found' );

	if( ( $pbpl_pb_moduleSettings['wppb_multipleRegistrationForms'] != 'not_found' && $pbpl_pb_moduleSettings['wppb_multipleRegistrationForms'] == 'show' ) || ( $pbpl_pb_moduleSettings['wppb_multipleEditProfileForms'] != 'not_found' && $pbpl_pb_moduleSettings['wppb_multipleEditProfileForms'] == 'show' ) ) {
		$pbpl_form_id = pbpl_get_id_by_post_name( $form['form_name'] );

		$pbpl_saved_value = get_post_meta( $pbpl_form_id, 'pbpl-active', true );

		if( $pbpl_saved_value == 'no' ) {
			return;
		} else {
			pbpl_add_filters();
		}
	} else {
		pbpl_add_filters();
	}
}
add_action( 'wppb_form_args_before_output', 'pbpl_activate' );


/*
 * Function that uses a custom query that retrieves ID based on post_name
 *
 * @since v.2.0
 *
 * @param string		$post_name		Contain the post_name of Profile Builder form
 *
 * @return string
 */
function pbpl_get_id_by_post_name( $post_name ) {
	global $wpdb;

	$id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = '" . $post_name . "'" );

	return $id;
}


/*
 * Function that adds the necessary filters
 *
 * @since v.2.0
 *
 */
function pbpl_add_filters() {
	add_filter( 'wppb_field_css_class', 'pbpl_field_css_class', 10, 1 );
	add_filter( 'wppb_extra_attribute', 'pbpl_extra_attribute', 10, 2 );
	add_filter( 'wppb_woo_extra_attribute', 'pbpl_woo_extra_attribute', 10, 2 );
}