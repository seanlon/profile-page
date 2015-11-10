<?php
/*
Plugin Name: ScheduleMAX Online Scheduling
Plugin URI: http://www.schedulemax.com
Description: Add Online Scheduling to your blog.
Version: 1.5.0
Author: Mark Eckdahl
Author URI: http://blog.schedulemax.com

Shortcodes:
[schedulemax_button] - Button for launching pop-up booking wizard
[schedulemax_wizard] - Embed booking wizard in page/post

///////////////////////////////////////////////////
*/



function smax_admin() {
	include('sm-admin.php');
}

function smax_admin_actions() {
	add_options_page("ScheduleMAX Setup", "ScheduleMAX Setup", 1, "ScheduleMAXSetup", "smax_admin");
}


function schedulemax_embed_wp_meta(){
	smax_button();
}

// Add ScheduleMAX booking button directly in code
function smax_button() {  

	$slug = get_option('smax_slug');

	if ( $slug == '') {
		echo 'BOOKING BUTTON:<br><h6>Account Slug in Admin, Settings is blank.</h6><br>';
	} else {
    		//Show Schedule button 
    		echo '<iframe src="http://schedulemax.com/'.$slug.'/booking/button/" width="240" height="110" style="border:none;"> </iframe>';
	}

	return "";
}

// Add ScheduleMAX booking wizard directly in code
function smax_wizard() {  

	$slug = get_option('smax_slug');

	if ( $slug == '') {
		echo 'BOOKING WIZARD:<br><h6>Account Slug in Admin, Settings is blank.</h6><br>';
	} else {
    		//Show Schedule button 
    		echo '<iframe src="http://schedulemax.com/'.$slug.'/booking/embed/?reset" style="width:100%;height:600px;"></iframe>';
	}

	return "";
}
 
// Shortcode [schedulemax_button] implementation
function smax_shortcode_button( $atts ) {
	extract( shortcode_atts( array(
		'width' => '100%',
		'height' => '600',
	), $atts ) );

	$slug = get_option('smax_slug');

	if ( $slug == '') {
		return 'BOOKING BUTTON:<br><h6>Account Slug in Admin, Settings is blank.</h6><br>';
	} else {
    		//Show Schedule button 
    		return '<iframe src="http://schedulemax.com/'.$slug.'/booking/button/" width="240" height="110" style="border:none;"> </iframe>';
	}

	return "";
}

// Shortcode [schedulemax_wizard] implementation
function smax_shortcode_wizard( $atts ) {
	extract( shortcode_atts( array(
		'width' => '100%',
		'height' => '600',
	), $atts ) );

	$slug = get_option('smax_slug');

	if ( $slug == '') {
		return 'BOOKING WIZARD:<br><h6>Account Slug in Admin, Settings is blank.</h6><br>';
	} else {
    		//Show Schedule button 
		return '<iframe src="http://schedulemax.com/'.$slug.'/booking/embed/?reset" style="width:100%;height:600px;"></iframe>';
	}

	return "";
}

add_shortcode( 'schedulemax_button', 'smax_shortcode_button' );
add_shortcode( 'schedulemax_wizard', 'smax_shortcode_wizard' );

add_action('admin_menu', 'smax_admin_actions');

// This will add booking button to sidebar
//add_action('wp_meta', 'schedulemax_embed_wp_meta');

?>