<?php 

global $term;

if ( is_front_page() || is_singular('locations')) {

	$heroType = "hero-home";

} elseif(is_page('contact')) {

	$heroType = "hero-contact";

} elseif ( is_page() && ($post->post_parent)) {

	$heroType = "hero-child";

} elseif ( is_home() || is_single()) {

	$heroType = "hero-archive";

} else {

	$heroType = "hero-parent";

}


if ( is_front_page() ) { 

/* -----------------------------------------------------------------
Home page
----------------------------------------------------------------- */

?>


<?php } elseif (is_page('contact') || is_page('contact-us')) {

/* -----------------------------------------------------------------
Contact page
----------------------------------------------------------------- */

?>



<?php } elseif (is_page()) {

/* -----------------------------------------------------------------
Internal page
----------------------------------------------------------------- */

?>



<?php } elseif (is_singular('post')) { 

/* -----------------------------------------------------------------
Single post
----------------------------------------------------------------- */

?>



<?php } elseif (is_search()) {

/* -----------------------------------------------------------------
Search results
----------------------------------------------------------------- */

?>



<?php } else {

/* -----------------------------------------------------------------
Everything else
----------------------------------------------------------------- */

?>

<?php } ?>

<div class="hero">

	<div class="hero__container container">

		<div class="hero__content">

		<?php

			// check if the flexible hero has rows of data
			if( have_rows('flexible_hero') ):

					// loop through the rows of data
				while ( have_rows('flexible_hero') ) : the_row();

					if( get_row_layout() == 'text' ): ?>

						<p class="<?php the_sub_field('hero_text_class'); ?>"><?php the_sub_field('hero_text'); ?></p>

					<?php

					elseif( get_row_layout() == 'button' ): ?>

						<a class="<?php the_sub_field('button_class'); ?>" href="<?php the_sub_field('button_link') ?>">
							<?php the_sub_field('button_text') ?>
						</a>

					<?php endif;

				endwhile; ?>

			<?php /* Else display the title */ else : ?>

			<?php if (is_single()) : ?>
				<p class="hero__primary"><?php the_title(); ?></p>
			<?php elseif (is_post_type_archive('destinations')) : ?>
				<p class="hero__primary">Destinations.</p>
			<?php elseif (taxonomy_exists( $taxonomy )) : ?>
				<p class="hero__primary"><?php echo strip_tags ( get_the_term_list( get_the_ID(), 'destination_category_taxonomy', "",", " )); ?>.</p>
			<?php else : ?>
				<p class="hero__primary"><?php the_field('h1'); ?></p>
			<?php endif; ?>

		<?php endif; wp_reset_postdata(); ?>

		</div>	

	</div>

</div>