<?php
/**
* @Theme Name	:	rambo
* @file         :	404.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/404.php
*/
get_header();?>
<!-- Header Strip -->
<div class="hero-unit-small">
	<div class="container">
		<div class="row-fluid about_space">
			<h2 class="page_head pull-left"><?php _e('Oops Sorry,No Page Found','rambo');?></h2>
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
	<div class="container">
		<!--- Main ---> 
		<div class="row-fluid">
			<div class="span8 Blog_main">
				<div class="blog_single_post">
				<h2><?php _e( 'Unfortunately, the page you tried accessing could not be retrieved. ', 'rambo' ); ?>
				</h2>
				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rambo' ); ?>
				</p>
				<?php get_search_form(); ?>
				</div>
			</div>
			<?php get_sidebar (); ?>
		</div>
	</div>
<?php get_footer(); ?>