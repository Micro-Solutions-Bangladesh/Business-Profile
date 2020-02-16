<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package businessprofile
 */

 /**
  * 
  */
function businessprofile_attachment_url_to_post_thumbnail( $srcurl ) {
    $postid = attachment_url_to_postid($srcurl);
    $rs = '';
    
    if( $postid > 0 ) {
        $rs = wp_get_attachment_image($postid, 'full');
    }

    if( !$srcurl && (!empty($rs) && $rs!==false) ) {
        $rs = sprintf(
            '<img src="%s" />',
            $srcurl
        );
    }

	return $rs;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function businessprofile_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
    }
    
    $is_mobile_sidebar = ( wp_is_mobile() && ( is_active_sidebar( 'sidebar-mobile-1' ) || is_active_sidebar( 'sidebar-mobile-2' ) ) ) ? true : false;

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! ( is_active_sidebar( 'sidebar-desktop' ) || $is_mobile_sidebar ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'businessprofile_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function businessprofile_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'businessprofile_pingback_header' );

/**
 * Customize comment form fields including the fields wrapper
 */
add_filter( 'comment_form_default_fields', 'businessprofile_commentd_fields' );

function businessprofile_commentd_fields( $fields ) {
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );

    $fields['author'] = '<div class="form-row mb-3 comment-input-wrap"><div class="col-sm-4 comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" placeholder="' . __("Name", 'business-profile') . '" class="form-control"' . $html_req . $aria_req . '></div>';

    $fields['email'] = '<div class="col-sm-4 comment-form-email"><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes" placeholder="' . __("Email", 'business-profile') . '" class="form-control"' . $html_req . $aria_req . '></div>';

    $fields['url'] = '<div class="col-sm-4 comment-form-url"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="form-control" size="30" maxlength="200" placeholder="' . __("Website", 'business-profile') . '"></div></div>';

    return $fields;
}

