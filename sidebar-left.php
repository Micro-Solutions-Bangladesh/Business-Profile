<?php
/**
 * The sidebar left containing the widget area to display widgets for mobile
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business-profile
 */
?>
<?php if ( is_active_sidebar( 'sidebar-mobile-1' ) && wp_is_mobile() ) { ?>
<aside id="left-sidebar" class="widget-area sidebar">
	<?php dynamic_sidebar( 'sidebar-mobile-1' ); ?>
</aside>
<?php } ?>
