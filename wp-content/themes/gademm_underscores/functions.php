<?php
/**
 * gademm_underscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gademm_underscores
 */

if ( ! function_exists( 'gademm_underscores_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gademm_underscores_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gademm_underscores, use a find and replace
	 * to change 'gademm_underscores' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gademm_underscores', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'gademm_underscores' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'gademm_underscores' )
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gademm_underscores_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// adding custom logo 
	add_theme_support( 'custom-logo' );
}
endif;
add_action( 'after_setup_theme', 'gademm_underscores_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gademm_underscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gademm_underscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'gademm_underscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gademm_underscores_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gademm_underscores' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gademm_underscores' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gademm_underscores_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gademm_underscores_scripts() {
	wp_enqueue_style( 'gademm_underscores-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gademm_underscores-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gademm_underscores-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// wp_enqueue_script( 'gademm_underscores-masonry-plugin', get_template_directory_uri() . '/js/vendor/masonry.pkgd.min.js', array(), '20170511', true );

	// wp_enqueue_script( 'gademm_underscores-imagesloaded-plugin', get_template_directory_uri() . '/js/vendor/imagesloaded.pkgd.min.js', array(), '20170511', true );

	// wp_enqueue_script( 'gademm_underscores-swipebox-plugin', get_template_directory_uri() . '/js/vendor/jquery.swipebox.min.js', array(), '20170512', true );

	// wp_enqueue_script( 'gademm_underscores-slick-plugin', get_template_directory_uri() . '/js/vendor/slick.min.js', array(), '20170517', true );

	wp_enqueue_script( 'gademm_underscores-plugins', get_template_directory_uri() . '/js/vendor/plugins.js', array(), '20170518', true );

	wp_enqueue_script( 'gademm_underscores-custom-scripts', get_template_directory_uri() . '/js/gademm-scripts.js', array(), '20170510', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gademm_underscores_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Adding action for subcategories big pictures
 */

 if ( ! function_exists( 'gademm_subcategory_thumbnail' ) ) {

	/**
	 * Show subcategory thumbnails.
	 *
	 * @param mixed $category
	 * @subpackage	Loop
	 */
	function gademm_subcategory_thumbnail( $category ) {
		// $small_thumbnail_size  	= apply_filters( 'subcategory_archive_thumbnail_size', 'shop_catalog' );
		$small_thumbnail_size  	= ['1200', '500', '1'];
		$dimensions    			= wc_get_image_size( ['1200', '500', 1] );
		$thumbnail_id  			= get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

		if ( $thumbnail_id ) {
			$image        = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
			$image        = $image[0];
			$image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $small_thumbnail_size ) : false;
			$image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $small_thumbnail_size ) : false;
		} else {
			$image        = wc_placeholder_img_src();
			$image_srcset = $image_sizes = false;
		}

		if ( $image ) {
			// Prevent esc_url from breaking spaces in urls for image embeds
			// Ref: https://core.trac.wordpress.org/ticket/23605
			$image = str_replace( ' ', '%20', $image );

			// Add responsive image markup if available
			if ( $image_srcset && $image_sizes ) {
				echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" />';
			} else {
				echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
			}
		}
	}
}

 add_action( 'gademm_before_subcategory_title', 'gademm_subcategory_thumbnail' );

 /**
 * Display the classes for the product cat div.
 *
 * @since 2.4.0
 * @param string|array $class One or more classes to add to the class list.
 * @param object $category object Optional.
 */
function gademm_product_cat_class( $class = '', $category = null ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="collection-item ' . esc_attr( join( ' ', wc_get_product_cat_class( $class, $category ) ) ) . '"';
}