            </div>
        </div>
    </div>
    <!-- /#site-main -->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="footer-nav">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-footer',
                            'menu_id'        => 'footer-menu',
                            'container'			=> 'ul',
                        ) );
                    ?>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-auto copyright">
                    <?php _e( 'Copyright', 'business-profile'); ?> &copy; <?php echo date_i18n(
                        _x( 'Y', 'copyright date format', 'business-profile' )
                    ); ?> <?php bloginfo('name'); ?>.
                </div>
                <div class="col-auto credit">
                    <?php
                    echo sprintf(
                        'Theme by <a href="https://microsolutionsbd.com/" title="%s" target="_blank">%s</a>',
                        __( 'Micro Solutions Bangladesh', 'business-profile' ),
                        __( 'MSBD', 'business-profile' )
                    );
                    ?>
                </div>
            </div>
        </div>
    </footer>    
</div>
<!-- /#page -->
<buttom id="goTop" class="hidegt">
    <i class="icofont-block-up"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>
