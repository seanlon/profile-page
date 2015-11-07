<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package i-craft
 * @since i-craft 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
        	<div class="footer-bg clearfix">
                <div class="widget-wrap">
                    <?php get_sidebar( 'main' ); ?>
                </div>
			</div>
			<div class="site-info">
                <div class="copyright">
                	<?php esc_attr_e( 'Copyright &copy;', 'i-craft' ); ?>  <?php bloginfo( 'name' ); ?>
                </div>            
            	<div class="credit-info">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'i-craft' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'i-craft' ); ?>">
						<?php printf( __( 'Powered by %s', 'i-craft' ), 'WordPress' ); ?>
                    </a>
                    <?php printf( __( ', Designed and Developed by', 'i-craft' )); ?> 
                    <a href="<?php echo esc_url( __( 'http://www.templatesnext.org/', 'i-craft' ) ); ?>">
                   		<?php printf( __( 'templatesnext', 'i-craft' ) ); ?>
                    </a>
                </div>

			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>