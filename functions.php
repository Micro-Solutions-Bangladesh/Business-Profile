<?php
/**
 * business-profile functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package business-profile
 */

if ( ! function_exists( 'business_profile_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function business_profile_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on business-profile, use a find and replace
		 * to change 'business-profile' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'business-profile', get_template_directory() . '/languages' );

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
            'menu-1' => esc_html__( 'Primary', 'business-profile' ),
            'menu-footer' => esc_html__( 'Footer', 'business-profile' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
        ) );
        
        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'business_profile_custom_background_args', array(
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
add_action( 'after_setup_theme', 'business_profile_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_profile_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'business-profile' ),
		'id'            => 'sidebar-desktop',
		'description'   => esc_html__( 'Add widgets for desktop sidebar here.', 'business-profile' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Mobile 1', 'business-profile' ),
		'id'            => 'sidebar-mobile-1',
		'description'   => esc_html__( 'Add widgets for mobile 1st sidebar here.', 'business-profile' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Mobile 2', 'business-profile' ),
		'id'            => 'sidebar-mobile-2',
		'description'   => esc_html__( 'Add widgets for mobile 2nd sidebar here.', 'business-profile' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'business_profile_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function business_profile_scripts() {
    $business_profile_version = wp_get_theme()->get( 'Version' );
    if ( WP_DEBUG ) {
        $business_profile_version = time();
    }

    wp_enqueue_style( "bootstrap", get_theme_file_uri( "/assets/bootstrap-4.3.1/css/bootstrap.min.css" ), null, '4.3.1' );

    wp_enqueue_style( 'icofont', get_theme_file_uri( "/assets/icofont/icofont.min.css" ), null, '1.0.1' );

	wp_enqueue_style( 'business-profile-style', get_stylesheet_uri(), null, $business_profile_version );
    
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( "/assets/bootstrap-4.3.1/js/bootstrap.min.js" ), array( "jquery" ), '4.3.1', true );

    wp_enqueue_script( 'superfish', get_theme_file_uri( "/assets/superfish/js/superfish.min.js" ), array( "jquery" ), '1.7.10', true );

    wp_enqueue_script( 'snap', get_theme_file_uri( "/assets/snap.js/snap.min.js" ), array( "jquery" ), '1.9.2', true );

    wp_enqueue_script( 'business-profile', get_theme_file_uri( "/assets/js/custom.min.js" ), array( "jquery", "bootstrap", "superfish", "snap" ), $business_profile_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_profile_scripts' );

/**
 * Enqueue editor styles.
 */
function business_profile_editor_styles() {
	$classic_editor_styles = array(
		'/assets/css/editor-style.css',
	);

	add_editor_style( $classic_editor_styles );
}

add_action( 'init', 'business_profile_editor_styles' );


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
require get_template_directory() . '/inc/class-business-profile-walker-comment.php';
