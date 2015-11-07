<?php 
/**
* @Theme Name	:	rambo
* @file         :	index-banner.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/index-banner.php
*/
$current_options=get_option('rambo_theme_options');
if($current_options['home_banner_enabled']=="on")
{ 	
?>
<div class="front_banner">	
	<div class="banner">			
		<li><img  class="banner_img webrit_slides" src="<?php if($current_options['home_custom_image']!='') { echo $current_options['home_custom_image']; } ?>">
			<div class="banner_con">
				<h2><?php if(isset($current_options['home_image_title']))	{ echo $current_options['home_image_title']; } else { _e('Theme Feature Goes Here !','rambo'); } ?></h2>
				<h5 class="banner-title"><span><?php if(isset($current_options['home_image_description']))	{ echo $current_options['home_image_description']; } else { _e('This is Dummy Text. This is Dummy Text. This is Dummy Text.  I repeat.. This is Dummy Text.','rambo'); } ?></span></h5>
			</div>
		</li>
	</div>			
</div>
<?php } ?>