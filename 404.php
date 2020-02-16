<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package business-profile
 */

get_header();
?>
    <main id="main" class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'business-profile' ); ?></h1>
        </header><!-- .page-header -->

        <div class="entry-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'business-profile' ); ?></p>

            <?php get_search_form(); ?>
        </div>

        <footer class="entry-footer">
            
        </footer>
    </main>
<?php
get_footer();
