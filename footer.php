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
                <div class="col-auto copyright">Copyright &copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>.</div>
                <div class="col-auto credit">A WrodPress theme By <a href="https://microsolutionsbd.com/" title="Micro Solutions Bangladesh" target="_blank">MSBD</a></div>
            </div>
        </div>
    </footer>    
</div>
<!-- /#page -->
<div id="goTop" class="hidegt">
    <i class="icofont-block-up"></i>
</div>

<?php wp_footer(); ?>
</body>
</html>
