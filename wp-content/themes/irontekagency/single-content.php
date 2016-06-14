
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container skills">
<div class="row">
<div class="col-md-12 padding-bottom-lg">
<?php the_content(); ?>
</div>
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
