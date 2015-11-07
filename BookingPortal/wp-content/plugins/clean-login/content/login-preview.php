<?php
	global $current_user;
	get_currentuserinfo();
	$edit_url = get_option( 'cl_edit_url', '');
	$show_user_information = get_option( 'cl_hideuser' ) == 'on' ? false : true;
?>

<div class="cleanlogin-container" >
	<div class="cleanlogin-preview">
		<div class="cleanlogin-preview-top">
			<a href="<?php echo esc_url( add_query_arg( 'action', 'logout' ) ); ?>" class="cleanlogin-preview-logout-link"><?php echo __( 'Log out', 'cleanlogin' ); ?></a>	
			<?php if ( $edit_url != '' )
				echo "<a href='$edit_url' class='cleanlogin-preview-edit-link'>". __( 'Edit my profile', 'cleanlogin' ) ."</a>";
			?>
		</div>
		
		<?php echo get_avatar( $current_user->ID, 128 ); ?>

		<?php // Since 1.1 (show username or not) ?>

		<h4>
			<?php
				if ( $show_user_information ) echo $current_user->user_login;
			 ?>
			<small><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></small>
		</h4>
	</div>		
</div>