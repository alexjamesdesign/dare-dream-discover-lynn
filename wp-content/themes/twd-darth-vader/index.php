<?php
/**
 * The template for rendering anything not caught by other file as well
 * as the loop for any blog posts. In theory this is a "fallback" file. 
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 */
?>

<?php
    get_header();
    include locate_template('parts/hero.php');
?>

	<main class="site-content container">

		<div class="grid grid8_12">

			<?php if (have_posts()): while (have_posts()): the_post(); ?>

				<article>

					<div class="pad-1-1 copy">

						<?php the_post_thumbnail('medium'); ?>

						<?php the_title('<h1>', '</h1>'); ?>
						<?php the_excerpt(); ?>

						<a href="<?php the_permalink(); ?>" class="btn btn-noir">Continue reading</a>

					</div>

				</article>
		
			<?php endwhile; endif; ?>

		</div>

		<aside class="grid grid4_12 news-aside">

			<?php get_sidebar(); ?>
		
		</aside>

	</main>

<?php get_footer(); ?>