<?php
    /*
    Plugin Name: Profile Builder - Multiple Admin E-mails Add-On
    Plugin URI: http://www.cozmoslabs.com/wordpress-profile-builder/
    Description: Extends the functionality of Profile Builder by allowing you to set multiple admin e-mail addresses that will receive e-mail notifications sent by Profile Builder
    Version: 1.0.1
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
     * Function that populates the extra admin_emails value when the plugin is activated
     *
     * @since v.1.0.0
     */
    function wppb_mae_add_on_activation() {
        $wppb_generalSettings = get_option('wppb_general_settings');

        if( !isset( $wppb_generalSettings['admin_emails'] ) ){
            $wppb_generalSettings['admin_emails'] = get_option('admin_email');

            update_option( 'wppb_general_settings',  $wppb_generalSettings );
        }
    }
    register_activation_hook( __FILE__, 'wppb_mae_add_on_activation');


    /*
     * Function that adds the settings for Multiple Admin E-mails in
     * at the end of the other settings in Profile Builder General Settings tab
     *
     * @since v.1.0.0
     */
    function wppb_mae_extra_general_settings( $wppb_generalSettings ) {
        $admin_emails = '';
        if( !empty( $wppb_generalSettings['admin_emails'] ) )
            $admin_emails = $wppb_generalSettings['admin_emails'];

        $output = '';
        $output .= '<tr>';
            $output .= '<th scope="row">';
                $output .= __( 'Admin Emails:', 'profile-builder' );
            $output .= '</th>';

            $output .= '<td>';

                $output .= '<input class="wppb-text widefat" type="text" name="wppb_general_settings[admin_emails]" value="' . $admin_emails . '" />';

                $output .= '<p class="description">' . sprintf( __( 'Add email addresses, separated by comma, for people you wish to receive notifications from Profile Builder. These addresses will overwrite the default Email Adress from <a href="%s">Settings -> General</a>', 'profile-builder' ), get_site_url() . "/wp-admin/options-general.php" ) . '</p>';
            $output .= '</td>';
        $output .= '</tr>';

        echo $output;
    }
    add_action( 'wppb_extra_general_settings', 'wppb_mae_extra_general_settings' );


    /*
     * Function that checks if all the e-mails passed by the user are e-mails
     * If an invalid e-mail is found remove it from the list and add a settings error
     *
     * @since v.1.0.0
     */
    function wppb_mae_general_settings_sanitize_extra( $wppb_generalSettings ) {
        if( isset( $wppb_generalSettings['admin_emails'] ) && !empty( $wppb_generalSettings['admin_emails'] ) ) {
            $invalid_email = false;
            $invalid_email_count = 0;

            $admin_emails = explode(',', $wppb_generalSettings['admin_emails']);

            foreach( $admin_emails as $key => $admin_email ) {
                if( !is_email( trim( $admin_email ) ) ) {
                    $invalid_email = true;
                    $invalid_email_count++;

                    unset( $admin_emails[$key] );
                }
            }

            if( $invalid_email ) {
                $wppb_generalSettings['admin_emails'] = implode(',', $admin_emails );

                if( $invalid_email_count === 1 ) {
                    $invalid_email_is_are = __('is', 'profile-builder');
                    $invalid_email_has_have = __('has', 'profile-builder');
                } else {
                    $invalid_email_is_are = __('are', 'profile-builder');
                    $invalid_email_has_have = __('have', 'profile-builder');
                }

                add_settings_error( 'wppb_general_settings', 'invalid-email', sprintf( __( '%1$s of the emails provided in the Admin Emails field %2$s invalid and %3$s been removed from the list', 'profile-builder' ), $invalid_email_count, $invalid_email_is_are, $invalid_email_has_have ) );
            }
        }

        if( empty( $wppb_generalSettings['admin_emails'] ) ) {
            $wppb_generalSettings['admin_emails'] = get_option('admin_email');
        }

        return $wppb_generalSettings;
    }
    add_filter( 'wppb_general_settings_sanitize_extra', 'wppb_mae_general_settings_sanitize_extra' );


    /*
     * Function that modifies the mail to from the default wp admin to the
     * Admin E-mails
     *
     * @param string $to
     *
     * return string
     */
    function wppb_mae_overwrite_mail_to($to){
        $admin_email = get_option( 'admin_email' );
        $wppb_generalSettings = get_option('wppb_general_settings');

        if( isset( $wppb_generalSettings['admin_emails'] ) && !empty( $wppb_generalSettings['admin_emails'] ) && $admin_email == $to ){
            return $wppb_generalSettings['admin_emails'];
        } else {
            return $to;
        }
    }
    add_filter('wppb_send_email_to', 'wppb_mae_overwrite_mail_to');

?>