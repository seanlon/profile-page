<?php

/*
    Plugin Name: Profile Builder - Labels Edit Add-On
    Plugin URI: http://www.cozmoslabs.com/
	Description: This plugin enables editing of labels from Profile Builder.
	Author: Cozmoslabs, Cristophor Hurduban
	Version: 1.2
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

/* define plugin directory */
define( 'PBLE_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );

/* function that enqueues the necessary scripts */
function pble_scripts_and_styles( $hook ) {
	if( $hook == 'profile-builder_page_pb-labels-edit' ) {
		wp_enqueue_script( 'pble_init', plugin_dir_url( __FILE__ ) . 'assets/js/init.js', array( 'jquery' ) );
		wp_enqueue_script( 'pble_chosen', plugin_dir_url( __FILE__ ) . 'assets/chosen/chosen.jquery.min.js', array( 'jquery' ) );
		wp_enqueue_style( 'pble_chosen_css', plugin_dir_url( __FILE__ ) . 'assets/chosen/chosen.css' );
		wp_enqueue_style( 'pble_css', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'pble_scripts_and_styles' );

/* load required files */
require_once 'potx.php';
require_once 'inc/class-pble-import.php';
require_once 'inc/class-pble-export.php';

/* scan labels on plugin activate if not already scanned */
function pble_scan_on_plugin_activate() {
	$pble_check = get_option( 'pble_backup', 'not_set' );

	if( empty( $pble_check ) || $pble_check === 'not_set' ) {
		// use of output buffer to fix "headers already sent" notice on plugin activation
		ob_start();
		pble_scan_labels();
		$output = ob_get_clean();
	}
}
register_activation_hook( __FILE__, 'pble_scan_on_plugin_activate' );

/* scan pble labels */
function pble_scan_labels() {
	// create directory iterator
	$ite = new RecursiveDirectoryIterator( WPPB_PLUGIN_DIR );

	// todo: add filter so we can add files more easly
	// array with files to get strings from
	$pb_files_to_get = apply_filters( 'pb_files_to_get',
		array(
			'functions.php',
			'login.php',
			'recover.php',
			'register.php',
			'logout.php',
			'class-formbuilder.php',
			'edit-profile.php',
			'admin-approval.php',
			'email-confirmation.php',
			'userlisting.php',
			'email.php'
		)
	);

	global $wppb_strings;
	$wppb_strings = array();

	// loop through directory and get _e() and __() function calls
	foreach( new RecursiveIteratorIterator( $ite ) as $filename => $current_file ) {
		// http://php.net/manual/en/class.splfileinfo.php
		if( $current_file->getExtension() == "php" ) {
			if( in_array( $current_file->getBasename(), $pb_files_to_get ) ) {
				if( file_exists( $current_file ) ) {
					_wppb_potx_process_file( $current_file->getRealPath(), 0, '_output_str2' );
				}
			}
		}
	}

	update_option( 'pble_backup', $wppb_strings );
}

// populate array with Profile Builder labels
function _output_str2( $str ) {
	global $wppb_strings;
	if( is_array( $wppb_strings ) && ! in_array( $str, $wppb_strings ) ) {
		$wppb_strings[] = $str;
	}
}

/* scan pble labels on Rescan button click */
function pble_rescan() {
	if( isset( $_POST['rescan'] ) && $_POST['rescan'] ) {
		pble_scan_labels();
	}
}
add_action( 'init', 'pble_rescan' );

/* rescan success message */
function rescan_success_message() {
	if( isset( $_POST['rescan'] ) && $_POST['rescan'] ) {
		global $wppb_strings;
		$wppb_strings_count = count( $wppb_strings );

		$rescan_message = '<div id="message" class="updated"><p>' . $wppb_strings_count . __(' labels scanned.', 'pble') . '</p></div>';
		echo $rescan_message;
	}
}
add_action( 'admin_notices', 'rescan_success_message' );

/*
 * change text strings
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function pble_text_strings( $translated_text, $text, $domain ) {
	$edited_labels = get_option( 'pble' );

	if( empty( $edited_labels ) || $edited_labels === 'not_set' ) {
		return $translated_text;
	}

	if( is_array( $edited_labels ) && ! empty( $edited_labels ) ) {
		foreach( $edited_labels as $inner_array ) {
			if( $text == $inner_array['pble-label'] ) {
				$translated_text = $inner_array['pble-newlabel'];
			}
		}
	}

	return $translated_text;
}
add_filter( 'gettext', 'pble_text_strings', 20, 3 );

/* PB Labels Edit subpage content function */
function pble_page() {
	// create Labels Edit page
	$args = array(
		'menu_title' 	=> __( 'Labels Edit', 'pble' ),
		'page_title' 	=> __( 'Labels Edit', 'pble' ),
		'menu_slug'		=> 'pb-labels-edit',
		'page_type'		=> 'submenu_page',
		'capability'	=> 'manage_options',
		'priority'		=> 5,
		'parent_slug'	=> 'profile-builder'
	);
	if( class_exists( 'WCK_Page_Creator_PB' ) ) {
		new WCK_Page_Creator_PB( $args );
	}

	// array with Profile Builder strings to edit
	$wppb_strings = get_option( 'pble_backup' );
	// $pble_edited_labels = get_option( 'pble' );

	$pble_labels = array();
	// $edited_value = array();

	// todo: edited labels removed from select array
	/*if( ! empty( $pble_edited_labels ) ) {
		foreach( $pble_edited_labels as $edited_values ) {
			$edited_value[] = $edited_values['pble-label'];
		}
	}*/

	// populate array for select with Profile Builder strings
	if( ! empty( $wppb_strings ) && is_array( $wppb_strings ) ) {
		foreach( $wppb_strings as $key => $value ) {
			// if( ! in_array( $value, $edited_value ) ) {
			$pble_labels[] = str_replace( '%', '&#37;', $value );
			// }
		}
	}

	// array with fields for Edit Labels metabox
	$pble_fields = array(
		array( 'type' => 'select', 'slug' => 'pble-label', 'title' => __( 'Label to Edit', 'pble' ), 'default-option' => true, 'options' => $pble_labels, 'description' => 'Here you will see the default label so you can copy it.' ),
		array( 'type' => 'textarea', 'slug' => 'pble-newlabel', 'title' => __( 'New Label', 'pble' ) ),
	);

	// create Edit Labels metabox
	$pble_args = array(
		'metabox_id' 	=> 'pble-id',
		'metabox_title' => __( 'Edit Labels', 'pble' ),
		'post_type' 	=> 'pb-labels-edit',
		'meta_name' 	=> 'pble',
		'meta_array' 	=> $pble_fields,
		'context'		=> 'option'
	);
	if( class_exists( 'Wordpress_Creation_Kit_PB' ) ) {
		new Wordpress_Creation_Kit_PB( $pble_args );
	}
}
add_action( 'init', 'pble_page', 11 );

// add Rescan side meta-box
function pble_side_metabox() {
	add_meta_box(
		'pble-id-side',
		__( 'Rescan Lables', 'pble' ),
		'pble_rescan_button',
		'profile-builder_page_pb-labels-edit',
		'side'
	);
}
add_action( 'add_meta_boxes', 'pble_side_metabox' );

// Rescan side meta-box content
function pble_rescan_button() {
	?>
	<div class="wrap">
		<p>Rescan all Profile Builder labels.</p>

		<form action="" method="post">
			<input type="submit" class="button-primary" name="rescan" value="Rescan" />
		</form>
	</div>
<?php
}

// add Informations side meta-box
function pble_info_side_metabox() {
	add_meta_box(
		'pble-id-side-info',
		__( 'Informations', 'pble' ),
		'pble_info',
		'profile-builder_page_pb-labels-edit',
		'side'
	);
}
add_action( 'add_meta_boxes', 'pble_info_side_metabox' );

// Informations side meta-box content
function pble_info() {
	?>
	<div class="wrap">
		<p><b>Variables:</b></p>
		<ul>
			<li>%1$s</li>
			<li>%2$s</li>
			<li>%s</li>
			<li>etc.</li>
		</ul>
		<p><b>Place them like in the default string!</b></p>
		<p>Example:</p>
		<p>
			<b>Old Label:</b><br>in %1$d sec, click %2$s.%3$s<br>
			<b>New Label:</b><br>click %2$s.%3$s in %1$d sec<br>
		</p>
		<a href="http://www.cozmoslabs.com/?p=40126">Read more detailed informations</a>
	</div>
<?php
}

// add Import and Export side meta-box
function pble_impexp_metabox() {
	add_meta_box(
		'pble-id-side-impexp',
		__( 'Import and Export Labels', 'pble' ),
		'pble_impexp_content',
		'profile-builder_page_pb-labels-edit',
		'side'
	);
}
add_action( 'add_meta_boxes', 'pble_impexp_metabox' );

// Import and Export side meta-box content
function pble_impexp_content() {
	// call import function
	pble_import();
	?>
	<p>
		<?php _e( 'Import Labels from a .json file.', 'pble' ); ?>
		<br>
		<?php _e( 'Easily import the labels from another site.', 'pble' ); ?>
	</p>
	<form name="pble-upload" method="post" action="" enctype= "multipart/form-data">
		<div class="wrap">
			<input type="file" name="pble-upload" value="pble-upload" id="pble-upload" />
		</div>
		<div class="wrap">
			<input class="button-primary" type="submit" name="pble-import" value=<?php _e( 'Import', 'pble' ); ?> id="pble-import" onclick="return confirm( '<?php _e( 'This will overwrite all your old edited labels! \n\rAre you sure you want to continue?', 'pble' ); ?>' )" />
		</div>
	</form>
	<hr>
	<p>
		<?php _e( 'Export Labels as a .json file.', 'pble' ); ?>
		<br>
		<?php _e( 'Easily import the labels into another site.', 'pble' ); ?>
	</p>
	<div class="wrap">
		<form action="" method="post"><input class="button-primary" type="submit" name="pble-export" value=<?php _e( 'Export', 'pble' ); ?> id="pble-export" /></form>
	</div>
<?php
}

/* function that check for already edited labels */
function pble_check_for_errors( $message, $fields, $required_fields, $meta_name, $posted_values, $post_id ) {
	if ( $meta_name == 'pble' ) {
		/* todo: broken check for added fields so you can't edit same label twice - fix it for future version
		$pble_posted_labels = get_option( $meta_name, 'not_set' );
		$posted_labels = array();


		if( ! empty( $pble_posted_labels ) ) {
			foreach( $pble_posted_labels as $label ) {
					$posted_labels[] = $label['pble-label'];
			}

			if( ( in_array( $posted_values['pble-label'], $posted_labels ) ) ) {
				$message = __( "This label is already edited!", 'pble' );
			}
		}
		*/

		if( $posted_values['pble-label'] == '' ) {
			$message = __( "You must select a label to edit!", 'pble' );
		}
	}
	return $message;
}
add_filter( 'wck_extra_message', 'pble_check_for_errors', 10, 6 );

/* function that change table header */
function pble_header( $list_header ){
	$delete_all_nonce = wp_create_nonce( 'pble-delete-all-entries' );

	return '<thead><tr><th class="wck-number">#</th><th class="wck-content">'. __( 'Labels', 'pble' ) .'</th><th class="wck-edit">'. __( 'Edit', 'pble' ) .'</th><th class="wck-delete"><a id="wppb-delete-all-fields" class="wppb-delete-all-fields" onclick="pble_delete_all_fields(event, this.id, \'' . esc_js($delete_all_nonce) . '\')" title="' . __('Delete all', 'pble') . '" href="#">'. __( 'Delete all', 'pble' ) .'</a></th></tr></thead>';
}
add_action( 'wck_metabox_content_header_pble', 'pble_header' );

/* function that delete all edited labels */
add_action("wp_ajax_pble_delete_all_fields", 'pble_delete_all_fields_callback' );
function pble_delete_all_fields_callback(){
	check_ajax_referer( "pble-delete-all-entries" );
	if( ! empty( $_POST['meta'] ) )
		$meta_name = $_POST['meta'];
	else
		$meta_name = '';

	if( $meta_name == 'pble' ) {
		delete_option( 'pble' );
	}
	exit;
}

/* function that calls chosen after refresh */
function chosen_pble( $id ) {
	echo "<script type=\"text/javascript\">pble_chosen(); pble_description( jQuery( '.update_container_pble .mb-select' ) ); </script>";
}
add_action( "wck_ajax_add_form_pble", "chosen_pble" );
add_action( "wck_after_adding_form_pble", "chosen_pble" );

/* import class arguments and call */
function pble_import() {
	if( isset( $_POST['pble-import'] ) && $_POST['pble-import'] ) {
		if( isset( $_FILES['pble-upload'] ) && $_FILES['pble-upload'] ) {
			$pble_args = array(
				'pble'
			);

			$pble_json_upload = new PBLE_Import( $pble_args );
			$pble_json_upload->upload_json_file();
			/* show error/success messages */
			$pble_messages = $pble_json_upload->get_messages();
			foreach ( $pble_messages as $pble_message ) {
				echo '<div id="message" class=' . $pble_message['type'] . '><p>' . $pble_message['message'] . '</p></div>';
			}
		}
	}
}

/* export class arguments and call */
add_action( 'admin_init', 'pble_export' );
function pble_export() {
	if( isset( $_POST['pble-export'] ) && $_POST['pble-export'] ) {
		$check_export = get_option( 'pble', 'not_set' );
		if( empty( $check_export ) || $check_export === 'not_set' ) {
			echo '<div id="message" class="error"><p>' . __('No labels edited, nothing to export!', 'pble') . '</p></div>';
		} else {
			$pble_args = array(
				'pble'
			);

			$pble_prefix = 'PBLE_';
			$pble_json_export = new PBLE_Export( $pble_args );
			$pble_json_export->download_to_json_format( $pble_prefix );
		}
	}
}