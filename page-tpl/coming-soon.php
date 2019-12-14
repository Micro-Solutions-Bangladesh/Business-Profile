<?php
/*
 * Template Name: Coming Soon Template
 *
 * @package businessprofile
 */

get_header('empty');
?>
    <main id="main" class="site-main coming-soon">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <header class="header-brand">
            <?php businessprofile_the_custom_logo(); ?>
        </header>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content(); ?>
        </article>
        <footer>
            <div class="copyright-content">
                <span class="copyright">
                    <?php _e( 'Copyright', 'businessprofile'); ?> &copy; <?php echo date_i18n(
                        _x( 'Y', 'copyright date format', 'businessprofile' )
                    ); ?> <?php bloginfo('name'); ?>.
                </span> 
                <span class="credit">
                    <?php _e( 'Powered by', 'businessprofile'); ?> <a href="https://microsolutionsbd.com/" title="<?php _e( 'Micro Solutions Bangladesh', 'businessprofile'); ?>" target="_blank">
                        <?php _e( 'MSBD', 'businessprofile'); ?>
                    </a>
                </span>
            </div>
        </footer>
        <?php
    endwhile;
    ?>
    </main>
<?php
get_footer('empty');
