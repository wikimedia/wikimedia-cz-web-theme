<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WMCZ
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home">
		<img width="1000" height="245" src="https://www.wikimedia.cz/static/images/wmcz_white_logo_245.png" class="custom-logo" alt="Wikimedia ČR">
	</a>

	<?php
	wp_nav_menu( array(
		'theme_location' => 'footer-menu',
		'menu_id'        => 'footer-menu',
		'fallback_cb'    => false,
	) );
	?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
