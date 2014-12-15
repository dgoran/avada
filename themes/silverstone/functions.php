<?php
/**
 * SilverStone functions and definitions
 *
 * @package SilverStone
 */


if ( ! function_exists( 'SilverStone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function SilverStone_setup() {
	
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SilverStone, use a find and replace
	 * to change 'silverstone' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'silverstone', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'silverstone' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	if ( get_stylesheet_directory() == get_template_directory() ) {
		add_theme_support( 'custom-background', apply_filters( 'SilverStone_custom_background_args', array(
			'default-color' => 'e6e6e6',
			'default-image' => get_template_directory_uri() . '/skins/images/SilverStone/page_bg.png',
		) ) );			
	}else {
		add_theme_support( 'custom-background', apply_filters( 'SilverStone_custom_background_args', array(
			'default-color' => 'e7e8e7',
			'default-image' => get_stylesheet_directory_uri() . '/images/page_bg.png',
		) ) );					  
	}
	  	
}
endif; // SilverStone_setup
add_action( 'after_setup_theme', 'SilverStone_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function SilverStone_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'silverstone' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left Widget Area', 'silverstone' ),
		'id'            => 'sidebar-footer-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Center Left Widget Area', 'silverstone' ),
		'id'            => 'sidebar-footer-center-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Center Right Widget Area', 'silverstone' ),
		'id'            => 'sidebar-footer-center-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right Widget Area', 'silverstone' ),
		'id'            => 'sidebar-footer-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );				
}
add_action( 'widgets_init', 'SilverStone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function SilverStone_scripts() {

	global $wp_styles;
	 	
	if ( get_stylesheet_directory() != get_template_directory() ) {
		wp_enqueue_style( 'SilverStone-parent-style', get_template_directory_uri().'/style.css' );
	}
		
	wp_enqueue_style( 'SilverStone-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'SilverStone-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans|Titillium+Web:200,400,600,700' );
	
	wp_enqueue_style( 'SilverStone-ie', get_stylesheet_directory_uri() . "/fixed.css" );
	$wp_styles->add_data( 'SilverStone-ie', 'conditional', 'lt IE 9' );	
	
	wp_enqueue_script( 'SilverStone-tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array('jquery'), false, false );
	
	wp_enqueue_script( 'SilverStone-sticky-header', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), false, false );
	
	wp_enqueue_script( 'SilverStone-general', get_template_directory_uri() . '/js/general.js', array(), false, true );
	
	if(is_front_page()){
	wp_enqueue_script( 'SilverStone-frontpage-header', get_template_directory_uri() . '/js/front-page.js', array(), false, true );
	}	
	
	wp_enqueue_script( 'SilverStone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'SilverStone_scripts' );

function SilverStone_header_adons(){
	if( get_theme_mod('SilverStone_frontpage_header_background') ){
		$SilverStone_front_page_header = esc_url(get_theme_mod('SilverStone_frontpage_header_background'));
	}else{
		$SilverStone_front_page_header = get_template_directory_uri().'/skins/images/header.jpg';
	}
	$SilverStone_front_page_header_visibility = 1 - (esc_attr(get_theme_mod('SilverStone_frontpage_header_background_visibility', 5)) / 100);
	echo '<style>';
	echo '.frontpage-header{background:url('.$SilverStone_front_page_header.') center center no-repeat;}';
	echo '.frontpage-header-overlay{background:rgba(157,163,170,'.$SilverStone_front_page_header_visibility.')}';
	echo '</style>';

	echo '<!--[if lt IE 9]><script src="'.get_template_directory_uri().'/js/html5shiv.min.js"></script><![endif]-->';
}
add_action( 'wp_head', 'SilverStone_header_adons' );

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
