<?php
//----------------------------------------------------------------------------------------------------------------------
// Blog Sidebar
//----------------------------------------------------------------------------------------------------------------------
if (is_home() || is_singular('destinations') || is_month() || is_category() ||  is_page('about-me') || is_search()) : ?>


	<div class="sidebar-item sidebar-item__featured-post">
		<?php
		$post_object = get_field('featured_post', options);
		

		if( $post_object ): 

			// override $post
			$post = $post_object;
			setup_postdata( $post ); 

			?>
			<div>
				<div class="title">Featured Post</div>
				<div class="sidebar-item__featured-image"><?php echo get_the_post_thumbnail( $post_id, 'img-600-600', array( 'class' => 'alignleft' ) ); ?></div>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
	</div>


	<div class="sidebar-item sidebar-item__news-block">
		<p class="title">Categories</p>
		
		<?php
		$terms = get_terms( 'destination_category_taxonomy', array(
			'hide_empty' => true,
		));

		?>

		<?php foreach( $terms as $term ) : ?>

		<a class="" href="<?php echo site_url(); ?>/destinations/<?php echo $term->slug;?>"><?php echo $term->name;?></a>

		<?php endforeach; ?>

	</div>

<?php else: ?>


<?php endif; ?>