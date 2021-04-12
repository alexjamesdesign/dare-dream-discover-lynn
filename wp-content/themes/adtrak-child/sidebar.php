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

	<div class="sidebar-item">

		<div id="adgshp-1436804948"></div>
		<script type="text/javascript" src="//cdn0.agoda.net/images/sherpa/js/init-dynamic_v8.min.js"></script><script type="text/javascript">
			var stg = new Object(); stg.crt="15891159522699";stg.version="1.05"; stg.id=stg.name="adgshp-1436804948"; stg.Width="300px"; stg.Height="300px";stg.RefKey="kF7efl5tYjS4/gdBEvep9g==";stg.AutoScrollSpeed=3000;stg.AutoScrollToggle=true;stg.SearchboxShow=false;stg.DiscountedOnly=false;stg.Layout="squaredynamic"; stg.Language="en-us";stg.ApiKey="";stg.Cid="1845671";  stg.City="16808";stg.Currency="GBP";stg.OverideConf=false; new AgdDynamic('adgshp-1436804948').initialize(stg);
		</script>

		<iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=2&p=12&l=ez&f=ifr&linkID=2a64973e4a7a8f3e070c45e97776e908&t=daredreamdisc-21&tracking_id=daredreamdisc-21" width="300" height="250" style="margin-top:10px" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
	
	</div>


<?php else: ?>


<?php endif; ?>