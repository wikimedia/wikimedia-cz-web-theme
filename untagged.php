<?php
/*
Template Name: untagged
*/

get_header();
?>

<?php query_posts([
    'posts_per_page' => -1
]); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main wmcz-posts-container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header wmcz-posts-head">
                <h1><?php _e('Other news', 'wmcz-theme') ?></h1>
			</header><!-- .page-header -->

			<div class="wmcz-posts">
			<?php
			/* Start the Loop */
            while (have_posts()) : 
                the_post();

                if (get_the_tags()) {
                    continue;
                }
                

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
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
