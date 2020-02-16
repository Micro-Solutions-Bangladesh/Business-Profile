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
        $businessprofile_comment_count = get_comments_number();
        ?>
        <div class="title-wrap">
            <h3 class="comments-title">
                <?php
                    if ( ! have_comments() ) {
                        _e( 'Leave a comment', 'business-profile' );
                    } elseif ( '1' === $businessprofile_comment_count ) {
                        /* translators: %s: post title */
                        printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'business-profile' ), esc_html( get_the_title() ) );
                    } else {
                        echo sprintf(
                            /* translators: 1: number of comments, 2: post title */
                            _nx(
                                '%1$s reply on &ldquo;%2$s&rdquo;',
                                '%1$s replies on &ldquo;%2$s&rdquo;',
                                $businessprofile_comment_count,
                                'comments title',
                                'business-profile'
                            ),
                            number_format_i18n( $businessprofile_comment_count ),
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

    $businessprofile_commenter = wp_get_current_commenter();
    $businessprofile_html_req = " required='required'";
    $businessprofile_custom_fields  = array(
        'author'    => '<div class="form-row mb-3 comment-input-wrap"><div class="col-sm-4 comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $businessprofile_commenter['comment_author'] ) . '" size="30" maxlength="245" placeholder="' . __("Name", 'business-profile') . '" class="form-control"' . $businessprofile_html_req . '></div>',
        
        'email'     => '<div class="col-sm-4 comment-form-email"><input id="email" name="email" type="email" value="' . esc_attr( $businessprofile_commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes" placeholder="' . __("Email", 'business-profile') . '" class="form-control"' . $businessprofile_html_req . '></div>',

        'url'       => '<div class="col-sm-4 comment-form-url"><input id="url" name="url" type="url" value="' . esc_attr( $businessprofile_commenter['comment_author_url'] ) . '" class="form-control" size="30" maxlength="200" placeholder="' . __("Website", 'business-profile') . '"></div></div>',
    );
    
    $args = array(
        'fields'    => $businessprofile_custom_fields,

        'comment_field' =>  '<div class="form-row mb-3"><div class="col comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control" placeholder="' . __("Comment", 'business-profile') . '"></textarea></div></div>',

        'class_submit'  => 'submit btn btn-primary'
    );
	comment_form($args);
	?>
</div>
