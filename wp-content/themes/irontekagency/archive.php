<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package irontekagency
 */

get_header(); ?>

	<div id="primary" class="content-area container padding-top-xl user-profile">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>
			<div class="container height100 margin-top-sm no-padding-left no-padding-right ">
				<div class="col-md-3 col-xs-12 flex0 light-bg text-center">
					<div class="user-area">
						<div class="user-image">
								<?php echo get_avatar(get_the_author_id(), 120); ?>
						</div>
						<div class="user-info">
							<h3 class="user-name block"><?php echo the_author_meta('first_name'); ?> <?php echo the_author_meta('last_name'); ?></h3>
							<h4 class="at-from block">@<?php echo the_author_meta('nickname'); ?></h4>
						</div>
					</div>
					<?php
						$twitterHandle = get_the_author_meta('twitter');
						$googleHandle = get_the_author_meta('gplus');
						$facebookHandle = get_the_author_meta('facebook');
						$githubHandle = get_the_author_meta('github');
						$behance = get_the_author_meta('behance');
						$dribbble = get_the_author_meta('dribbble');

						if ($twitterHandle || $googleHandle || $facebookHandle || $githubHandle || $behance || $dribbble) {
							echo '<ul class="user-social-list">';
							if($twitterHandle){
								echo '<li class="social twitter"><a href="'.$twitterHandle.'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
							}
							if($googleHandle){
								echo '<li class="social google"><a href="'.$googleHandle.'"><i class="fa fa-google" aria-hidden="true"></i></a></li>';
							}
							if($facebookHandle){
								echo '<li class="social facebook"><a href="'.$facebookHandle.'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
							}
							if($githubHandle){
								echo '<li class="social github"><a href="'.$githubHandle.'"><i class="fa fa-github" aria-hidden="true"></i></a></li>';
							}
							if($behance){
								echo '<li class="social behance"><a href="'.$behance.'"><i class="fa fa-behance" aria-hidden="true"></i></a></li>';
							}
							if($dribbble){
								echo '<li class="social dribbble"><a href="'.$dribbble.'"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>';
							}
							echo '</ul>';
						}
					?>
				</div>
				<div class="col-md-9 col-xs-12 flex0 no-padding">
					<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#posts" aria-controls="posts" role="tab" data-toggle="tab">Sources</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Blog Posts</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Projects</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="posts">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				?>
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
				<?php

			endwhile;

			?>
			<div class="col-md-12 text-center">
				<?php if (function_exists("pagination")) { pagination($the_query->max_num_pages); } ?>
			</div>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>
    <div role="tabpanel" class="tab-pane" id="messages">1111...</div>
    <div role="tabpanel" class="tab-pane" id="settings">.1212312312313..</div>
  </div>

</div>
	</div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
