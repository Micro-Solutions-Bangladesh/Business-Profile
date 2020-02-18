<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business-profile
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page">
    <section class="header-bar">
        <div class="container">
            <div class="row"></div>
        </div>
    </section>

    <header id="header">
        <div class="container">
            <div class="row justify-content-between">
                <div class="logo">
                    <?php business_profile_the_custom_logo(); ?>
                </div>
                
                <div class="quick-contacts">
                    <div class="social with-color">
                        <?php echo business_profile_get_social_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="top_nav" class="top-nav">
        <div class="container">
            <div class="row">
                <nav>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'        => 'sf-menu',
                        'container'			=> 'ul',
                    ) );
                ?>
                </nav>
            </div>
            <!-- /. row -->
        </div>
    </div>

    <?php get_template_part( 'template-parts/content', 'carousel' ); ?>

    <div id="site-main" role="main-body">
        <div class="container">
            <div class="row">
