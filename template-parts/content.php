<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WMCZ
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				wmcz_posted_on();
				wmcz_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php wmcz_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wmcz-theme' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wmcz-theme' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="wmcz-donate">
			<div data-darujme-widget-token="kndwaffrxdz1haue">&nbsp;</div>
			<script type="text/javascript">
				+function(w, d, s, u, a, b) {
					w["DarujmeObject"] = u;
					w[u] = w[u] || function () { (w[u].q = w[u].q || []).push(arguments) };
					a = d.createElement(s); b = d.getElementsByTagName(s)[0];
					a.async = 1; a.src = "https:\/\/www.darujme.cz\/assets\/scripts\/widget.js";
					b.parentNode.insertBefore(a, b);
				}(window, document, "script", "Darujme");
				Darujme(1, "kndwaffrxdz1haue", "render", "https:\/\/www.darujme.cz\/widget?token=kndwaffrxdz1haue", "100%");
			</script>
		</div>
		<p class="wmcz-post-linkback">
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
				<?php _e('Go to all news', 'wmcz-theme') ?>
			</a>
		</p>
		<!-- TODO: Actually include and properly format the footer here -->
		<?php //wmcz_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
