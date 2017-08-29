<?php
/**
 * WordFes Nagoya 2015 functions and definitions
 *
 * @package WordFes Nagoya 2015
 */

if ( ! function_exists( 'wordfes2016_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordfes2016_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	 //add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		//'primary'   => esc_html__( 'Primary Menu',   'wordfes2016' ),
		'secondary' => esc_html__( 'Secondary Menu', 'wordfes2016' ),
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

}
endif; // wordfes2016_setup

add_action( 'after_setup_theme', 'wordfes2016_setup' );


/* ウィジェット追加 */
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'バナーエリア',
		'id' => 'banner-area',
		'description' => 'バナーを表示するエリア',
		'before_widget' => '<div class="banner-item">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => ''
	));
}



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordfes2016_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordfes2016_content_width', 1000 );
}

add_action( 'after_setup_theme', 'wordfes2016_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function wordfes2016_scripts() {
	wp_enqueue_style( 'wfn2016-style', get_stylesheet_uri() );

	// bootstrap
	wp_enqueue_style( 'wfn2016-bootstrap', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'wfn2016-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );

	// font

	// css
	wp_enqueue_style( 'wfn2016-base',      get_template_directory_uri() . '/css/base.css' );
	wp_enqueue_style( 'wfn2016-supporter', get_template_directory_uri() . '/css/supporter.css' );
	wp_enqueue_style( 'wfn2016-slider',    get_template_directory_uri() . '/css/jquery.bxslider.css' );
	
	if( is_front_page() ) {
		
		wp_enqueue_style( 'wfn2016-home', get_template_directory_uri() . '/css/home.css' );
		
	} elseif ( is_page('test') ) {
		
		wp_enqueue_style( 'wfn2016-home', get_template_directory_uri() . '/css/home.css' );
		wp_enqueue_style( 'wfn2016-test', get_template_directory_uri() . '/css/test.css' );
		
	} elseif ( is_singular('sessions') || is_page('sessions') ) {
		
		wp_enqueue_style( 'wfn2016-page', get_template_directory_uri() . '/css/page.css' );
		
		wp_enqueue_style( 'wfn2016-sessions' , get_template_directory_uri() . '/css/sessions.css' );
		
	} else {
		
		wp_enqueue_style( 'wfn2016-page', get_template_directory_uri() . '/css/page.css' );
		
		$post_type = get_query_var('post_type') ? get_query_var('post_type') : get_query_var('pagename');
		
		$file_name = get_template_directory_uri() . '/css/' . esc_attr( $post_type ) . '.css';
		//$file_name = '/wp-content/themes/wfn2016/css/sessions.css';
		
		if ( 'contact' == $post_type ) {
			
			wp_enqueue_style( 'wfn2016-' . esc_attr( $post_type ), $file_name );
			
		}
		
		//wp_enqueue_style( 'wfn2016-' . esc_attr( $post_type ), $file_name );
		
	}

	// js
	wp_enqueue_script( 'wordfes2016-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );
	wp_enqueue_script( 'wordfes2016-tile', get_template_directory_uri() . '/js/tile.js', array(), null, true );
	wp_enqueue_script( 'wordfes2016-scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true );
	wp_enqueue_script( 'wordfes2016-slider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), null, true );

	// bootstrap
	wp_enqueue_script( 'wordfes2016-bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true );

	// comment-reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'wordfes2016_scripts' );


/**
 * Enqueue scripts and styles.
 */
function custom_pre_get_posts( $query ) {

	if ( ! is_admin() ) {
		
		if ( is_user_logged_in() ) {
			
			if ( 'post' == $query->query_vars['post_type'] || 'topics' == $query->query_vars['post_type'] ) {
			
				$query->set( 'post_status', array( 'publish', 'draft', 'private' ) );
			
			}
			
		}

	}
	
	//echo '<pre>'; var_dump( $query->query_vars['post_type'] ); echo '</pre>';
	
	return $query;
	
}
add_action( 'pre_get_posts', 'custom_pre_get_posts' );




/**
 * Load custom post type.
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Load custom taxonomy.
 */
require get_template_directory() . '/inc/custom-taxonomy.php';

/**
 * Load custom-media-size.
 */
require get_template_directory() . '/inc/custom-media-size.php';

/**
 * Load custom-shortcode.
 */
require get_template_directory() . '/inc/custom-shortcode.php';

/**
 * Load custom-function.
 */
require get_template_directory() . '/inc/custom-function.php';

/**
 * Load custom-style.
 */
require get_template_directory() . '/inc/custom-style.php';


