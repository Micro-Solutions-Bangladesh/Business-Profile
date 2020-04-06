<?php
/**
 * Sanitize image
 */
function business_profile_sanitize_image( $image, $setting ) {
    /*
     * Array of valid image file types.
     *
     * The array includes image mime types that are included in wp_get_mime_types()
     */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    // Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : '' );
} 

/**
 * business-profile Theme Customizer
 *
 * @package business-profile
 */
function business_profile_customize_home_carousel( $wp_customize ) {
    // First item of Carousel
    $wp_customize->add_setting(
        'business_profile_home_carousel_image1', 
        array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'business_profile_sanitize_image',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'business_profile_home_carousel_image1', 
            array(
                'settings' => 'business_profile_home_carousel_image1',
                'label'    => __('Home Carousel Image 1', 'business-profile'),
                'section'  => 'business_profile_home_carousel',
            )
        )
    );

    // Second item of Carousel
    $wp_customize->add_setting(
        'business_profile_home_carousel_image2', 
        array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'business_profile_sanitize_image',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'business_profile_home_carousel_image2', 
            array(
                'settings' => 'business_profile_home_carousel_image2',
                'label'    => __('Home Carousel Image 2', 'business-profile'),
                'section'  => 'business_profile_home_carousel',
            )
        )
    );

    // Third item of Carousel
    $wp_customize->add_setting(
        'business_profile_home_carousel_image3', 
        array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'business_profile_sanitize_image',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'business_profile_home_carousel_image3', 
            array(
                'settings' => 'business_profile_home_carousel_image3',
                'label'    => __('Home Carousel Image 3', 'business-profile'),
                'section'  => 'business_profile_home_carousel',
            )
        )
    );
}

function business_profile_customize_social_urls( $wp_customize ) {
    //
    $wp_customize->add_setting('business_profile_social_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh'
    ));
    $wp_customize->add_control( 'business_profile_social_facebook', array(
        'settings' => 'business_profile_social_facebook',
        'label'    => esc_html__('Facebook Profile','business-profile'),
        'section'  => 'business_profile_social_urls',
        'type'     => 'url',
    ));

    //
    $wp_customize->add_setting('business_profile_social_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh'
    ));
    $wp_customize->add_control( 'business_profile_social_twitter', array(
        'settings' => 'business_profile_social_twitter',
        'label'    => esc_html__('Twitter Profile','business-profile'),
        'section'  => 'business_profile_social_urls',
        'type'     => 'url',
    ));

    //
    $wp_customize->add_setting('business_profile_social_pinterest', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh'
    ));
    $wp_customize->add_control( 'business_profile_social_pinterest', array(
        'settings' => 'business_profile_social_pinterest',
        'label'    => esc_html__('Pinterest Profile','business-profile'),
        'section'  => 'business_profile_social_urls',
        'type'     => 'url',
    ));

    //
    $wp_customize->add_setting('business_profile_social_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh'
    ));
    $wp_customize->add_control( 'business_profile_social_youtube', array(
        'settings' => 'business_profile_social_youtube',
        'label'    => esc_html__('Youtube Profile','business-profile'),
        'section'  => 'business_profile_social_urls',
        'type'     => 'url',
    ));

    //
    $wp_customize->add_setting('business_profile_social_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh'
    ));
    $wp_customize->add_control( 'business_profile_social_linkedin', array(
        'settings' => 'business_profile_social_linkedin',
        'label'    => esc_html__('LinkedIn Profile','business-profile'),
        'section'  => 'business_profile_social_urls',
        'type'     => 'url',
    ));
}


function business_profile_customize_admin_settings( $wp_customize ) {
    //
    $wp_customize->add_setting('business_profile_admin_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh'
    ));
    $wp_customize->add_control( 'business_profile_admin_email', array(
        'settings' => 'business_profile_admin_email',
        'label'    => esc_html__('Admin Email','business-profile'),
        'section'  => 'business_profile_admin_settings',
        'type'     => 'email',
    ));

    //
    $wp_customize->add_setting('business_profile_admin_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh'
    ));
    $wp_customize->add_control( 'business_profile_admin_phone', array(
        'settings' => 'business_profile_admin_phone',
        'label'    => esc_html__('Admin Phone','business-profile'),
        'section'  => 'business_profile_admin_settings',
        'type'     => 'text',
    ));
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_profile_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('header_image');

    $wp_customize->remove_control('header_textcolor');
    $wp_customize->remove_control('background_color');

    /**
	 * Home Carousel
	 */    
    $wp_customize->add_section(
        'business_profile_home_carousel', 
        array(
            'title'       => __('Home Carousel', 'business-profile'),
            'description' => '',
            'priority'    => 120,
        )
    );

    business_profile_customize_home_carousel( $wp_customize );

    $wp_customize->add_section(
        'business_profile_social_urls', 
        array(
            'title'       => __('Social Profiles', 'business-profile'),
            'description' => '',
            'priority'    => 121,
        )
    );

    business_profile_customize_social_urls( $wp_customize );

    $wp_customize->add_section(
        'business_profile_admin_settings', 
        array(
            'title'       => __('Admin Options', 'business-profile'),
            'description' => '',
            'priority'    => 122,
        )
    );

    business_profile_customize_admin_settings( $wp_customize );
    
}

add_action( 'customize_register', 'business_profile_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_profile_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_profile_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_profile_customize_preview_js() {
	wp_enqueue_script( 'business-profile-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'business_profile_customize_preview_js' );
