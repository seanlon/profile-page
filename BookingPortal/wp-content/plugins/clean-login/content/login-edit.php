<?php
	global $current_user;
	get_currentuserinfo();f
?>

<div class="cleanlogin-container cleanlogin-full-width"> 
 
 

	<form class="cleanlogin-form" method="post" action="#">

		<h4><?php echo __( 'General information', 'cleanlogin' ); ?></h4>

		<fieldset>
		
			<div class="cleanlogin-field">
				<label><?php echo __( 'First name', 'cleanlogin' ); ?></label>
				<input type="text" name="first_name" value="<?php echo $current_user->user_firstname; ?>">
			</div>
			
			<div class="cleanlogin-field">
				<label><?php echo __( 'Last name', 'cleanlogin' ); ?></label>
				<input type="text" name="last_name" value="<?php echo $current_user->user_lastname; ?>">
			</div>
			
	 
				

	 <?php if ( $current_user->roles[0] =='contributor') : ?>
			<div class="cleanlogin-field">
				<label><?php echo __( 'Business name', 'cleanlogin' ); ?></label>
				<input type="text" name="bizname" value="<?php echo  get_user_meta( $current_user->ID,  'bizname' ,true) ; ?>">
			</div>
			
			<?php endif; ?>
			<div class="cleanlogin-field">
				<label><?php echo __( 'Mobile', 'cleanlogin' ); ?></label>
				<input type="text" name="mobile" value="<?php echo get_user_meta( $current_user->ID,  'mobile',true )  ?>">
			</div>
			<div class="cleanlogin-field">
				<label><?php echo __( 'E-mail', 'cleanlogin' ); ?></label>
				<input type="text" name="email" value="<?php echo $current_user->user_email; ?>">
			</div>
			<div class="cleanlogin-field">
			 
			</div>
		</fieldset>

		<h4><?php echo __( 'Change password', 'cleanlogin' ); ?></h4>
		
		<p class="cleanlogin-form-description"><?php echo __( "If you would like to change the password type a new one. Otherwise leave this blank.", 'cleanlogin' ); ?></p>
		
		<fieldset>
		
			<div class="cleanlogin-field">
				<label><?php echo __( 'New password', 'cleanlogin' ); ?></label>
				<input type="password" name="pass1" value="" autocomplete="off">
			</div>
			
			<div class="cleanlogin-field">
				<label><?php echo __( 'Confirm password', 'cleanlogin' ); ?></label>
				<input type="password" name="pass2" value="" autocomplete="off">
			</div>
		
		</fieldset>
		
		<div>	
			<input type="submit" value="<?php echo __( 'Update profile', 'cleanlogin' ); ?>" name="submit">
			<input type="hidden" name="action" value="edit">		
		</div>

	</form>
</div>