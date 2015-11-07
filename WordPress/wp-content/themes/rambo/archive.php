<?php get_template_part('banner','strip');
$image_uri= WEBRITI_TEMPLATE_DIR_URI. '/images' ;
?>
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
		<!-- Blog Main -->
		<div class="span8 Blog_main">
		<h2>
					<?php if ( is_day() ) : ?>
					<?php  _e( "Daily Archives: ", 'rambo' ); echo (get_the_date()); ?>
						<?php elseif ( is_month() ) : ?>
						<?php  _e( "Monthly Archives: ", 'rambo' ); echo (get_the_date( 'F Y' )); ?>
						<?php elseif ( is_year() ) : ?>
								<?php  _e( "Yearly Archives: ", 'rambo' );  echo (get_the_date( 'Y' )); ?>
							 <?php else : ?>
								<?php _e( "Blog Archives: ", 'rambo' ); ?>
                        <?php endif; ?>
					</h2>
			<?php while(have_posts()):the_post();
					global $more;
					$more = 0;?>
			<div class="blog_section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="media">
					<?php $defalt_arg =array('class' => "blog_section_img" )?>
					<?php if(has_post_thumbnail()):?>
					<a  href="<?php the_permalink(); ?>" class="pull-left blog_pull_img">
					<?php the_post_thumbnail('blog1_section_img', $defalt_arg); ?>
					</a>
					<?php endif;?>
					<div class="media-body">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<span class="blog_tags"><h5><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author();?></a> <br /><span><?php echo get_the_date('M j,Y');?></span></h5></span>
					<span class="blog_tags"><i class="fa fa-group"></i><?php the_category(',');?></span>
					<p><?php  echo the_excerpt(); ?></p>
					<?php $posttags = get_the_tags();?>
					<?php if($posttags) { ?>
					<p><span class="blog_tags"><i class="fa fa-tags"></i> 
						<a href="<?php the_permalink(); ?>"><?php the_tags('<b>'.__('Tags:','rambo').'</b>','');?></a>
						</span>
					</p>
					<?php } ?>
					</div>
				</div>
			</div>
			<?php endwhile ?>
			<?php wp_link_pages(); ?>
			<div class="pagination_section">
			<div class="pagination text-center">	
			<ul>
			<li><?php previous_posts_link(); ?></li>
			<li><?php next_posts_link(); ?></li>
			</ul>
			</div>
			</div>
		</div>
		 <?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>