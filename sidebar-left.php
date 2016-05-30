<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package believeinc
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-lg-3 col-md-3 col-lg-pull-9 col-md-pull-9" role="complementary">
	<div class="well">
		<?php dynamic_sidebar( 'sidebar-left' ); ?>
	</div>
	
</aside><!-- #secondary -->

</div><!-- .row -->
</div><!-- .container -->
