<?php
/**
* @Theme Name	:	rambo
* @file         :	footer.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/footer.php
*/ 
$current_options = get_option('rambo_theme_options'); ?>
<?php if($current_options['footer_widgets_enabled']=="on") { ?>
<div class="hero-widgets-section">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'footer-widget-area' ) )
			{?>
			<div class="">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div>	
			<?php }else { ?> 
				<?php	$args=array(
									'before_widget' => '<div class="span4 footer_widget">',
									'after_widget' => '</div>',
									'before_title' => '<div class="widget_title"><h2>',
									'after_title' => '</h2></div>',
								);
				?>
			<div class="span4 widget_space footer_widget_space">
				<?php  the_widget('WP_Widget_Pages','',$args); ?>
			</div>	
			
			<div class="span4 widget_space footer_widget_space">
				<?php the_widget('WP_Widget_Archives','',$args); ?>
			</div>
			
			<div class="span4 widget_space footer_widget_space">
				 <?php the_widget('WP_Widget_Meta','',$args); ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>

<!-- Footer Section -->
<div class="footer-section">
	<div class="container">
		<div class="row">				
			<div class="span8">
				<p><?php _e('Powered By ','rambo');?> <a target="_blank" href="<?php echo esc_url ( 'http://wordpress.org/') ; ?>"> <?php _e('WordPress','rambo');?></a>&nbsp;&nbsp;<?php if($current_options['rambo_designed_by_head']!=''){ echo ($current_options['rambo_designed_by_head']); } ?>	
				<a rel="nofollow" target="_blank" href="<?php if($current_options['rambo_designed_by_link']!='') { echo esc_url($current_options['rambo_designed_by_link']);} ?>"><?php if($current_options['rambo_designed_by_text']!='') { ?>
				<?php  echo ($current_options['rambo_designed_by_text']); } ?></a>&nbsp;&nbsp;<?php if($current_options['rambo_copy_rights_text']!='') { ?>
				<?php  echo ($current_options['rambo_copy_rights_text']); } ?>
				</p> 				
			</div>
			<?php if($current_options['footer_social_media_enabled']=="on") { ?>
			<div class="span4">
				<div class="footer_social pull-right">
					<a href="<?php if($current_options['social_media_facebook_link']!='') { echo esc_url($current_options['social_media_facebook_link']); } else { echo "#"; } ?>" class="facebook">&nbsp;</a>
					<a href="<?php if($current_options['social_media_twitter_link']!='') { echo esc_url($current_options['social_media_twitter_link']); } else { echo "#"; } ?>" class="twitter">&nbsp;</a>
					<a href="<?php if($current_options['social_media_linkedin_link']!='') { echo esc_url($current_options['social_media_linkedin_link']); } else { echo "#"; } ?>" class="linked-in">&nbsp;</a>
					<a href="<?php if($current_options['social_media_google_plus']!='') { echo esc_url($current_options['social_media_google_plus']); } else { echo "#"; } ?>" class="google_plus">&nbsp;</a>
				</div>	
			</div>
			<?php } ?>
						
		</div>
	</div>
</div>
<?php
$rambo_current_options=get_option('rambo_theme_options');
if($rambo_current_options['webrit_custom_css']!='') {  ?>
<style type="text/css">
<?php echo $rambo_current_options['webrit_custom_css']; ?>
</style>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>