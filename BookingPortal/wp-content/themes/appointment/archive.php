<?php
get_header(); ?>
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row">
			<?php the_post(); ?>
				<div class="col-md-6">
					<div class="page-title"><h1>
        <?php if ( is_day() ) : ?>
        <?php  _e( "Daily Archives:", 'appointment' ); echo (get_the_date()); ?>
        <?php elseif ( is_month() ) : ?>
        <?php  _e( "Monthly Archives:", 'appointment' ); echo (get_the_date( 'F Y' )); ?>
        <?php elseif ( is_year() ) : ?>
        <?php  _e( "Yearly Archives:", 'appointment' );  echo (get_the_date( 'Y' )); ?>
        <?php else : ?>
        <?php _e( "Blog Archives", 'appointment' ); ?>
        <?php endif; ?>	
        <?php if(get_post_meta( get_the_ID(), 'post_description', true ) != '' ) { ?>
        <p><?php echo get_post_meta( get_the_ID(), 'post_description', true ) ; ?></p>
        <?php } ?>
        <div class="qua-separator" id=""></div>
		</h1></div>
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
<!-- Page Seperator --><div class="page-seperator"></div><!-- /Page Seperator -->

<div class="clearfix"></div>

<!-- /Page Title Section ---->
<div class="blog-section-lg">
	<div class="container">
		<div class="row">
		
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			<?php
				while ( have_posts() ) : the_post();
				global $more;
				$more = 0;
				?>
				<?php get_template_part('content',''); ?>
				<?php endwhile;	?>
				<div class="blog-pagination-square">
					<?php previous_posts_link( __('Previous','appointment') ); ?>
					<?php next_posts_link( __('Next','appointment') ); ?> 
				</div>
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