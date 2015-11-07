<?php
get_header();
get_template_part('index','banner'); ?>
<!-- Blog Section with Sidebar -->
<div class="blog-section-lg">
	<div class="container">
		<div class="row">
		 <!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'post','paged'=>$paged);		
					$post_type_data = new WP_Query( $args );
					while($post_type_data->have_posts()){
					$post_type_data->the_post();
					global $more;
					$more = 0;
					?>		
			<?php get_template_part('content',''); ?>
				<?php } ?>
				<div class="blog-pagination-square">
					<?php previous_posts_link( __('Previous','appointment') ); ?>
					<?php next_posts_link( __('Next','appointment') ); ?> 
				</div>
			</div>
			<!-- /Blog Area -->			
			<!--Sidebar Area-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>