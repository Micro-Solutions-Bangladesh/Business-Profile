<?php
/**
 * msbdbp Theme Customizer
 *
 * @package msbdbp
 */

function msbdbp_customize_home_carousel( $wp_customize ) {
    // First item of Carousel
    $wp_customize->add_setting(
        'msbdbp_home_carousel_image1', 
        array(
            'transport'   => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'msbdbp_home_carousel_image1', 
            array(
                'settings' => 'msbdbp_home_carousel_image1',
                'label'    => __('Home Carousel Image 1', 'msbdbp'),
                'section'  => 'msbdbp_home_carousel',
            )
        )
    );

    // Second item of Carousel
    $wp_customize->add_setting(
        'msbdbp_home_carousel_image2', 
        array(
            'transport'   => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'msbdbp_home_carousel_image2', 
            array(
                'settings' => 'msbdbp_home_carousel_image2',
                'label'    => __('Home Carousel Image 2', 'msbdbp'),
                'section'  => 'msbdbp_home_carousel',
            )
        )
    );

    // Third item of Carousel
    $wp_customize->add_setting(
        'msbdbp_home_carousel_image3', 
        array(
            'transport'   => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'msbdbp_home_carousel_image3', 
            array(
                'settings' => 'msbdbp_home_carousel_image3',
                'label'    => __('Home Carousel Image 3', 'msbdbp'),
                'section'  => 'msbdbp_home_carousel',
            )
        )
    );
}

function msbdbp_customize_social_urls( $wp_customize ) {
    //
    $wp_customize->add_setting('msbdbp_social_facebook', array(
        'default'        => esc_html__('','msbdbp'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'msbdbp_social_facebook', array(
        'settings' => 'msbdbp_social_facebook',
        'label'   =>  esc_html__('Facebook Profile','msbdbp'),
        'section' => 'msbdbp_social_urls',
        'type'    => 'url',
    ));

    //
    $wp_customize->add_setting('msbdbp_social_twitter', array(
        'default'        => esc_html__('','msbdbp'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'msbdbp_social_twitter', array(
        'settings' => 'msbdbp_social_twitter',
        'label'   =>  esc_html__('Twitter Profile','msbdbp'),
        'section' => 'msbdbp_social_urls',
        'type'    => 'url',
    ));

    //
    $wp_customize->add_setting('msbdbp_social_pinterest', array(
        'default'        => esc_html__('','msbdbp'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'msbdbp_social_pinterest', array(
        'settings' => 'msbdbp_social_pinterest',
        'label'   =>  esc_html__('Pinterest Profile','msbdbp'),
        'section' => 'msbdbp_social_urls',
        'type'    => 'url',
    ));

    //
    $wp_customize->add_setting('msbdbp_social_youtube', array(
        'default'        => esc_html__('','msbdbp'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'msbdbp_social_youtube', array(
        'settings' => 'msbdbp_social_youtube',
        'label'   =>  esc_html__('Youtube Profile','msbdbp'),
        'section' => 'msbdbp_social_urls',
        'type'    => 'url',
    ));

    //
    $wp_customize->add_setting('msbdbp_social_linkedin', array(
        'default'        => esc_html__('','msbdbp'),
        'sanitize_callback' => 'esc_url',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'msbdbp_social_linkedin', array(
        'settings' => 'msbdbp_social_linkedin',
        'label'   =>  esc_html__('LinkedIn Profile','msbdbp'),
        'section' => 'msbdbp_social_urls',
        'type'    => 'url',
    ));
}


function msbdbp_customize_admin_settings( $wp_customize ) {
    //
    $wp_customize->add_setting('msbdbp_admin_email', array(
        'default'        => esc_html__('','msbdbp'),
        'sanitize_callback' => 'sanitize_email',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'msbdbp_admin_email', array(
        'settings' => 'msbdbp_admin_email',
        'label'   =>  esc_html__('Admin Email','msbdbp'),
        'section' => 'msbdbp_admin_settings',
        'type'    => 'email',
    ));

    //
    $wp_customize->add_setting('msbdbp_admin_phone', array(
        'default'        => esc_html__('','msbdbp'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'msbdbp_admin_phone', array(
        'settings' => 'msbdbp_admin_phone',
        'label'   =>  esc_html__('Admin Phone','msbdbp'),
        'section' => 'msbdbp_admin_settings',
        'type'    => 'email',
    ));
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function msbdbp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /**
	 * Home Carousel
	 */    
    $wp_customize->add_section(
        'msbdbp_home_carousel', 
        array(
            'title'    => __('Home Carousel', 'msbdbp'),
            'description' => '',
            'priority' => 120,
        )
    );

    msbdbp_customize_home_carousel( $wp_customize );

    $wp_customize->add_section(
        'msbdbp_social_urls', 
        array(
            'title'    => __('Social Profiles', 'msbdbp'),
            'description' => '',
            'priority' => 121,
        )
    );

    msbdbp_customize_social_urls( $wp_customize );

    $wp_customize->add_section(
        'msbdbp_admin_settings', 
        array(
            'title'    => __('Admin Options', 'msbdbp'),
            'description' => '',
            'priority' => 122,
        )
    );

    msbdbp_customize_admin_settings( $wp_customize );
    
}

add_action( 'customize_register', 'msbdbp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function msbdbp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function msbdbp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function msbdbp_customize_preview_js() {
	wp_enqueue_script( 'msbdbp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'msbdbp_customize_preview_js' );
