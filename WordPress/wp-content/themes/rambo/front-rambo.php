<?php	
/**
Template Name:Business Home Page 
* @Theme Name	:	rambo
* @file         :	front-rambo.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/front-rambo.php
*/ 

	get_header();

	/****** get index banner  ********/
	get_template_part('index', 'banner') ;
	
	/****** get index service  ********/
	get_template_part('index', 'service') ;
	
	/****** get footer section *********/
	get_footer(); 
	
?>