<div class="block ui-tabs-panel deactive" id="option-ui-id-2" >
	<h2><?php _e('Home Banner Settings','rambo');?></h2><hr>	
	<?php $current_options = get_option('rambo_theme_options');
	if(isset($_POST['rambo_settings_save_2']))
	{	
		if($_POST['rambo_settings_save_2'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['rambo_gernalsetting_nonce_customization'],'rambo_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['home_custom_image']=sanitize_text_field($_POST['home_custom_image']);
				$current_options['home_image_title']=sanitize_text_field($_POST['home_image_title']);
				$current_options['home_image_description']=sanitize_text_field($_POST['home_image_description']);
				
				// home_banner section enabled yes OR no
				if($_POST['home_banner_enabled'])
				{ echo $current_options['home_banner_enabled']= sanitize_text_field($_POST['home_banner_enabled']); } 
				else { echo $current_options['home_banner_enabled']="off"; } 
			
				
				update_option('rambo_theme_options',stripslashes_deep($current_options));
			}
		}	
		if($_POST['rambo_settings_save_2'] == 2) 
		{
			$slide_image_uri =WEBRITI_TEMPLATE_DIR_URI .'/images/default/slide/slide.png';
			$current_options['home_banner_enabled']="on";
			$current_options['home_custom_image']=$slide_image_uri;
			$current_options['home_image_title']="Fully Responsive Theme !";
			$current_options['home_image_description']="Rambo makes content easy to view on any device with any resolution. You may check this with resizing. Fully Responsive Theme Amazing Design.";
			update_option('rambo_theme_options',$current_options);
		}
	}  ?>
	<form method="post" id="rambo_theme_options_2">
		<?php wp_nonce_field('rambo_customization_nonce_gernalsetting','rambo_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Banner in Front page','rambo'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['home_banner_enabled']=='on') echo "checked='checked'"; ?> id="home_banner_enabled" name="home_banner_enabled" > <span class="explain"><?php _e('Enable Banner on front page.','rambo'); ?></span>
		</div>					
		<div class="section">
			<h3><?php _e('Banner Image','rambo'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Banner Image must be in 1600 X 400 px','rambo');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if(isset($current_options['home_custom_image'])) { echo esc_attr($current_options['home_custom_image']); } ?>" id="home_custom_image" name="home_custom_image" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Add Banner Here" class="upload_image_button" />			
			<?php if(isset($current_options['home_custom_image'])) { ?>
			<p><img class="webriti_home_slide" src="<?php echo $current_options['home_custom_image'];  ?>" /></p>
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Banner Title','rambo'); ?></h3>
			<input class="webriti_inpute"  type="text" name="home_image_title" id="home_image_title" value="<?php if( isset($current_options['home_image_title'])) echo $current_options['home_image_title']; ?>" >
			<span class="icons help"><span class="tooltip"><?php  _e('Enter Banner title','rambo');?></span></span>
		</div>
		<div class="section">
			<h3><?php _e('Banner Description','rambo'); ?></h3>
			<textarea rows="5" cols="8" id="home_image_description" name="home_image_description"  class="textbox1" ><?php if(isset($current_options['home_image_description'])) { echo esc_attr($current_options['home_image_description']); } ?></textarea>
			<div class=""><?php _e('Enter Banner description text less then 150 character .','rambo'); ?><br></div>
		</div>	
		
		<div id="button_section">
			<input type="hidden" value="1" id="rambo_settings_save_2" name="rambo_settings_save_2" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="rambo_option_data_reset('2');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="rambo_option_data_save('2')" >
			<!--  alert massage when data saved and reset -->
			<div class="rambo_settings_save" id="rambo_settings_save_2_success" ><?php _e('Options data successfully Saved','rambo');?></div>
			<div class="rambo_settings_save" id="rambo_settings_save_2_reset" ><?php _e('Options data successfully reset','rambo');?></div>
		</div>
	</form>
</div>