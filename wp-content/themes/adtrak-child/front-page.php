<?php
/**
 * The template for rendering any single pages with no template.
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 */
?>

<?php
    get_header();
    include locate_template('parts/buckets.php');
?>
	<!-- <div class="top-bg"></div> -->

	<?php include locate_template('parts/posts.php'); ?>
	
	<?php include locate_template('parts/about.php'); ?>

<?php get_footer(); ?>