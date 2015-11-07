<?php
    /*
    Plugin Name: Profile Builder - Maximum Character Length Add-On
    Plugin URI: http://www.cozmoslabs.com/wordpress-profile-builder/
    Description: Extends the functionality of Profile Builder by allowing you to set a maximum character length for the custom input and textarea fields.
    Version: 1.0.0
    Author: Cozmoslabs, Mihai Iova
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

    /*
     * Function that enqueues the necessary scripts
     *
     * @since v.1.0.0
     */
    function wppb_max_char_length_scripts() {
        wp_enqueue_script( 'wppb-max-char-length', plugin_dir_url(__FILE__) . 'assets/js/main.js', array( 'jquery', 'wppb-manage-fields-live-change' ) );
    }
    add_action( 'admin_enqueue_scripts', 'wppb_max_char_length_scripts' );

    /*
     * Function that adds maximum character length to the field properties in manage fields
     *
     * @since v.1.0.0
     *
     * @param array $fields - The current field properties
     *
     * @return array        - The field properties that now include the maximum character length property
     */
    function wppb_max_char_length_manage_field( $fields ) {
        $max_length_manage_field = array( 'type' => 'text', 'slug' => 'maximum-character-length', 'title' => __( 'Maximum Character Length', 'profile-builder' ), 'description' => __( "Specify the maximum number of characters a user can type in this field", 'profile-builder' ) );
        array_push( $fields, $max_length_manage_field );

        return $fields;
    }
    add_filter( 'wppb_manage_fields', 'wppb_max_char_length_manage_field' );

    /*
     * Function that checks to see if the maximum character length that the user entered is
     * a number, we don't want random strings
     *
     * @since v.1.0.0
     *
     * @param string $message           - The error messages that will be displayed to the user
     * @param array $posted_values      - The information the user has entered for the field
     *
     * @return string
     */
    function wppb_check_max_char_length( $message, $posted_values ) {

        if ( isset( $posted_values['maximum-character-length'] ) && !is_numeric( $posted_values['maximum-character-length'] ) && !empty( $posted_values['maximum-character-length'] ) )
            $message .= __( "The entered character number is not numerical\n", 'profile-builder' );

        return $message;
    }
    add_filter( 'wppb_check_extra_manage_fields', 'wppb_check_max_char_length', 10, 2 );

    /*
     * Function that changes the default maximum character length with the one
     * the user has set
     *
     * @since v.1.0.0
     *
     * @param int $default_value
     * @param array $field
     *
     * @return int
     */
    function wppb_set_max_char_length( $default_value, $field = '' ) {
        $output = $default_value;

        if( isset( $field['maximum-character-length'] ) && !empty( $field['maximum-character-length'] ) ) {
            $output = (int)$field['maximum-character-length'];
        }

        return $output;
    }
    add_filter( 'wppb_maximum_character_length', 'wppb_set_max_char_length', 10 , 2);
?>