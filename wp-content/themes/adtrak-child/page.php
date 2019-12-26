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
?>
	<div class="top-bg"></div>

	<?php if (have_posts()): while (have_posts()): the_post(); ?>

	<main class="site-content site-content--page">
			
		<div class="container site-content__container">
			<article class="copy">				
				<?php the_title('<h1>', '</h1>'); ?>
				<?php the_content(); ?>
			</article>

			<aside class="sidebar site-content__sidebar">
				<?php get_sidebar(); ?>			
			</aside>
		</div>
		
	</main>

	<?php endwhile; else: ?>
	
		<p>Nothing to see.</p>

	<?php endif; ?>

<?php get_footer(); ?>