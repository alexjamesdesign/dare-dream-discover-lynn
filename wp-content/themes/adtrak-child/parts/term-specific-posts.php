<div class="wrapper posts__wrapper">

    <div class="container posts__container">

        <div class="title-full">
            <div class="line"></div>
            <p>My Adventures</p>
            <!--<p>(Post Part term specific posts)</p>-->
            <div class="line"></div>
        </div>

        <div class="posts">
            <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>

            <?php if ( have_posts() ) : $i = 0; while (have_posts()) : the_post(); $i++  ?>

            <?php

            /* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */


            $thumb_id = get_post_thumbnail_id();

            $thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'medium', true);
            $thumb_url_small = $thumb_url_array_small[0];

            $thumb_url_array_medium = wp_get_attachment_image_src($thumb_id, 'large', true);
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
                    
                <p class="destination-name"><?php echo strip_tags ( get_the_term_list( get_the_ID(), 'destination_category_taxonomy', "",", " )); ?></p>

                <div class="post-name" href="<?php the_permalink(); ?>"><?php the_title(); ?></div>
                
            </a>

            <?php $i++; endwhile; endif; wp_reset_query(); ?>
        </div>

    </div>

</div>