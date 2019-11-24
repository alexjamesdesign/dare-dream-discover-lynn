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
	
	$category = get_the_category();
	$firstCategory = $category[0]->cat_name; echo $firstCategory;
?>

	<main class="site-content site-content--single">
		<div class="container site-content--single">
			<div class="site-content__into">
				<?php echo $firstCategory;?>
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
