<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-profile
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php business_profile_post_thumbnail(); ?>

    <header class="content-header">
        <?php
            if ( is_singular() ) :
                the_title( '<h1 class="content-title">', '</h1>' );
            else :
                the_title( '<h2 class="content-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

            if ( 'post' === get_post_type() ) :
        ?>
                <div class="entry-meta">
                    <?php
                    business_profile_posted_on();
                    business_profile_posted_by();
                    ?>
                </div><!-- .entry-meta -->
        <?php endif; ?>
    </header>
    
	<div class="entry-content">
    <?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span><span class="icofont-long-arrow-right"></span>', 'business-profile' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

        if ( is_singular() ) {
            wp_link_pages( array(
                'before' => '<div class="page-links"><span class="section-label">' . esc_html__( 'Pages:', 'business-profile' ) . "</span>",
                'after'  => '</div>',
            ) );
        }
    ?>
	</div><!-- .entry-content -->

    <?php if ( is_singular() ) : ?>
        <footer class="entry-footer">
            <?php business_profile_entry_footer(); ?>
        </footer>
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
