<?php
/**
 * msbdbp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package msbdbp
 */

if ( WP_DEBUG ) {
    define( 'MSBDBP_VERSION', time() );
} else {
    define( 'MSBDBP_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! function_exists( 'msbdbp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function msbdbp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on msbdbp, use a find and replace
		 * to change 'msbdbp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'msbdbp', get_template_directory() . '/languages' );

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
            'menu-1' => esc_html__( 'Primary', 'msbdbp' ),
            'menu-footer' => esc_html__( 'Footer', 'msbdbp' ),
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
		add_theme_support( 'custom-background', apply_filters( 'msbdbp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

        // Set content-width.
        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 580;
        }
    
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'msbdbp_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function msbdbp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'msbdbp' ),
		'id'            => 'sidebar-desktop',
		'description'   => esc_html__( 'Add widgets for desktop sidebar here.', 'msbdbp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Mobile 1', 'msbdbp' ),
		'id'            => 'sidebar-mobile-1',
		'description'   => esc_html__( 'Add widgets for mobile 1st sidebar here.', 'msbdbp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Mobile 2', 'msbdbp' ),
		'id'            => 'sidebar-mobile-2',
		'description'   => esc_html__( 'Add widgets for mobile 2nd sidebar here.', 'msbdbp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'msbdbp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function msbdbp_scripts() {
    wp_enqueue_style( "bootstrap", get_theme_file_uri( "/assets/bootstrap-4.3.1/css/bootstrap.min.css" ), null, MSBDBP_VERSION );

    wp_enqueue_style( 'icofont', get_theme_file_uri( "/assets/icofont/icofont.min.css" ), null, MSBDBP_VERSION );

	wp_enqueue_style( 'msbdbp-style', get_stylesheet_uri(), null, MSBDBP_VERSION );
    
    wp_enqueue_script( 'snap', get_theme_file_uri( "/assets/bootstrap-4.3.1/js/bootstrap.min.js" ), array( "jquery" ), MSBDBP_VERSION, true );

    wp_enqueue_script( 'superfish', get_theme_file_uri( "/assets/superfish/js/superfish.min.js" ), array( "jquery" ), MSBDBP_VERSION, true );

    wp_enqueue_script( 'snap-js', get_theme_file_uri( "/assets/snap.js/snap.min.js" ), array( "jquery" ), MSBDBP_VERSION, true );

    wp_enqueue_script( 'msbdbp-js', get_theme_file_uri( "/assets/js/custom.min.js" ), array( "jquery", "superfish", "snap" ), MSBDBP_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'msbdbp_scripts' );

/**
 * Enqueue editor styles.
 */
function msbdbp_editor_styles() {
	$classic_editor_styles = array(
		'/assets/css/editor-style.css',
	);

	add_editor_style( $classic_editor_styles );
}

add_action( 'init', 'msbdbp_editor_styles' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * 
 */
require get_template_directory() . '/inc/class-msbdbp-walker-comment.php';
