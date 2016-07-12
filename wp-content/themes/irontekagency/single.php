<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package irontekagency
 */

get_header(); ?>

		<div class="container padding-top-xl">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				// the_post_navigation();
			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div>

<?php
get_footer();
