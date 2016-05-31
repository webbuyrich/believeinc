<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package believeinc
 */

?>

	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="container">

			<div class="row">
				<div class="col-md-12 text-center">
					<?php if (has_nav_menu('footer-menu', 'believeinc')) { ?>
					<nav role="navigation">
						<?php wp_nav_menu(array(
							'container'       => '',
							'menu_class'      => 'footer-menu',
							'theme_location'  => 'footer-menu')
						); 
						?>
					</nav>
					<?php } ?>
				</div>
			</div>
			<div class='row'>
				
				<div class="col-md-6 col-lg-6 text-center">
					&copy; <?php _e('Copyright', 'believeinc'); ?> <?php echo date('Y'); ?> - <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>
				</div>
				<div class="col-md-6 col-lg-6 text-center">
					Created by <a href="http://www.focusedandcreative.com">FocusedAndCreative.com</a>
				</div>						
				
			</div><!-- .row -->
		</div><!-- .containr -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
