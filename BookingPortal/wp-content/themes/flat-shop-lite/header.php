<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head> <link href="http://gmpg.org/xfn/11" rel="profile" />
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


	<div class="main-head">
		<div class="main">
		<div class="hdr1">

				<div class="sidebar-head3 span2">
					<?php dynamic_sidebar( 'sidebar-head' ); ?>
				</div>
			<div class="head">
			<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>

			</div>
			


				<div class="sidebar-head4 span2">

					<?php if (class_exists('woocommerce')) :?>
								
							<?php global $woocommerce; ?>
			 
						<?php _e( 'Cart:', 'flat-shop-lite' ); ?> <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'flat-shop-lite'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'flat-shop-lite'), $woocommerce->cart->cart_contents_count);?> <?php echo $woocommerce->cart->get_cart_total(); ?></a>
					<?php endif; ?>	

				</div>

			</div>
		</div>
	</div>
		</div>

<div class="main">
	<div class="content-main">