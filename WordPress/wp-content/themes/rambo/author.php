<?php 
/**
* @Theme Name	:	rambo
* @file         :	author.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/autor.php
*/
get_template_part('banner','strip');?>
<div class="container">
	<div class="row-fluid">
		<div class="span8 Blog_main"> 
			<?php if ( have_posts() ) : ?>
					<?php the_post(); ?>
					<h2><?php _e( 'Author Archives : ', 'rambo' ); echo get_the_author(); ?></h2>
			<?php	/* Since we called the_post() above, we need to
					* rewind the loop back to the beginning that way
					* we can run the loop properly, in full.
					*/
				rewind_posts(); ?>
			<?php /* Start the Loop */ ?>
			<?php    while(have_posts()): the_post();?>
			<div class="blog_single_post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
				<?php $defalt_arg =array('class' => "blog_section2_img" )?>
				<?php if(has_post_thumbnail()):?>
				<a  href="<?php the_permalink(); ?>" class="pull-left blog_pull_img2">
				<?php the_post_thumbnail('media-object', $defalt_arg); ?>
				</a>
				<?php endif;?>
              	<div class="blog_section2_comment">
				<a href="<?php the_permalink(); ?>"><i class="fa fa-calendar icon-spacing"></i><?php the_time('M j,Y');?></a>
				<a href="<?php the_permalink(); ?>"><i class="fa fa-comments icon-spacing"></i><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are Disabled' ); ?></a>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-user icon-spacing"></i> <?php _e("By",'rambo');?>&nbsp;<?php the_author();?></a>
				</div>
				<h2><a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p><?php  the_content( __( 'Read More' , 'rambo' ) ); ?></p>
            </div>
			<?php endwhile;?>	 
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>