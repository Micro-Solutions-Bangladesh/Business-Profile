<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business-profile
 */
?>
<?php if ( is_active_sidebar( 'sidebar-desktop' ) && !wp_is_mobile() ) { ?>
<aside id="right-sidebar" class="widget-area sidebar">
	<?php dynamic_sidebar( 'sidebar-desktop' ); ?>
</aside>
<?php } elseif ( is_active_sidebar( 'sidebar-mobile-2' ) && wp_is_mobile() ) { ?>
<aside id="right-sidebar" class="widget-area sidebar">
	<?php dynamic_sidebar( 'sidebar-mobile-2' ); ?>
</aside>
<?php } ?>
