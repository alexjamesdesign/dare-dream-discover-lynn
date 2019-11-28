<?php
/**
 * The template for rendering any single posts.
 * This is the template of single blog posts and custom post types. 
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.1.0
 */
?>

<?php
	get_header();
?>

	<main class="site-content site-content--single">
		<div class="container site-content--single">
			<div class="site-content__info">
				<div class="site-content__category">
					<?php
						// Get terms for post
						$terms = get_the_terms( $post->ID , 'destination_category_taxonomy' );
					
						// Loop over each item since it's an array
						if ( $terms != null ){
							foreach( $terms as $term ) {
							// Print the name method from $term which is an OBJECT
							print $term->slug ;
							// Get rid of the other data stored in the object, since it's not needed
							unset($term);
						} }
					?>
				</div>

				<div class="site-content__date">
					<?php the_date(); ?>
				</div>

				<div class="site-content__comments">
					<?php echo get_comments_number($post->ID); ?>
				</div>
				
			</div>
		</div>

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

<?php get_footer(); ?>

<?php if (is_single()) {   //  displaying a single blog post ?>
<script type="text/javascript">
  jQuery("a[href$='news/']").parent().addClass('current-menu-item');
</script>
<?php } ?>
