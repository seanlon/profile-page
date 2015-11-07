<?php
/**
* @Theme Name	:	rambo
* @file         :	sidebar.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/sidebar.php
*/
?>
<div class="span4 sidebar">	
   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary') ) : ?> 
		<?php the_widget('WP_Widget_Archives'); ?>
		<?php the_widget('WP_Widget_Categories'); ?>
	<?php endif;?>
</div>