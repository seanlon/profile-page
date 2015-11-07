<?php   
/**
* @Theme Name	:	rambo
* @file         :	tag.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/tag.php
*/ 
get_template_part('banner','strip'); ?>
<div class="container"><!-- Main --> 
		<div class="row-fluid">
        <div class="span8 Blog_main">
			<h2><?php  _e( "Tag  Archives:", 'rambo'); echo single_tag_title( '', false ); ?></h2>
			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<p><?php echo tag_description(); ?></p>
			<?php endif; ?>
			<?php  while(have_posts()): the_post();?>
			<div class="blog_single_post">
				
				<h2><a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>
				
					<?php $defalt_arg =array('class' => "blog_section_img" )?>
					<?php if(has_post_thumbnail()):?>
					<a  href="<?php the_permalink(); ?>" class="pull-left blog_pull_img">
					<?php the_post_thumbnail('media-object', $defalt_arg); ?>
					</a>
					<?php endif;?>
					
					<p><?php the_content( __( 'Read More' , 'rambo' ) );?></p>
					
				
			</div>	
			<?php endwhile;?>		 
		</div>
		<?php get_sidebar();?>
		</div>
</div>
<?php  get_footer(); ?>