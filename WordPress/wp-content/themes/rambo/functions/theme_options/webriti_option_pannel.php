<div class="wrap" id="framework_wrap">   		
    <div id="content_wrap">
		<div class="webriti-header webriti-themepromo">
			<h2><a href="http://www.webriti.com/"><img class="logo_webriti" src="<?php echo get_template_directory_uri(); ?>/functions/theme_options/images/png.png"></a></h2>
		</div>
		<div class="webriti-submenu">		
			<h2><?php _e('Rambo','rambo'); ?>			
				<div class="webriti-submenu-links">
					<a target="_blank" href="http://wordpress.org/support/theme/rambo" class="btn btn-primary"><?php _e('Support Desk','rambo'); ?></a>
					<a target="_blank" href="<?php echo get_template_directory_uri(); ?>/readme.txt" class="btn btn-info"> <?php _e('Theme Documentation','rambo'); ?></a>
				</div><!-- webriti-submenu-links -->
			</h2>
          <div class="clear"></div>
        </div>
        <div id="content">
			<div id="options_tabs" class="ui-tabs ">
				<ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">
					<li class="active" >
						<div class="arrow"><div></div></div><a href="#" id="1"><span class="icon home-page"></span><?php _e('Home Page','rambo');?></a>
						<ul><li class="currunt" ><a href="#" class="ui-tabs-anchor" id="ui-id-1"><?php _e('Quick Start','rambo');?> </a><span></span></li>
							<li><a href="#"  id="ui-id-2"><?php _e('Banner Setting','rambo');?></a><span></span>
							</li>
							<li><a href="#"  id="ui-id-3"><?php _e('Service Section','rambo');?></a><span></span>
							</li>	
						</ul>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-6"><span class="icon footer"></span><?php _e('Footer Customization','rambo');?></a>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-7"><span class="icon social_media_links"></span><?php _e('Social media links','rambo');?></a>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-8"><span class="icon upgrade"></span><?php _e('Upgrade To Premium','rambo');?></a>
					</li>	
					<div id="nav-shadow"></div>
                </ul>				
				<!--most 1 tabs header_page_settings --> 
				<?php require_once('pages/header_page_settings.php'); ?>
				
				<!--most 2 tabs Home Banner Settings --> 
				<?php require_once('pages/home_page_banner_settings.php'); ?>
				
				<!--most 3 tabs service_page_settings --> 
				<?php require_once('pages/service_page_settings.php'); ?>
				
				<!--most 6 tabs home_page_settings --> 
				<?php require_once('pages/footer_customization_settings.php'); ?>
				
				<!--most 7 tabs home_page_settings --> 
				<?php require_once('pages/footer_social_media_settings.php'); ?>			
				<!--most 8 tabs home_page_settings --> 
				<?php require_once('pages/UpgradeToPro.php'); ?>
			</div>		
        </div>
		<div class="webriti-submenu" id="webriti_submenu">			
            <div class="webriti-submenu-links" id="webriti_submenu_links">
			<form method="POST">
				<input type="submit" onclick="return confirm( 'Click OK to reset. Any theme settings will be lost!' );" value="Restore All Defaults" name="restore_all_defaults" id="restore_all_defaults" class="reset-button btn">
			<form>
            </div><!-- webriti-submenu-links -->
        </div>
		<div class="clear"></div>
    </div>
</div>
<?php
// Restore all defaults
if(isset($_POST['restore_all_defaults'])) 
	{
		$rambo_theme_options = theme_data_setup();	
		update_option('rambo_theme_options',$rambo_theme_options);
	}
?>