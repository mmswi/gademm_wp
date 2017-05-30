<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gademm_underscores
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">
			<div class="col-sm-4 clearfix text-center">
				<a href="/" class="footer-logo">
					<img src="<?php echo get_site_url();?>/wp-content/themes/gademm_underscores/img/gademm-logo-footer.png" alt="gademm logo">
				</a>
			</div>
			<div class="col-sm-8"></div>
		</div>
		<div class="row">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer_menu_class' ) ); ?>
		</div>		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
