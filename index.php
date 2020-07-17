<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WMCZ
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="wmcz-posts-container">
				<div class="wmcz-posts-head">
					<h1><?php wp_title('') ?></h1>
					<?php get_search_form() ?>
					<div class="wmcz-archive">
						<h3>Archive</h3>
						<?php wp_custom_archive(); ?>
					</div>
				</div>
				<div class="wmcz-posts-topics">
					<?php
					$tags = get_tags();
					if ( $tags ) :
						foreach ( $tags as $tag ) : ?>
							<a class="wmcz-post-topic tag-<?php echo str_replace(' ', '-', $tag->name); ?>" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="wmcz-posts">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content-snip', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
