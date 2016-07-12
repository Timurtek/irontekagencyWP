<?php get_header(); ?>
<div id="report-post-pop" class="pop hide">
	<a href="#" class="close-pop">
		<svg width="40px" height="40px" viewBox="1846 35 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(1846.000000, 35.000000)">
						<path d="M37.9866667,39.5652174 C37.5837681,39.5652174 37.1785507,39.4110145 36.8707246,39.1031884 L0.896811594,3.12927536 C0.28057971,2.51362319 0.28057971,1.51246377 0.896811594,0.896811594 C1.51246377,0.28057971 2.51362319,0.28057971 3.12927536,0.896811594 L39.1031884,36.8707246 C39.7194203,37.4863768 39.7194203,38.4875362 39.1031884,39.1031884 C38.7953623,39.4110145 38.3901449,39.5652174 37.9866667,39.5652174 L37.9866667,39.5652174 Z" id="Fill-1" fill="#C0C5CF"></path>
						<path d="M2.01333333,39.5652174 C1.60985507,39.5652174 1.20463768,39.4110145 0.896811594,39.1031884 C0.28057971,38.4875362 0.28057971,37.4863768 0.896811594,36.8707246 L36.8707246,0.896811594 C37.4863768,0.28057971 38.4875362,0.28057971 39.1031884,0.896811594 C39.7194203,1.51246377 39.7194203,2.51362319 39.1031884,3.12927536 L3.12927536,39.1031884 C2.82144928,39.4110145 2.41855072,39.5652174 2.01333333,39.5652174 L2.01333333,39.5652174 Z" id="Fill-2" fill="#C0C5CF"></path>
				</g>
		</svg>
	</a>
	<div class="container">
		<div class="col-md-6 col-md-offset-3 col-xs-12">
			<?php echo do_shortcode('[contact-form-7 id="435" title="Package Selection"]'); ?>
		</div>
	</div>
</div>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<?php echo do_shortcode('[ssba]'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container resource-post padding-top-xl">
			<div class="row height100">
				<div class="col-xs-12 col-md-9 padding-bottom-lg pull-left flex0">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
					<div class="block">
						<?php edit_post_link(); ?>
					</div>
					<?php } ?>
				<div class="col-md-8 no-padding">
					<div class="content-area">
						<div class="margin-bottom-md">
							<?php the_post_thumbnail();   ?>
						</div>
						<?php the_content(); ?>
					</div>
				</div>
				<div class="col-md-4 no-padding post-meta-area padding-left-md">
					<div class="user-area">
						<div class="user-image pull-left">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
								<?php echo get_avatar(get_the_author_id(), 40); ?>
							</a>
						</div>
						<div class="user-info pull-left margin-left-sm">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="user-name block"><?php echo the_author_meta('first_name'); ?> <?php echo the_author_meta('last_name'); ?></a>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="at-from block">@timurtek</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="post-info">
						<div class="views margin-top-sm">
							<i class="fa fa-eye" aria-hidden="true"></i> <?php if(function_exists('the_views')) { the_views(); } ?>
						</div>
						<div class="download margin-top-sm">
							<i class="fa fa-cloud-download" aria-hidden="true"></i>
							<?php echo edd_get_download_sales_stats(price_id("purchase_link id="));?>
						</div>
						<?php
							$color_palette = 'color_palette';
							$themeta = get_post_meta($post->ID, $color_palette, TRUE);
							if($themeta != '') {
								?>
								<div class="colors margin-top-sm">
									<div class="pull-left">
										<i class="fa fa-adjust" aria-hidden="true"></i>
									</div>
									<?php echo do_shortcode(get_post_meta($post->ID, $color_palette , true)); ?>
									<div class="clearfix"></div>
								</div>
								<?php
							}
							?>

					</div>
					<div class="tags">
						<?php include 'includes/tags.php'; ?>
					</div>
					<?php
						$key = 'source_link';
						$themeta = get_post_meta($post->ID, $key, TRUE);
						if($themeta != '') {
							?>
							<div class="post-source border-bottom padding-bottom-sm margin-bottom-md">
								<a class="btn primary-btn border btn-sm btn-sqr text-center" href="<?php echo get_post_meta($post->ID, $key , true); ?>" target="_blank">
									<i class="fa fa-link" aria-hidden="true"></i>
								</a>
							</div>
							<?php
						}
						?>

					<div class="post-actions">
						<?php
							$download = 'download_source';
							$themeta = get_post_meta($post->ID, $download, TRUE);
							if($themeta != '') {
								?>
								<div class="post-source padding-bottom-sm margin-bottom-sm">
									<?php echo do_shortcode(get_post_meta($post->ID, $download , true)); ?>
								</div>
								<?php
							}
							?>
						<a href="#" class="btn default-btn width100 report-post">Report</a>
					</div>
				</div>
				<div class="col-md-12 comments-area xs-margin-top-lg">
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
