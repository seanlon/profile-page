<?php 
/**
* @Theme Name	:	rambo
* @file         :	search.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/search.php
*/
get_template_part('banner','strip'); ?>
<div class="container">
	<div class="row-fluid">
		<div class="span8 Blog_main">
			<div class="blog_single_post">
			<?php if ( have_posts() ) : ?>
			<h2><?php printf( __( "Search Results for: %s", 'rambo' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $defalt_arg =array('class' => "blog_section2_img" )?>
			<?php if(has_post_thumbnail()):?>
			<a  href="<?php the_permalink(); ?>" class="pull-left blog_pull_img2">
				<?php the_post_thumbnail('media-object', $defalt_arg); ?>
			</a>
			<?php endif;?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="blog_section2_comment">
			<a href="<?php the_permalink(); ?>"><i class="fa fa-calendar icon-spacing"></i><?php the_time('M j,Y');?></a>
			<a href="<?php the_permalink(); ?>"><i class="fa fa-comments icon-spacing"></i><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are Disabled' ); ?></a>
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-user icon-spacing"></i> <?php _e("By",'rambo');?>&nbsp;<?php the_author();?></a>
			</div>
            <p><?php the_excerpt();?></p><br>
           <?php endwhile; ?>
			<?php else : ?>

			<h2><?php _e( "Nothing Found", 'rambo' ); ?></h2>
			<div class="">
			<p><?php _e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'rambo' ); ?>
			</p>
			<?php get_search_form(); ?>
			</div><!-- .blog_con_mn -->
			<?php endif; ?>
            </div>
		</div>
		
	</div>
</div>
<?php  get_footer() ?>