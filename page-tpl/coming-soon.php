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
                <span class="copyright">Copyright &copy; <?php echo date("Y"); ?> <?php echo get_bloginfo("name"); ?> All Rights Reserved.</span> <span class="credit">Design and Developed By <a href="https://microsolutionsbd.com/" title="" target="_blank">MSBD</a></span>
            </div>
        </footer>
        <?php
    endwhile; // End of the loop.
    ?>
    </main>
<?php
get_footer('empty');
