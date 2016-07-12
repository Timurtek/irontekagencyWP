<?/**
 * Template Name: Resources
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
		<main id="main" class="site-main" role="main">
		<div class="container height100 xs-cancel-height100 margin-top-xl no-padding-left no-padding-right ">
			<div class="col-md-9 col-xs-12 flex0 no-padding border-left">
				<div class="col-md-12 light-bg border-bottom margin-bottom-md rela">
					<span class="caret pull-right margin-top-md"></span>
					<h4 class="block pull-left">Resources</h4>
					<div class="clearfix"></div>
				</div>
				<?php
					  // set up or arguments for our custom query
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

					  $query_args = array(
					    'post_type' => 'post',
					    'category_name' => 'resources',
					    'posts_per_page' => 27,
					    'paged' => $paged
					  );
					  // create a new instance of WP_Query
					  $the_query = new WP_Query( $query_args );
					?>

				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
					<div class="col-md-3 col-sm-4 margin-bottom-sm">
						<div class="resource-tile">
							<?php //echo edit_post_link(); ?>
							<div class="header">
								<?php include 'includes/tags.php'; ?>
								<div class="image">
										<?php if ( has_post_thumbnail() ) : ?>
										    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										        <?php the_post_thumbnail();   ?>
										    </a>
										<?php endif; ?>
								</div>
							</div>
							<div class="info">
								<?php if(function_exists('the_views')) { the_views(); } ?>
								<a href="<?php the_permalink(); ?>" alt="<?php echo the_title(); ?>" title="<?php echo the_title(); ?>"><?php echo the_title(); ?> </a>

								<p class="price">
									<?php
									if(price_id('purchase_link id=')){
										$price = do_shortcode( '[edd_price id="'.price_id("purchase_link id=").'"]' );
										if($price =='<span id="edd_price_393">$12.00</span>'){
											$price = 'FREE';
										}
										echo $price;
									 }else{
										 echo "FREE";
									 }
									 ?>
								</p>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<div class="col-md-12 text-center">
					<?php if (function_exists("pagination")) { pagination($the_query->max_num_pages); } ?>
				</div>
				<?php else: ?>
				  <article>
				    <h1>Sorry...</h1>
				    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				  </article>
				<?php endif; ?>


			</div>
			<div class="col-md-3 col-xs-12 flex1 light-bg padding-bottom-md border-left border-right">
				<div class="blog_sidebar">
					<?php dynamic_sidebar( 'blog_sidebar' ); ?>
				</div>
			</div>
		</div>
		</main><!-- #main -->
		<a href="http://www.timurtek.com/" class="hide">www.timurtek.com</a>
<?php
get_footer();
