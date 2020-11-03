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
				<?php _e('email', 'wmcz-theme'); ?>: <a href="<?php echo esc_attr(get_theme_mod('email')); ?>">
					<?php echo esc_html(get_theme_mod('email')); ?>
				</a>
				<br>
				<?php _e('phone', 'wmcz-theme'); ?>:
				<a href="tel:<?php echo esc_attr(get_theme_mod('phone')); ?>">
					<?php echo esc_html(get_theme_mod('phone')); ?>
				</a>
			</p>
			</p>
			<p class="footer-socials">
				<?php if (get_theme_mod('facebook') != ''): ?>
				<a href="<?php echo esc_attr(get_theme_mod('facebook')); ?>" class="fa fa-facebook"></a>
				<?php endif; ?>
				<?php if (get_theme_mod('instagram') != ''): ?>
				<a href="<?php echo esc_attr(get_theme_mod('instagram')); ?>" class="fa fa-instagram"></a>
				<?php endif; ?>
				<?php if (get_theme_mod('twitter') != ''): ?>
				<a href="<?php echo esc_attr(get_theme_mod('twitter')); ?>" class="fa fa-twitter"></a>
				<?php endif; ?>
				<?php if (get_theme_mod('youtube') != ''): ?>
				<a href="<?php echo esc_attr(get_theme_mod('youtube')); ?>" class="fa fa-youtube"></a>
				<?php endif; ?>
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
			<a href="https://wiki.wikimedia.cz/wiki/"><?php _e('Internal wiki', 'wmcz-theme'); ?></a>
		</p>
	</div>
	<div class="wikiprojects">
		<a href="https://cs.wikipedia.org/" hreflang="en"><?php _e('Wikipedia', 'wmcz-theme'); ?></a>
		<a href="https://commons.wikimedia.org/wiki/Main_Page" hreflang="en"><?php _e('Wikimedia Commons', 'wmcz-theme'); ?></a>
		<a href="https://www.mediawiki.org/wiki/MediaWiki" hreflang="en"><?php _e('MediaWiki', 'wmcz-theme'); ?></a>
		<a href="https://meta.wikimedia.org/wiki/Main_Page" hreflang="en"><?php _e('Meta-Wiki', 'wmcz-theme'); ?></a>
		<a href="https://species.wikimedia.org/wiki/Main_Page" hreflang="en"><?php _e('Wikispecies', 'wmcz-theme'); ?></a>
		<a href="https://cs.wikibooks.org/wiki/Wikiknihy:Hlavn%C3%AD_strana" hreflang="cs"><?php _e('Wikibooks', 'wmcz-theme'); ?></a>
		<a href="https://www.wikidata.org/wiki/Wikidata:Main_Page" hreflang="en"><?php _e('Wikidata', 'wmcz-thme'); ?></a>
		<a href="https://wikimania.wikimedia.org/wiki/Wikimania" hreflang="en"><?php _e('Wikimania', 'wmcz-theme'); ?></a>
		<a href="https://cs.wikinews.org/wiki/Wikizpr%C3%A1vy:Hlavn%C3%AD_strana" hreflang="cs"><?php _e('Wikinews', 'wmcz-theme'); ?></a>
		<a href="https://cs.wikiquote.org/wiki/Wikicit%C3%A1ty:Hlavn%C3%AD_strana" hreflang="cs"><?php _e('Wikiquote', 'wmcz-theme'); ?></a>
		<a href="https://cs.wikisource.org/wiki/Wikizdroje:Hlavn%C3%AD_strana" hreflang="cs"><?php _e('Wikisource', 'wmcz-theme'); ?></a>
		<a href="https://cs.wikiversity.org/wiki/Wikiverzita:Hlavn%C3%AD_strana" hreflang="cs"><?php _e('Wikiversity', 'wmcz-theme'); ?></a>
		<a href="https://cs.wiktionary.org/wiki/Wikislovn%C3%ADk:Hlavn%C3%AD_strana" hreflang="cs"><?php _e('Wiktionary', 'wmcz-theme'); ?></a>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>
