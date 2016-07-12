<?/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<div id="package-contact" class="pop hide">
	<a href="#" class="close-pop">
		<svg width="40px" height="40px" viewBox="1846 35 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(1846.000000, 35.000000)">
						<path d="M37.9866667,39.5652174 C37.5837681,39.5652174 37.1785507,39.4110145 36.8707246,39.1031884 L0.896811594,3.12927536 C0.28057971,2.51362319 0.28057971,1.51246377 0.896811594,0.896811594 C1.51246377,0.28057971 2.51362319,0.28057971 3.12927536,0.896811594 L39.1031884,36.8707246 C39.7194203,37.4863768 39.7194203,38.4875362 39.1031884,39.1031884 C38.7953623,39.4110145 38.3901449,39.5652174 37.9866667,39.5652174 L37.9866667,39.5652174 Z" id="Fill-1" fill="#C0C5CF"></path>
						<path d="M2.01333333,39.5652174 C1.60985507,39.5652174 1.20463768,39.4110145 0.896811594,39.1031884 C0.28057971,38.4875362 0.28057971,37.4863768 0.896811594,36.8707246 L36.8707246,0.896811594 C37.4863768,0.28057971 38.4875362,0.28057971 39.1031884,0.896811594 C39.7194203,1.51246377 39.7194203,2.51362319 39.1031884,3.12927536 L3.12927536,39.1031884 C2.82144928,39.4110145 2.41855072,39.5652174 2.01333333,39.5652174 L2.01333333,39.5652174 Z" id="Fill-2" fill="#C0C5CF"></path>
				</g>
		</svg>
	</a>
	<div class="container">
		<div class="col-md-3 col-xs-12">
			<div id="package_div">
				<div class="ts-service-img">

				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-9">
			<?php echo do_shortcode('[contact-form-7 id="435" title="Package Selection"]'); ?>
		</div>
	</div>
</div>
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<a href="http://www.timurtek.com/" class="hide">www.timurtek.com</a>
<?php
get_footer();
