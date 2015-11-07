<?php
/*---------------------------------------------------------------------------------*
 * @file           	theme_stup_data.php
 * @package        	Rambo
 * @copyright      	2013 rambo
 * @license        	license.txt
 * @author       	webriti
 * @filesource     	wp-content/themes/rambo-pro/theme_setup_data.php
 *	Admin  & front end default data file 
 *-----------------------------------------------------------------------------------*/ 
function theme_data_setup()
{
	$slide_image_uri =WEBRITI_TEMPLATE_DIR_URI .'/images/default/slide/slide.png';
	return $rambo_theme_options=array(
			//Logo and Fevicon header			
			
			'rambo_stylesheet'=>'default.css',			
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'150',
			'rambo_texttitle'=>'on',
			'upload_image_favicon'=>'',			
			'webrit_custom_css'=>'',
			
			//Home image section 	
			'home_banner_enabled'=>'on',
			'home_custom_image' => $slide_image_uri,								
			'home_image_title' => __('Theme Feature Goes Here!','rambo'),
			'home_image_description' => __('Rambo makes content easy to view on any device with any resolution. You may check this with resizing. Fully Responsive Theme Amazing Design.','rambo'),	
			
			// service
			'home_service_enabled'=>'on',
			'home_service_one_icon'=>'fa-tachometer',
			'home_service_one_title'=>__('Service One','rambo'),
			'home_service_one_description'=>__('Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem','rambo'),
			
			'home_service_two_icon'=>'fa-film',
			'home_service_two_title'=>__('Service Two','rambo'),
			'home_service_two_description'=>__('Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem','rambo'),
			
			'home_service_three_icon'=>'fa-fighter-jet',
			'home_service_three_title'=>__('Service Three','rambo'),
			'home_service_three_description'=>__('Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem','rambo'),
			
			'home_service_fourth_icon'=>'fa-flag-checkered',
			'home_service_fourth_title'=>__('Service Four','rambo'),
			'home_service_fourth_description'=>__('Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem','rambo'),
			
			// footer customization
			'footer_widgets_enabled'=>'on',
			'rambo_copy_rights_text'=>__('&copy;2013&nbsp;ALL Rights Reserved','rambo'),			
			'rambo_designed_by_head'=>__('Designed By','rambo'),
			'rambo_designed_by_text'=>__('Webriti','rambo'),
			'rambo_designed_by_link'=>'http://www.webriti.com',			
				
			
			//Social media links
			'footer_social_media_enabled'=>'on',
			'social_media_twitter_link' =>"https://twitter.com/",
			'social_media_facebook_link' =>"https:www.facebook.com",
			'social_media_linkedin_link' =>"http://linkedin.com/",
			'social_media_google_plus' =>"https://plus.google.com/",
					
		);
}
?>