<?php
/**
Template Name: Fullwidth
*/
get_header();
get_template_part('index','banner');
?>
<div class="blog-section-lg">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="col-md-12">
			<?php if( have_posts()) :  the_post(); ?>		
			<div class="blog-lg-area-left">
					<div class="media">						
						<aside class="blog-post-date-area">
							<div class="date"><?php echo get_the_date('j'); ?> <div class="month-year"><?php echo get_the_date('M'); ?></div></div>
							<div class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i><?php comments_number( '', 'o', '%' ); ?></a></div>
						</aside>
						<div class="media-body">
							<?php if ( has_post_thumbnail()) : ?>
							<div class="blog-lg-box">
								<a class ="img-responsive" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
								<?php appointment_image_thumbnail('blog-area-full','img-responsive'); ?>
								</a>
							</div>
						<?php endif; ?> 
							<div class="blog-post-lg">
								<?php echo get_avatar( get_the_author_meta('user_email'), $size = '40'); ?><?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author();?></a>
							<?php 	$tag_list = get_the_tag_list();
								if(!empty($tag_list)) { ?>
								<div class="blog-tags-lg"><i class="fa fa-tags"></i><?php the_tags('', ', ', ''); ?></div>
								<?php } ?>
							</div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p> <?php the_content( __( 'Read More' , 'appointment' ) ); ?></p>
							<?php wp_link_pages( ); ?>
							<div class="blog-btn-area-lg"><a class=""></a></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php comments_template( '', true ); // show comments ?>
			</div>
			<!-- /Blog Area -->	
		</div>
	</div>
</div>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>