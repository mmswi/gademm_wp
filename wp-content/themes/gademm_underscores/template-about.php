<?php
/**
 * Template Name: About Child Pages Template
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gademm_underscores
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
