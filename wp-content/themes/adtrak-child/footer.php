<?php
/**
 * The template for displaying the footer within your theme.
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.1.0
 */
?>

	<footer class="footer">
		<div class="container">
			<div class="grid grid2_12 footer__logo">
				<a href="<?php echo home_url(); ?>">
					<?php $image = get_field('site_logo','option'); if( !empty($image) ): ?>
						<img class="lazyload" data-src="<?php echo $image['url']; ?>" alt="<?php bloginfo('title'); ?> Logo" />
					<?php endif; ?>
				</a>
			</div>

			<div class="grid grid4_12 footer__explore">
				<h6>Explore</h6>
				<?php wp_nav_menu([
					'menu' => 'Footer Menu', 
					'menu_class' => 'nav nav--footer', 
					'container' => '' 
				]); ?>
			</div>
		</div>
	</footer>

	<!-- Back to top arrow -->
	<div class="back-top-wrap">
	    <p id="back-top">
	        <a><i class="fa fa-arrow-up fa-2x"></i> Top</a>
	    </p>
	</div>

</div><!-- wrapper -->


<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/scripts/lazysizes.min.js" async=""></script>

<?php wp_footer(); ?>
	
</body>
</html>
