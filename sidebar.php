<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package footankle
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
if ( is_woocommerce( ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
