<?php
/**
* Template Name: Fullwidth Template
*
* @author Vulinhpc
* @package ALASKA
* @since 1.0.0
*/

get_header();
global $ts_alaska;

?>
<?php get_template_part('content-parts/page', 'banner'); ?>
 <!-- content -->
    <div id="container_full">
        <div class="container">
	        <?php
	        	while ( have_posts() ) : the_post();
					the_content();
					wp_link_pages();
				endwhile;	
            ?>
        </div>    
    </div>
    <!-- End / content -->
<?php get_footer(); ?>