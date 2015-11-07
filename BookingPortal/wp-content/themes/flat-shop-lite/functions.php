<?php
add_action( 'after_setup_theme', 'flat_shop_lite_setup' );
function flat_shop_lite_setup() {
	add_theme_support( 'post-thumbnails' );   add_theme_support( 'title-tag' );
	set_post_thumbnail_size(166, 124, TRUE);
	global $content_width; if ( ! isset( $content_width ) )
	$content_width = 960;
	add_theme_support( 'automatic-feed-links' );
	add_action( 'wp_enqueue_scripts', 'flat_shop_lite_frontend' );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'woocommerce' );
	add_image_size( 'flat-shop-lite-logo-size', 330, 90, true );
    add_theme_support( 'site-logo', array( 'size' => 'flat-shop-lite-logo-size' ) );
    load_theme_textdomain( 'flat-shop-lite', get_template_directory() . '/languages' );
}
function flat_shop_lite_widgets() {
	register_sidebar( array(        // sidebar	header
	'name'              =>  __('Sidebar Header', 'flat-shop-lite'),
	'id'  			    => 'sidebar-head',
    'before_widget'     => '<li id = "%1$s" class = "widget %2$s">',
    'after_widget'      => '</li>',
	) );
	register_sidebar( array(        // sidebar	left
	'name'              =>  __('Sidebar Left', 'flat-shop-lite'),
	'id'  			    => 'right',
    'before_widget'     => '<li id = "%1$s" class = "widget %2$s">',
    'after_widget'      => '</li>',
	) );
	register_sidebar( array(		// sidebar footer
	'name'              =>  __('Sidebar Footer', 'flat-shop-lite'),
	'id'  			    => 'footer',
    'before_widget'  => '<li id = "%1$s" class = "widget %2$s">',
    'after_widget'   => '</li>',
	) );
}
add_action( 'widgets_init', 'flat_shop_lite_widgets' );
add_filter('loop_shop_per_page', create_function('$cols', 'return 12;'));
add_filter('loop_shop_columns', 'flat_shop_lite_loop_columns');
if (!function_exists('flat_shop_lite_loop_columns')) {
	function flat_shop_lite_loop_columns() {
		return 3;
	}
}
if ( ! function_exists( 'woocommerce_output_related_products' ) ) {
function woocommerce_output_related_products() {
    $args = array('posts_per_page' => 3, 'columns' => 3,'orderby' => 'rand' );
    woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );}}
function flat_shop_lite_frontend() {
 	wp_enqueue_style( 'flat-shop-lite-style', get_stylesheet_uri() );
}
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
add_filter( 'wp_tag_cloud', 'flat_shop_lite_tag_cloud' );
function flat_shop_lite_tag_cloud( $tags ){
    return preg_replace(
        "~ style='font-size: (\d+)pt;'~",
        ' class="tag-cloud-size-\10"',
        $tags
    );
}
add_filter('add_to_cart_fragments', 'flat_shop_lite_fragment');
function flat_shop_lite_fragment( $fragments ) 
{
    global $woocommerce;
    ob_start(); ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart ', 'flat-shop-lite'); ?>"><?php echo sprintf(_n('%d item ', '%d items ', $woocommerce->cart->cart_contents_count, 'flat-shop-lite'), $woocommerce->cart->cart_contents_count);?> <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}
function flat_shop_lite_menu() {
	add_theme_page('Flat Shop lite Setup', 'Free vs PRO', 'edit_theme_options', 'flat-shop-lite', 'flat_shop_lite_menu_page');
}
add_action('admin_menu', 'flat_shop_lite_menu');
function flat_shop_lite_menu_page() {
echo '
<br>
<center><h1 style="font-size:79px;">' . __( 'Theme Flat Shop lite', 'flat-shop-lite' ) . '</h1></ceter>
<br><br><br>
	<center><h1>' . __( '3 Sidebar for theme Flat Shop lite', 'flat-shop-lite' ) . '</h1></ceter>
<br>
<center><img src="' . get_template_directory_uri() . '/images/flat-shop-lite-sidebar.jpg"></center>
<br><br><br>
<h1><center>' . __( 'Site ', 'flat-shop-lite' ) . '<a href="http://justpx.com/flat-shop-lite-documentation/">' . __( 'Flat Shop lite ', 'flat-shop-lite' ) . '</a>' . __( ' -  documentation (Logo, favicon, font, ...).', 'flat-shop-lite' ) . '</center></h1><br><br>
<br><br>
<center><img src="' . get_template_directory_uri() . '/images/pro-vs-free.png"></center><br><br>
<center><b>' . __( 'Localization Ready:', 'flat-shop-lite' ) . '</b> ' . __( 'Chinese, Czech, Dutch, English, French, German, Greek, Hungarian, Indonesian, Italian, Japanese, Polish, Romana, Russian, Spanish, ... and other.  Add ', 'flat-shop-lite' ) . '<a href="http://justpx.com/your-language">' . __( 'Your language', 'flat-shop-lite' ) . '</a>. </center><br/><br/>
<br><br>
<center><h1 style="font-size:79px;">' . __( 'Theme Flat Shop PRO', 'flat-shop-lite' ) . '</h1></ceter><br><br>
<h1><center>' . __( ' Page ', 'flat-shop-lite' ) . ' <a href="http://justpx.com/product/flat-shop-pro/" target="_blank">' . __( ' Flat Shop PRO ', 'flat-shop-lite' ) . '</a>' . __( ' - theme, demo, documentation.', 'flat-shop-lite' ) . '</center></h1><br><br>
<h1><center>' . __( 'Flat Shop PRO width: 1280px - ', 'flat-shop-lite' ) . '<a href="http://flat-shop-pro.justpx.com/" target="_blank">' . __( ' Demo', 'flat-shop-lite' ) . '</a></center></h1><br>
<br><br>
<center><h1><font color="#dd3f56">10%</font>' . __( ' Discount - Code: ', 'flat-shop-lite' ) . '<font color="#dd3f56">justpx10</font></h1></ceter>
<br/><br/><br/><br/>
<center><h1>' . __( 'Flat Shop PRO 30 Sidebar Home page', 'flat-shop-lite' ) . '</h1></ceter>
<br/><br/>
<center><img src="' . get_template_directory_uri() . '/images/flat-shop-home-page.jpg"></center>
<br/><br/><br>
<center><h1>' . __( 'Flat Shop PRO - Theme Options', 'flat-shop-lite' ) . '</h1></ceter>
<br/><br/>
<center><img src="' . get_template_directory_uri() . '/images/admin-1.jpg"></center><br/><br/><center><img src="' . get_template_directory_uri() . '/images/admin-2.jpg"></center><br/><br/><center><img src="' . get_template_directory_uri() . '/images/admin-3.jpg"></center><br/><br/><center><img src="' . get_template_directory_uri() . '/images/admin-4.jpg"></center><br/><br/>
<h1><center>' . __( 'Buy theme', 'flat-shop-lite' ) . '  <a href="http://justpx.com/product/flat-shop-pro/">' . __( 'Flat Shop PRO', 'flat-shop-lite' ) . '</a></center></h1><br><br>
';
}
?>