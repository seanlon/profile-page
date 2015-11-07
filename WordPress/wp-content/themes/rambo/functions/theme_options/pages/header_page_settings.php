<div class="block ui-tabs-panel active" id="option-ui-id-1" >
<?php $current_options = get_option('rambo_theme_options');
	if(isset($_POST['rambo_settings_save_1']))
	{	
		if($_POST['rambo_settings_save_1'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['rambo_gernalsetting_nonce_customization'],'rambo_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{			
				$current_options['upload_image_logo']=sanitize_text_field($_POST['upload_image_logo']);			
				$current_options['height']=sanitize_text_field($_POST['height']);
				$current_options['width']=sanitize_text_field($_POST['width']);
				$current_options['upload_image_favicon']=sanitize_text_field($_POST['upload_image_favicon']);				
				$current_options['webrit_custom_css']=$_POST['webrit_custom_css'];				
				
				if($_POST['rambo_texttitle'])
				{ echo $current_options['rambo_texttitle']=sanitize_text_field($_POST['rambo_texttitle']); } 
				else
				{ echo $current_options['rambo_texttitle']="off"; } 
				
				update_option('rambo_theme_options',stripslashes_deep($current_options));
			}
		}	
		if($_POST['rambo_settings_save_1'] == 2) 
		{
				
			$current_options['upload_image_logo']="";
			$current_options['height']=50;
			$current_options['width']=150;
			$current_options['upload_image_favicon']="";
			$current_options['rambo_texttitle']="on";			
			$current_options['webrit_custom_css']="";		
			update_option('rambo_theme_options',$current_options);
		}
	}  ?>

	<h2><?php _e('Quick Start Settings','rambo');?></h2><hr>	
	<form method="post" id="rambo_theme_options_1">
		<?php wp_nonce_field('rambo_customization_nonce_gernalsetting','rambo_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Home to Enable Theme Specific Homepage ?','rambo'); ?>  </h3>
			<span class="explain" id="explain"><b><?php _e(' Create a New Page with the Template "Business Home Page. Then assign it as Front Page in the WordPress Settings -> Reading Settings.','rambo'); ?></b></span>
		</div>			
		<div class="section">
			<h3><?php _e('Custom Logo','rambo'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Logo must be in 150 X 50 px','rambo');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['upload_image_logo']!='') { echo esc_attr($current_options['upload_image_logo']); } ?>" id="upload_image_logo" name="upload_image_logo" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Custom Logo" class="upload_image_button" />	
			<?php if($current_options['upload_image_logo']!='') { ?>
			<p><img class="logo_settings" src="<?php if($current_options['upload_image_logo']!='') { echo esc_attr($current_options['upload_image_logo']); } ?>" /></p>
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Logo Height','rambo'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Logo height must be less then 80px','rambo');?></span></span>
			</h3>
			<input class="webriti_inpute"  type="text" name="height" id="height" value="<?php echo $current_options['height']; ?>" >						
		</div>
		<div class="section">
			<h3><?php _e('Logo Width','rambo'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Logo width must be less then 200 px','rambo');?></span></span>
			</h3>
			<input  class="webriti_inpute" type="text" name="width" id="width"  value="<?php echo $current_options['width']; ?>" >			
		</div>
		<div class="section">
			<h3><?php _e('Text Title','rambo'); ?></h3>
			<input type="checkbox" <?php if($current_options['rambo_texttitle']=='on') echo "checked='checked'"; ?> id="rambo_texttitle" name="rambo_texttitle" > <span class="explain"><?php _e('Enable text-based Site Title and Tagline. Setup title','rambo');?>&amp;<?php _e('tagline in','rambo');?> <a href="<?php echo home_url( '/' ); ?>wp-admin/options-general.php"><?php _e('General Settings','rambo');?></a>.</span>
		</div>
		<div class="section">
			<h3><?php _e('Custom Favicon','rambo'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Custom Favicon Must be in 25 X 25 px','rambo');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['upload_image_favicon']!='') { echo esc_attr($current_options['upload_image_favicon']); } ?>" id="upload_image_favicon" name="upload_image_favicon" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Favicon Icon" class="upload_image_button"  />			
			<?php if($current_options['upload_image_favicon']!='') { ?>
			<p><img class="logo_settings" src="<?php  echo esc_attr($current_options['upload_image_favicon']);  ?>" /></p>
			<?php } ?>
		</div>		
		<div class="section">
			<h3><?php _e('Custom css','rambo'); ?></h3>
			<textarea rows="8" cols="8" id="webrit_custom_css" name="webrit_custom_css"  class="textbox"><?php if($current_options['webrit_custom_css']!='') { echo esc_attr($current_options['webrit_custom_css']); } ?></textarea>
			<div class="explain"><?php _e('Paste your custom css code and change your layout without code editing.','rambo'); ?><br></div>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="rambo_settings_save_1" name="rambo_settings_save_1" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="rambo_option_data_reset('1');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="rambo_option_data_save('1')" >
			<!--  alert massage when data saved and reset -->
			<div class="rambo_settings_save" id="rambo_settings_save_1_success" ><?php _e('Options data successfully Saved','rambo');?></div>
			<div class="rambo_settings_save" id="rambo_settings_save_1_reset" ><?php _e('Options data successfully reset','rambo');?></div>
		</div>
	</form>
</div>