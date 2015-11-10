<!-- 

Admin Page - retrieve and store values for plugin

-->

<?php  
    if($_POST['smax_hidden'] == 'Y') {  
        //Form data sent  
        $slug = $_POST['smax_slug'];  
        update_option('smax_slug', $slug);  
        ?>  
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
        <?php  
    } else {  
        //Normal page display  
        $slug = get_option('smax_slug');  

    }  
?> 

<div class="wrap">
	<?php    echo "<h2>" . __( 'ScheduleMAX Setup', 'smax_trdom' ) . "</h2>"; ?>
	<form name="smax_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="smax_hidden" value="Y">
		<?php    echo "<h4>" . __( 'ScheduleMAX Account Settings<br>', 'smax_trdom' ) . "</h4>"; ?>
	<hr>
	<br>
		<p><?php _e("Account slug (ScheduleMAX pathing): " ); ?><input type="text" name="smax_slug" value="<?php echo $slug; ?>" size="30"><?php _e(" ex: virtualmassage" ); ?></p>
		<p>If your Admin Home is "http://www.schedulemax.com/<b>virtualmassage</b>/admin/", then your account slug is "<b>virtualmassage</b>"</p>


		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'smax_trdom' ) ?>" />
		</p>
		<h4> - Note:  You must (Re)Publish to enable changes on this page.  {Any Post/Page Updated will work}</h4>
		<br>
		<h4> Shortcodes:</h4>
		<p> Usage:  Type the shortcode text below (for example: [shortcode], with square brackets). </p>

		<p>  `[schedulemax_button]` in your page/posts for a booking button </p>
		<p>  `[schedulemax_wizard]` in your page/posts for full booking wizard on page</p>
		<br>
		<p> Just put on any of your pages or posts, yes, right with the other items you are writing .   When you preview or publish the page the shortcode will be replaced by a web widget, either a booking button - that will pop-up our booking wizard in its own window, or a booking widget right on the page.</p>


	</form>
</div>