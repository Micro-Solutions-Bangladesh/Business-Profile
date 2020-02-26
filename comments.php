<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-profile
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
    if ( have_comments() ) :
        $business_profile_comment_count = get_comments_number();
        ?>
        <div class="title-wrap">
            <h3 class="comments-title">
                <?php
                    if ( ! have_comments() ) {
                        _e( 'Leave a comment', 'business-profile' );
                    } elseif ( '1' === $business_profile_comment_count ) {
                        /* translators: %s: post title */
                        printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'business-profile' ), esc_html( get_the_title() ) );
                    } else {
                        echo sprintf(
                            /* translators: 1: number of comments, 2: post title */
                            _nx(
                                '%1$s reply on &ldquo;%2$s&rdquo;',
                                '%1$s replies on &ldquo;%2$s&rdquo;',
                                $business_profile_comment_count,
                                'comments title',
                                'business-profile'
                            ),
                            number_format_i18n( $business_profile_comment_count ),
                            esc_html( get_the_title() )
                        );
                    }
                ?>
            </h3>
        </div>
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 80,
                'max_depth' => 3,
                'walker'    => new BUSINESSPROFILE_Walker_Comment
			) );
			?>
		</ol>
		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments">
                <?php esc_html_e( 'Comments are closed.', 'business-profile' ); ?>
            </p>
			<?php
		endif;
	endif; // Check for have_comments().

    $args = business_profile_comment_field_items();
	comment_form( $args );
	?>
</div>
