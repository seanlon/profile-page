<div class="block ui-tabs-panel deactive" id="option-ui-id-7" >
	<h2><?php _e('Social media Links','rambo');?></h2><hr>	
	<?php $current_options = get_option('rambo_theme_options');
	if(isset($_POST['rambo_settings_save_7']))
	{	
		if($_POST['rambo_settings_save_7'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['rambo_gernalsetting_nonce_customization'],'rambo_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['social_media_twitter_link']=sanitize_text_field($_POST['social_media_twitter_link']);
				$current_options['social_media_facebook_link']=sanitize_text_field($_POST['social_media_facebook_link']);
				$current_options['social_media_linkedin_link']=sanitize_text_field($_POST['social_media_linkedin_link']);
				$current_options['social_media_google_plus']=sanitize_text_field($_POST['social_media_google_plus']);	
			
				// footer section enabled yes ya on
				if($_POST['footer_social_media_enabled'])
				{ echo $current_options['footer_social_media_enabled']= sanitize_text_field($_POST['footer_social_media_enabled']); } 
				else { echo $current_options['footer_social_media_enabled']="off"; } 
				
				update_option('rambo_theme_options',stripslashes_deep($current_options));
			}
		}	
		if($_POST['rambo_settings_save_7'] == 2) 
		{
			$current_options['footer_social_media_enabled']="on";
			$current_options['social_media_twitter_link']="https://twitter.com/";
			$current_options['social_media_facebook_link']="https://facebook.com/";
			$current_options['social_media_linkedin_link']="https://linkedin.com/";
			$current_options['social_media_google_plus']="https://plus.google.com/";			
			
			update_option('rambo_theme_options',$current_options);
		}
	}  ?>
	<form method="post" id="rambo_theme_options_7">
		<?php wp_nonce_field('rambo_customization_nonce_gernalsetting','rambo_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Social media in footer ','rambo'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['footer_social_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_social_media_enabled" name="footer_social_media_enabled" > <span class="explain"><?php _e('Enable Social media icon in footer section.','rambo'); ?></span>
		</div>	
		<div class="section">
			<h3><?php _e('Twitter Link:','rambo');?></h3>
			<input class="webriti_inpute"  type="text" name="social_media_twitter_link" id="social_media_twitter_link" value="<?php if($current_options['social_media_twitter_link']!='') { echo esc_attr($current_options['social_media_twitter_link']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter twitter link.','rambo');?></span>
			</span>		
		</div>
		<div class="section">
			<h3><?php _e('Linkedin Links:','rambo');?></h3>
			<input class="webriti_inpute"  type="text" name="social_media_linkedin_link" id="social_media_linkedin_link" value="<?php if($current_options['social_media_linkedin_link']!='') { echo esc_attr($current_options['social_media_linkedin_link']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter linkedin link.','rambo');?></span>
			</span>		
		</div>
		
		<div class="section">
			<h3><?php _e('Facebook Links:','rambo');?></h3>
			<input class="webriti_inpute"  type="text" name="social_media_facebook_link" id="social_media_facebook_link" value="<?php if($current_options['social_media_facebook_link']!='') { echo esc_attr($current_options['social_media_facebook_link']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter facebook link.','rambo');?></span>
			</span>		
		</div>
		
		<div class="section">
			<h3><?php _e('Google Plus Links:','rambo');?></h3>
			<input class="webriti_inpute"  type="text" name="social_media_google_plus" id="social_media_google_plus" value="<?php if($current_options['social_media_google_plus']!='') { echo esc_attr($current_options['social_media_google_plus']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter google plus link.','rambo');?></span>
			</span>		
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="rambo_settings_save_7" name="rambo_settings_save_7" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="rambo_option_data_reset('7');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="rambo_option_data_save('7')" >
			<!--  alert massage when data saved and reset -->
			<div class="rambo_settings_save" id="rambo_settings_save_7_success" ><?php _e('Options data successfully Saved','rambo');?></div>
			<div class="rambo_settings_save" id="rambo_settings_save_7_reset" ><?php _e('Options data successfully reset','rambo');?></div>
		</div>
	</form>
</div>