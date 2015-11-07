<?php
add_action('admin_menu', 'rambo_admin_menu_pannel');  
function rambo_admin_menu_pannel()
 {	$page=add_theme_page( 'theme', 'Option Panel', 'edit_theme_options', 'rambo', 'rambo_option_panal_function' ); 
 	add_action('admin_print_styles-'.$page, 'rambo_admin_enqueue_script');
 }
function rambo_admin_enqueue_script()
{	
	wp_enqueue_script('tab',get_template_directory_uri().'/functions/theme_options/js/option-panel-js.js',array('media-upload','thickbox'));
	wp_enqueue_style('thickbox');
	wp_enqueue_style('option',get_template_directory_uri().'/functions/theme_options/css/style-option.css');
	wp_enqueue_style('comp-chart',get_template_directory_uri().'/functions/theme_options/css/comp-chart.css');
	//upgrade to pro css and js	
	wp_enqueue_script( 'bootstrap-modal', get_template_directory_uri() . '/functions/theme_options/js/bootstrap-modal.js');
	wp_enqueue_style('upgrade',get_template_directory_uri().'/functions/theme_options/css/upgrade-pro.css');
}
function rambo_option_panal_function()
{	
	// option panel
	require_once('webriti_option_pannel.php');
}
?>