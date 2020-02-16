<?php
/**
 * business-profile Theme Customizer
 *
 * @package business-profile
 */

function businessprofile_customize_home_carousel( $wp_customize ) {
    // First item of Carousel
    $wp_customize->add_setting(
        'businessprofile_home_carousel_image1', 
        array(
            'transport'   => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'businessprofile_home_carousel_image1', 
            array(
                'settings' => 'businessprofile_home_carousel_image1',
                'label'    => __('Home Carousel Image 1', 'business-profile'),
                'section'  => 'businessprofile_home_carousel',
            )
        )
    );

    // Second item of Carousel
    $wp_customize->add_setting(
        'businessprofile_home_carousel_image2', 
        array(
            'transport'   => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'businessprofile_home_carousel_image2', 
            array(
                'settings' => 'businessprofile_home_carousel_image2',
                'label'    => __('Home Carousel Image 2', 'business-profile'),
                'section'  => 'businessprofile_home_carousel',
            )
        )
    );

    // Third item of Carousel
    $wp_customize->add_setting(
        'businessprofile_home_carousel_image3', 
        array(
            'transport'   => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'businessprofile_home_carousel_image3', 
            array(
                'settings' => 'businessprofile_home_carousel_image3',
                'label'    => __('Home Carousel Image 3', 'business-profile'),
                'section'  => 'businessprofile_home_carousel',
            )
        )
    );
}

function businessprofile_customize_social_urls( $wp_customize ) {
    //
    $wp_customize->add_setting('businessprofile_social_facebook', array(
        'default'        => esc_html__('','business-profile'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'businessprofile_social_facebook', array(
        'settings' => 'businessprofile_social_facebook',
        'label'   =>  esc_html__('Facebook Profile','business-profile'),
        'section' => 'businessprofile_social_urls',
        'type'    => 'url',
    ));

    //
    $wp_customize->add_setting('businessprofile_social_twitter', array(
        'default'        => esc_html__('','business-profile'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'businessprofile_social_twitter', array(
        'settings' => 'businessprofile_social_twitter',
        'label'   =>  esc_html__('Twitter Profile','business-profile'),
        'section' => 'businessprofile_social_urls',
        'type'    => 'url',
    ));

    //
    $wp_customize->add_setting('businessprofile_social_pinterest', array(
        'default'        => esc_html__('','business-profile'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'businessprofile_social_pinterest', array(
        'settings' => 'businessprofile_social_pinterest',
        'label'   =>  esc_html__('Pinterest Profile','business-profile'),
        'section' => 'businessprofile_social_urls',
        'type'    => 'url',
    ));

    //
    $wp_customize->add_setting('businessprofile_social_youtube', array(
        'default'        => esc_html__('','business-profile'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'businessprofile_social_youtube', array(
        'settings' => 'businessprofile_social_youtube',
        'label'   =>  esc_html__('Youtube Profile','business-profile'),
        'section' => 'businessprofile_social_urls',
        'type'    => 'url',
    ));

    //
    $wp_customize->add_setting('businessprofile_social_linkedin', array(
        'default'        => esc_html__('','business-profile'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'businessprofile_social_linkedin', array(
        'settings' => 'businessprofile_social_linkedin',
        'label'   =>  esc_html__('LinkedIn Profile','business-profile'),
        'section' => 'businessprofile_social_urls',
        'type'    => 'url',
    ));
}


function businessprofile_customize_admin_settings( $wp_customize ) {
    //
    $wp_customize->add_setting('businessprofile_admin_email', array(
        'default'        => esc_html__('','business-profile'),
        'sanitize_callback' => 'sanitize_email',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'businessprofile_admin_email', array(
        'settings' => 'businessprofile_admin_email',
        'label'   =>  esc_html__('Admin Email','business-profile'),
        'section' => 'businessprofile_admin_settings',
        'type'    => 'email',
    ));

    //
    $wp_customize->add_setting('businessprofile_admin_phone', array(
        'default'        => esc_html__('','business-profile'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'businessprofile_admin_phone', array(
        'settings' => 'businessprofile_admin_phone',
        'label'   =>  esc_html__('Admin Phone','business-profile'),
        'section' => 'businessprofile_admin_settings',
        'type'    => 'email',
    ));
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function businessprofile_customize_register( $wp_customize ) {
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
        'businessprofile_home_carousel', 
        array(
            'title'    => __('Home Carousel', 'business-profile'),
            'description' => '',
            'priority' => 120,
        )
    );

    businessprofile_customize_home_carousel( $wp_customize );

    $wp_customize->add_section(
        'businessprofile_social_urls', 
        array(
            'title'    => __('Social Profiles', 'business-profile'),
            'description' => '',
            'priority' => 121,
        )
    );

    businessprofile_customize_social_urls( $wp_customize );

    $wp_customize->add_section(
        'businessprofile_admin_settings', 
        array(
            'title'    => __('Admin Options', 'business-profile'),
            'description' => '',
            'priority' => 122,
        )
    );

    businessprofile_customize_admin_settings( $wp_customize );
    
}

add_action( 'customize_register', 'businessprofile_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function businessprofile_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function businessprofile_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function businessprofile_customize_preview_js() {
	wp_enqueue_script( 'businessprofile-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'businessprofile_customize_preview_js' );
