<?php
/**
* @Theme Name	:	rambo
* @file         :	custom-sidebar.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
*/

add_action( 'widgets_init', 'rambo_widgets_init');
function rambo_widgets_init() {

/*sidebar*/
register_sidebar( array(
		'name' => __( 'Sidebar', 'rambo' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'rambo' ),
		'before_widget' => '<div class="sidebar_widget" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar_widget_title"><h2>',
		'after_title' => '</h2></div>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'rambo' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'rambo' ),
		'before_widget' => '<div class="span4 footer_widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h2>',
		'after_title' => '</h2></div>',
	) );
	
}	                     
?>