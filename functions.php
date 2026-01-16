<?php 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'skt_barbecue_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_barbecue_setup() {
	$GLOBALS['content_width'] = apply_filters( 'skt_barbecue_content_width', 640 );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 56,
		'width'       => 162,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'skt-barbecue' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
} 
endif; // skt_barbecue_setup
add_action( 'after_setup_theme', 'skt_barbecue_setup' );

function skt_barbecue_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'skt-barbecue' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-barbecue' ),
		'id'            => 'fc-1-bbq',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'skt-barbecue' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-barbecue' ),
		'id'            => 'fc-2-bbq',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'skt-barbecue' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-barbecue' ),
		'id'            => 'fc-3-bbq',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'skt-barbecue' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-barbecue' ),
		'id'            => 'fc-4-bbq',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );	
}
add_action( 'widgets_init', 'skt_barbecue_widgets_init' );


add_action( 'wp_enqueue_scripts', 'skt_barbecue_enqueue_styles' );
function skt_barbecue_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

add_action( 'wp_enqueue_scripts', 'skt_barbecue_child_styles', 99);
function skt_barbecue_child_styles() {
  wp_enqueue_style( 'skt-barbecue-child-style', get_stylesheet_directory_uri()."/css/responsive.css" );
} 

function skt_barbecue_admin_style() {
  wp_enqueue_script('skt-barbecue-admin-script', get_stylesheet_directory_uri()."/js/skt-barbecue-admin-script.js");
}
add_action('admin_enqueue_scripts', 'skt_barbecue_admin_style');

function skt_barbecue_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_skt_barbecue_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'skt-barbecue-about-page-style', get_stylesheet_directory_uri() . '/css/skt-barbecue-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'skt_barbecue_admin_about_page_css_enqueue' );

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'skt_barbecue_activation_notice' );
}
function skt_barbecue_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="skt-pizzeria-notice-container">
        	<div class="skt-pizzeria-notice-img"><img src="<?php echo esc_url( SKT_BARBECUE_SKTTHEMES_THEME_URI . 'images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="skt-pizzeria-notice-content">
            <div class="skt-pizzeria-notice-heading"><?php echo esc_html__('Thank you for installing SKT Barbecue!', 'skt-barbecue'); ?></div>
            <p class="largefont"><?php echo esc_html__('SKT Barbecue comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'skt-barbecue'); ?></p>
            </div>
            <div class="skt-pizzeria-clear"></div>
        </div>
    </div>
    <?php
}

if ( ! function_exists( 'skt_barbecue_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_barbecue_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


define('SKT_BARBECUE_SKTTHEMES_URL','https://www.sktthemes.org');
define('SKT_BARBECUE_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/bbq-restaurant-wordpress-theme/');
define('SKT_BARBECUE_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/free-spice-wordpress-theme/');
define('SKT_BARBECUE_SKTTHEMES_THEME_DOC','https://www.sktthemesdemo.net/documentation/skt-pizzeria-doc/');
define('SKT_BARBECUE_SKTTHEMES_LIVE_DEMO','https://sktperfectdemo.com/themepack/barbecue/');
define('SKT_BARBECUE_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('SKT_BARBECUE_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

function skt_barbecue_remove_parent_function(){	 
	remove_action( 'admin_notices', 'skt_pizzeria_activation_notice');
	remove_action( 'admin_menu', 'skt_pizzeria_abouttheme');
	remove_action( 'customize_register', 'skt_pizzeria_customize_register');
	remove_action( 'wp_enqueue_scripts', 'skt_pizzeria_custom_css');
}
add_action( 'init', 'skt_barbecue_remove_parent_function' );

function skt_barbecue_remove_parent_theme_stuff() {
    remove_action( 'after_setup_theme', 'skt_pizzeria_setup' );
}
add_action( 'after_setup_theme', 'skt_barbecue_remove_parent_theme_stuff', 0 );

function skt_barbecue_unregister_widgets_area(){
	unregister_sidebar( 'fc-1' );
	unregister_sidebar( 'fc-2' );
	unregister_sidebar( 'fc-3' );
	unregister_sidebar( 'fc-4' );
}
add_action( 'widgets_init', 'skt_barbecue_unregister_widgets_area', 11 );

require_once get_stylesheet_directory() . '/inc/about-themes.php';  
require_once get_stylesheet_directory() . '/inc/customizer.php';