<div class="wrapper posts__wrapper">

    <div class="container posts__container">

        <div class="title-full">
            <div class="line"></div>
            <p>My Adventures</p>
            <div class="line"></div>
        </div>

        <div class="posts">
            <?php $i = 0; 
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            $query_args = array(
                'post_type' 			=> 'destinations',
                'posts_per_page'        => -1,
                'order'                 => 'ASC',
                'orderby'               => 'title',
                'paged'          		=> $paged,
            );
            $the_query = new WP_Query($query_args);
                if ($the_query->have_posts()):
                while ($the_query->have_posts()): $the_query->the_post();

            $i++ 
            ?>

            <?php

            /* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

            $thumb_id = get_post_thumbnail_id();

            $thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'small', true);
            $thumb_url_small = $thumb_url_array_small[0];

            $thumb_url_array_medium = wp_get_attachment_image_src($thumb_id, 'medium', true);
            $thumb_url_medium = $thumb_url_array_medium[0];

            if ( $thumb_id ) : ?>

                <style>
                    .post-<?php echo $i; ?> {
                    background-image: url(<?php echo $thumb_url_small; ?>);
                    }
                    @media (min-width: 600px) {
                        .post-<?php echo $i; ?> {
                        background-image: url(<?php echo $thumb_url_medium; ?>);
                        }
                    }
                </style>

            <?php endif; ?>

            <a class="post-i post-<?php echo $i; ?>" href="<?php the_permalink(); ?>">
                    
                <p class="destination-name"><?php the_field('country', option); ?></p>

                <div class="post-name" href="<?php the_permalink(); ?>"><?php the_title(); ?></div>
                
                <?php 
                    $ld_location = get_field('location');
                    if($ld_location) :
                        do_action('ld_single', $ld_location); 	
                    endif;
                ?>
                
                </a>

            <?php endwhile; endif; wp_reset_query(); ?>
        </div>

    </div>

</div>