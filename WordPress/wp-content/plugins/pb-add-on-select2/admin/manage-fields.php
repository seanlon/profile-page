<?php

    /*
     * Function that ads the new Select2 field to the fields list
     * and also the list of fields that skip the meta-name check
     *
     * @since v.1.0.0
     *
     * @param array $fields     - The names of all the fields
     *
     * @return array
     *
     */
    function wppb_sl2_manage_field_types( $fields ) {
        $fields[] = 'Select2';

        return $fields;
    }
    add_filter( 'wppb_manage_fields_types', 'wppb_sl2_manage_field_types' );
    add_filter( 'wppb_skip_check_for_fields', 'wppb_sl2_manage_field_types' );
?>