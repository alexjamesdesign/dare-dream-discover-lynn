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
	<div class="top-bg"></div>

	<?php include locate_template('parts/posts.php'); ?>
	
	<?php include locate_template('parts/about.php'); ?>

	<!-- <main class="site-content">
		<div class="container">
			<?php if (have_posts()): while (have_posts()): the_post(); ?>

				<article class="copy">
					<h1><?php the_field('h1'); ?></h1>
					<?php the_content(); ?>
				</article>

			<?php endwhile; endif; ?>
		</div>
	</main> -->

<?php get_footer(); ?>