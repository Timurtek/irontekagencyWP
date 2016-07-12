<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<?php echo do_shortcode('[ssba]'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container skills padding-top-xl">
			<div class="row height100">
				<div class="col-xs-12 col-md-9 padding-bottom-lg pull-left flex0">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php the_content(); ?>
				<div class="col-md-12 comments-area">
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				</div>
				</div>
				<div class="col-md-3 col-xs-12 padding-top-md light-bg pull-right flex1">
					<div class="blog_sidebar">
						<?php dynamic_sidebar( 'blog_sidebar' ); ?>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div><!--Row -->
		</div><!-- Container -->
	</article>
	<?php endwhile; ?>
	<?php else: ?>
		  <!-- article -->
		  <article>
			   <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
	   </article>
	<?php endif; ?>
<?php get_footer(); ?>
