<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package irontekagency
 */

?>
<div class="container-fluid" id="footer">
	<div class="container">
		<?php dynamic_sidebar( 'footer1' ); ?>
		<?php dynamic_sidebar( 'footer2' ); ?>
		<?php dynamic_sidebar( 'footer3' ); ?>
		<?php dynamic_sidebar( 'footer4' ); ?>
	</div>
	<div class="container text-center margin-top-lg margin-bottom-sm">
		<p class="copyrights">
			© Irontek Agency <?php echo date('Y'); ?>. All Rights Reserved. Terms of Use. Privacy Policy.
		</p>
	</div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
