<div id="post-<?php the_ID(); ?>" <?php post_class('blog-lg-area-left'); ?>>
<div class="media">						
		<?php appointment_aside_meta_content(); ?>
		<div class="media-body">
			<?php // Check Image size for fullwidth template
				if( is_page_template('blog-full-width.php'))
				appointment_image_thumbnail('','img-responsive'); 
				// Check Image size for Different format like Single post,page
				elseif(is_single() || is_page())
				appointment_post_thumbnail('','img-responsive'); 
				else
				appointment_post_thumbnail('','img-responsive');
							 appointment_post_meta_content(); 
				if( !is_page_template('fullwidth.php') && get_the_title() && !is_page() ) { ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		          <?php   } ?>
				<?php		
                // call editor content of post/page	
				the_content( __( 'Read More' , 'appointment' ) );
				wp_link_pages( );
		       ?>
		</div>
	</div>
	<div class="blog-btn-area-lg"></div>
</div>