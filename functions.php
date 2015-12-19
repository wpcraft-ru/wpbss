<?php
/**
 * wpbss functions and definitions
 *
 * @package wpbss
 */



if ( ! function_exists( 'wpbss_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpbss_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wpbss, use a find and replace
	 * to change 'wpbss' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wpbss', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wpbss' ),
		'footer' => __( 'Footer Menu', 'wpbss' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wpbss_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


    /**
    * Support WooCommerce
    */
    add_theme_support( 'woocommerce' );
}
endif; // wpbss_setup
add_action( 'after_setup_theme', 'wpbss_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpbss_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpbss_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpbss_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wpbss_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpbss' ),
		'id'            => 'alfa-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wpbss_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpbss_scripts() {
	wp_enqueue_style( 'wpbss-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpbss_scripts' );




 /**
  * Custom template tags for this theme.
  */
 require get_template_directory() . '/inc/template-tags.php';

 /**
  * Custom functions that act independently of the theme templates.
  */
 require get_template_directory() . '/inc/extras.php';

 /**
  * Customizer additions.
  */
 require get_template_directory() . '/inc/customizer/customizer.php';

 /**
  * Load Jetpack compatibility file.
  */
 require get_template_directory() . '/inc/jetpack.php';


 /**
  * Load Bootstrap compatibility file.
  */
 require get_template_directory() . '/inc/bootstrap-load.php';
 require get_template_directory() . '/inc/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php';

 /**
  * Support IE
  */
 require get_template_directory() . '/inc/ie-support.php';


 /**
  * Customize comments
  */
 require get_template_directory() . '/inc/comments-wpbss.php';

 /**
  * Load other files.
  */
 require get_template_directory() . '/inc/header/index.php';
 require get_template_directory() . '/inc/footer/index.php';
 require get_template_directory() . '/inc/styles/index.php';

/*
Add Breadcrumbs NavXT support
*/
require get_template_directory() . '/inc/breadcrumbs/navxt/index.php';

/*
Add Seo Yoast Breadcrumbs
*/
require get_template_directory() . '/inc/breadcrumbs/seo-yoast/index.php';


/*
Add support Google Tag Manager
*/
include_once get_template_directory() . '/inc/google-tag-manager/gtm.php';
