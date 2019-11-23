<?php

	/* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

	$thumb_id = get_post_thumbnail_id();

	$thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'img-600-600', true);
	$thumb_url_small = $thumb_url_array_small[0];

	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'img-1200-500', true);
	$thumb_url = $thumb_url_array[0];

	$thumb_url_array_large = wp_get_attachment_image_src($thumb_id, 'img-2000-650', true);
	$thumb_url_large = $thumb_url_array_large[0];

	if ( $thumb_id ) : ?>

		<div class="hero__image"><img src="<?php echo $thumb_url_small; ?>" alt="Dare Dream Discover"></div>

<?php endif; ?>



    