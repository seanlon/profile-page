<?php
/**
* @Theme Name	:	rambo
* @file         :	banner-strip.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/banner-strip.php
*/ 
get_header();?>
<!-- Header Strip -->
<div class="hero-unit-small">
	<div class="container">
		<div class="row-fluid about_space">
			<h2 class="page_head pull-left"><?php the_title();?></h2>
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="input-append search_head pull-right">
				<input type="text"   name="s" id="s" placeholder="<?php esc_attr_e( "Search", 'rambo' ); ?>" />
				<button type="submit" class="Search_btn" name="submit" ><?php esc_attr_e( "Go", 'rambo' ); ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Header Strip -->