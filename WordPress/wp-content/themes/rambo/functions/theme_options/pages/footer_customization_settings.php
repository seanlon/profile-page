<div class="block ui-tabs-panel deactive" id="option-ui-id-6" >
	<h2><?php _e('Footer Custmization','rambo');?></h2><hr>	
	<?php $current_options = get_option('rambo_theme_options');
	if(isset($_POST['rambo_settings_save_6']))
	{	
		if($_POST['rambo_settings_save_6'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['rambo_gernalsetting_nonce_customization'],'rambo_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{	
				
				$current_options['rambo_copy_rights_text']=sanitize_text_field($_POST['rambo_copy_rights_text']);
				$current_options['rambo_designed_by_head']=sanitize_text_field($_POST['rambo_designed_by_head']);
				$current_options['rambo_designed_by_text']=sanitize_text_field($_POST['rambo_designed_by_text']);
				$current_options['rambo_designed_by_link']=sanitize_text_field($_POST['rambo_designed_by_link']);
				
				
				
				// latest news section enabled yes ya on
				if($_POST['footer_widgets_enabled'])
				{ echo $current_options['footer_widgets_enabled']= sanitize_text_field($_POST['footer_widgets_enabled']); } 
				else { echo $current_options['footer_widgets_enabled']="off"; } 
				
				update_option('rambo_theme_options',stripslashes_deep($current_options));
			}
		}	
		if($_POST['rambo_settings_save_6'] == 2) 
		{
			$current_options['footer_widgets_enabled']='on';
			$current_options['rambo_copy_rights_text']='&copy;2013&nbsp;ALL Rights Reserved';
			
			$current_options['rambo_designed_by_head']='Designed By';
			$current_options['rambo_designed_by_link']='http://www.webriti.com';
			$current_options['rambo_designed_by_text']='Webriti';
					
			
			update_option('rambo_theme_options',$current_options);
		}
	}  ?>
	<form method="post" id="rambo_theme_options_6">
		<?php wp_nonce_field('rambo_customization_nonce_gernalsetting','rambo_gernalsetting_nonce_customization'); ?>		
		<div class="section">
			<h3><?php _e('Enable Footer widgets','rambo','rambo');?></h3>
			<input type="checkbox" <?php if($current_options['footer_widgets_enabled']=='on') echo "checked='checked'"; ?> id="footer_widgets_enabled" name="footer_widgets_enabled" > <span class="explain"><?php _e('Enable Footer widgets in all pages.','rambo'); ?></span>
		</div>					
		<div class="section">
			<h3><?php _e('Copy Rights Text','rambo');?></h3>
			<input class="webriti_inpute"  type="text" name="rambo_copy_rights_text" id="rambo_copy_rights_text" value="<?php if($current_options['rambo_copy_rights_text']!='') { echo esc_attr($current_options['rambo_copy_rights_text']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter custom copy rights text.','rambo');?></span>
			</span>		
		</div>
		<div class="section">
			<h3><?php _e('Designed By Head','rambo');?></h3>
			<input class="webriti_inpute"  type="text" name="rambo_designed_by_head" id="rambo_designed_by_head" value="<?php if($current_options['rambo_designed_by_head']!='') { echo esc_attr($current_options['rambo_designed_by_head']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter Privacy Policy Text.','rambo');?></span>
			</span>		
		</div>
		<div class="section">
			<h3><?php _e('Designed By Name','rambo');?></h3>
			<input class="webriti_inpute"  type="text" name="rambo_designed_by_text" id="rambo_designed_by_text" value="<?php if($current_options['rambo_designed_by_text']!='') { echo esc_attr($current_options['rambo_designed_by_text']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter Name for Company/Website.','rambo');?></span>
			</span>		
		</div>
		<div class="section">
			<h3><?php _e('Designed By Link','rambo');?></h3>
			<input class="webriti_inpute"  type="text" name="rambo_designed_by_link" id="rambo_designed_by_link" value="<?php if($current_options['rambo_designed_by_link']!='') { echo esc_attr($current_options['rambo_designed_by_link']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter URL for your website.','rambo');?></span>
			</span>		
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="rambo_settings_save_6" name="rambo_settings_save_6" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="rambo_option_data_reset('6');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="rambo_option_data_save('6')" >
			<!--  alert massage when data saved and reset -->
			<div class="rambo_settings_save" id="rambo_settings_save_6_success" ><?php _e('Options data successfully Saved','rambo');?></div>
			<div class="rambo_settings_save" id="rambo_settings_save_6_reset" ><?php _e('Options data successfully reset','rambo');?></div>
		</div>
	</form>
</div>