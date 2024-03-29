<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WMCZ
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main wmcz-posts-container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header wmcz-posts-head">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="wmcz-posts">
			<?php
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
			?>
			</div>

		<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
        <p>
            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
                <?php _e('Return to all news', 'wmcz-theme') ?>
            </a>
        </p>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
