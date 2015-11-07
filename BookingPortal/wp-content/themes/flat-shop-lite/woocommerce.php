<?php get_header(); ?>   
		<div class="content">
			<div class="post-main">
				<?php woocommerce_content(); ?>
			</div>
		</div>

<div class="row">
	<div class="sidebar-right1 span2">
		<?php dynamic_sidebar( 'right' ); ?>
	</div>
</div>




</div>
</div>
<?php get_footer(); ?>