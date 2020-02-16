<?php
/*
 * Template Name: Coming Soon Template
 *
 * @package business-profile
 */

get_header('empty');
?>
    <main id="main" class="site-main coming-soon">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <header class="header-brand">
            <?php business_profile_the_custom_logo(); ?>
        </header>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content(); ?>
        </article>
        <footer>
            <div class="copyright-content">
                <span class="copyright">
                    <?php _e( 'Copyright', 'business-profile'); ?> &copy; <?php echo date_i18n(
                        _x( 'Y', 'copyright date format', 'business-profile' )
                    ); ?> <?php bloginfo('name'); ?>.
                </span> 
                <span class="credit">
                    <?php _e( 'Powered by', 'business-profile'); ?> <a href="https://microsolutionsbd.com/" title="<?php _e( 'Micro Solutions Bangladesh', 'business-profile'); ?>" target="_blank">
                        <?php _e( 'MSBD', 'business-profile'); ?>
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
