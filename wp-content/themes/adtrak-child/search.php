<?php
/**
 * The template for rendering anything not caught by other file as well
 * as the loop for any blog posts. In theory this is a "fallback" file. 
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 */
/* Template Name: Search Page */
?>

<?php
    get_header();
?>

<div class="wrapper posts__wrapper">

	<div class="container posts__container">

		<div class="title-full">
			<div class="line"></div>
			<p class="title-p">Results for <?php the_search_query(); ?></p>
			<div class="line"></div>
		</div>

		<?php if (have_posts()): ?>

			<?php while (have_posts()): the_post(); ?>

				<?php /* Check if it is a post, not a page - remove this if you want to have site-wide search */ if ( 'destinations' == get_post_type() ) : ?>

					<article class="post post--overview">						
						<?php the_post_thumbnail('medium'); ?>

						<div class="post--search-text">
							<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							<?php the_excerpt(); ?>

							<a href="<?php the_permalink(); ?>" class="btn btn--pink">Continue reading</a>
						</div>
					</article>

				<?php endif; ?>
		
			<?php endwhile; ?>

				<div class="prev-next">				
					<div class="prev"><?php previous_posts_link(); ?></div>
					<div class="next"><?php next_posts_link(); ?></div>		
				</div>

			<?php else : ?>

				<h1>Sorry, no results found.</h1>

		<?php endif; ?>

	</div>
	
</div>


<?php get_footer(); ?>