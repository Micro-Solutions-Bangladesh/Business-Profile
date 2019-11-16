<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package businessprofile
 */
if ( ! function_exists( 'businessprofile_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function businessprofile_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'businessprofile' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'businessprofile_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function businessprofile_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'businessprofile' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'businessprofile_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function businessprofile_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'businessprofile' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'businessprofile' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'businessprofile' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links"><i class="icofont-tags"></i>' . esc_html__( '%1$s', 'businessprofile' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'businessprofile' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'businessprofile' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link"><i class="icofont-edit"></i>',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'businessprofile_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function businessprofile_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
		?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php else : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                    <?php
                    the_post_thumbnail( 'post-thumbnail', array(
                        'alt' => the_title_attribute( array(
                            'echo' => false,
                        ) ),
                    ) );
                    ?>
                </a>
            </div>
		<?php
		endif; // End is_singular().
	}
endif;


/**
 *
 */
if ( ! function_exists( 'businessprofile_the_custom_logo' ) ) :
    function businessprofile_the_custom_logo($echo=true) {
        $html = "";
        if ( current_theme_supports( 'custom-logo' ) ) {
            $html = get_custom_logo();
        }
        if( empty($html) ) {
            $html = sprintf(
                '<a href="%s" class="text-logo-link" title="%s">%s</a>',
                esc_url( site_url() ),
                get_bloginfo( 'description', 'display' ),
                get_bloginfo("name")
            );
        }
        if( $echo ) {
            echo $html;
        } else {
            return $html;
        }
    }
endif;


/**
 * 
 */
if ( ! function_exists( 'businessprofile_get_social_links' ) ) :
    function businessprofile_get_social_links($startWith='', $endWith='', $sepaerator='') {
        $items = array();

        $facebook = get_theme_mod( 'businessprofile_social_facebook' );
        if ( !empty($facebook) ) {
            $items[] = sprintf(
                '<a href="%s" class="facebook" title="Follow Us on Facebook" target="_blank"><i class="icofont-facebook"></i></a>',
                esc_url($facebook)
            );
        }

        $twitter = get_theme_mod( 'businessprofile_social_twitter' );
        if ( !empty($twitter) ) {
            $items[] = sprintf(
                '<a href="%s" class="twitter" title="Follow Us on Twitter" target="_blank"><i class="icofont-twitter"></i></a>',
                esc_url($twitter)
            );
        }

        $pinterest = get_theme_mod( 'businessprofile_social_pinterest' );
        if ( !empty($pinterest) ) {
            $items[] = sprintf(
                '<a href="%s" class="pinterest" title="Follow Us on Pinterest" target="_blank"><i class="icofont-pinterest"></i></a>',
                esc_url($pinterest)
            );
        }

        $youtube = get_theme_mod( 'businessprofile_social_youtube' );
        if ( !empty($youtube) ) {
            $items[] = sprintf(
                '<a href="%s" class="youtube" title="Follow Us on Youtube" target="_blank"><i class="icofont-youtube"></i></a>',
                esc_url($youtube)
            );
        }

        $linkedin = get_theme_mod( 'businessprofile_social_linkedin' );
        if ( !empty($linkedin) ) {
            $items[] = sprintf(
                '<a href="%s" class="linkedin" title="Follow Us on Linkedin" target="_blank"><i class="icofont-linkedin"></i></a>',
                esc_url($linkedin)
            );
        }

        if( empty($items) ) {
            return '';
        }

        return sprintf('%s %s %s', $startWith, join($sepaerator, $items), $endWith);
    }
endif;


/**
 * 
 */
if ( ! function_exists( 'businessprofile_get_search_form' ) ) :
    function businessprofile_get_search_form( $form ) {
        $form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
                <label>
                    <span class="screen-reader-text">' . __( 'Search for:', 'businessprofile' ) . '</span>
                    <input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder', 'businessprofile' ) . '" value="' . get_search_query() . '" name="s" />
                </label>
                <button type="submit" class="search-submit"><i class="icofont-search-2"></i></button>
            </form>';

        return $form;
    }
endif;

add_filter('get_search_form', 'businessprofile_get_search_form');

