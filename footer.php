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

</div><!-- #page -->

<footer id="colophon" class="site-footer">
	<div class="contact">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link" rel="home">
			<img width="1000" height="245" src="https://www.wikimedia.cz/static/images/wmcz_white_logo_245.png" class="custom-logo" alt="Wikimedia ČR">
		</a>

		<?php
		wp_nav_menu(array(
			'theme_location' => 'footer-menu',
			'menu_id'        => 'footer-menu',
			'fallback_cb'    => false,
		));
		?>

		<div id="footer-description">
			<p class="footer-address"><?php echo esc_html(get_theme_mod('address')); ?></p>
			<p class="footer-contact">
				email: <a href="<?php echo esc_attr(get_theme_mod('email')); ?>">
					<?php echo esc_html(get_theme_mod('email')); ?>
				</a>
				<br>
				telefon:
				<a href="tel:<?php echo esc_attr(get_theme_mod('phone')); ?>">
					<?php echo esc_html(get_theme_mod('phone')); ?>
				</a>
			</p>
			</p>
			<p class="footer-socials">
				<a href="https://www.facebook.com/Wikimedia.CR/" class="fa fa-facebook"></a>
				<a href="https://www.instagram.com/wikimediacr/" class="fa fa-instagram"></a>
				<a href="https://twitter.com/wikimedia_cr?lang=cs" class="fa fa-twitter"></a>
			</p>
		</div>
	</div>
	<div class="sitemap">
		<?php
		wp_nav_menu(array(
			'depth'			 => 1,
		));
		?>

		<p>
			<a href="https://wiki.wikimedia.cz/wiki/">Interní wiki</a>
		</p>
	</div>
	<div class="wikiprojects">
		<a href="https://cs.wikipedia.org/" hreflang="en">Wikipedie</a>
		<a href="https://commons.wikimedia.org/wiki/Main_Page" hreflang="en">Wikimedia Commons</a>
		<a href="https://www.mediawiki.org/wiki/MediaWiki" hreflang="en">MediaWiki</a>
		<a href="https://meta.wikimedia.org/wiki/Main_Page" hreflang="en">Meta-Wiki</a>
		<a href="https://species.wikimedia.org/wiki/Main_Page" hreflang="en">Wikidruhy</a>
		<a href="https://cs.wikibooks.org/wiki/Wikiknihy:Hlavn%C3%AD_strana" hreflang="cs">Wikiknihy</a>
		<a href="https://www.wikidata.org/wiki/Wikidata:Main_Page" hreflang="en">Wikidata</a>
		<a href="https://wikimania.wikimedia.org/wiki/Wikimania" hreflang="en">Wikimánie</a>
		<a href="https://cs.wikinews.org/wiki/Wikizpr%C3%A1vy:Hlavn%C3%AD_strana" hreflang="cs">Wikizprávy</a>
		<a href="https://cs.wikiquote.org/wiki/Wikicit%C3%A1ty:Hlavn%C3%AD_strana" hreflang="cs">Wikicitáty</a>
		<a href="https://cs.wikisource.org/wiki/Wikizdroje:Hlavn%C3%AD_strana" hreflang="cs">Wikizdroje</a>
		<a href="https://cs.wikiversity.org/wiki/Wikiverzita:Hlavn%C3%AD_strana" hreflang="cs">Wikiverzita</a>
		<a href="https://cs.wiktionary.org/wiki/Wikislovn%C3%ADk:Hlavn%C3%AD_strana" hreflang="cs">Wikislovník</a>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>