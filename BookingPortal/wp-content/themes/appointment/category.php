<?php
  get_header(); ?>
<!-- Page Title Section -->
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-title"><h1><?php echo single_cat_title("", false); ?></h1></div>
				</div>
				<div class="col-md-6">
					<ul class="page-breadcrumb">
						<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs();?>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Page Title Section -->
<!-- Page Seperator --><div class="page-seperator"></div><!-- /Page Seperator -->
<div class="clearfix"></div>
<!-- /Page Title Section ---->
<div class="blog-section-lg">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1 ;
		$category_id = get_query_var('cat');
		$args = array( 'post_type' => 'post','cat' => $category_id ,'paged' => $paged );
		$loop = new WP_Query( $args );
		if( have_posts() ) :
		 while( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php get_template_part('content','')?>
				<?php endwhile; ?>
				<?php endif; ?>
			<!-- Blog Pagination -->
				<div class="blog-pagination-square">
					<?php previous_posts_link( __('Previous','appointment') ); ?>
					<?php next_posts_link( __('Next','appointment') ); ?> 
				</div>
			<!-- /Blog Pagination -->
			</div>
			<!--Sidebar Area-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<?php get_footer(); ?>