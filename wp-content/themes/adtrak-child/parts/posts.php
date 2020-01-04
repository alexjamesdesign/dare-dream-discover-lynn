<div class="wrapper posts__wrapper">

    <div class="container posts__container">

        <div class="title-full">
            <div class="line"></div>
            <p class="title-p">My Adventures</p>
            <div class="line"></div>
        </div>

        <?php if (!is_front_page()) : ?>

        <p class="title-full-description">Here is a text area where you can write a brief summary about your vitit to a certain country which will be a nice introduction for the posts which are listed below. You may want to write something about when you visited, the reason for the visit etc. If left blank, this section will simply just not show :).</p>

        <?php endif; ?>

        <div class="posts">
            <?php $i = 0; 
            
            if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
            elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
            else { $paged = 1; }
            
            $the_query = new WP_Query('posts_per_page=3&paged=' . $paged); 

            $query_args = array(
                'post_type' 			=> 'destinations',
                'posts_per_page'        => 12,
                'order'                 => 'DESC',
                'orderby'               => 'date',
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
                        background-position: center;
                        }
                    }
                </style>

            <?php endif; ?>

            <a class="post-i post-<?php echo $i; ?>" href="<?php the_permalink(); ?>">
                    
                <p class="destination-name"><?php echo strip_tags ( get_the_term_list( get_the_ID(), 'destination_category_taxonomy', "",", " )); ?></p>

                <div class="post-name" href="<?php the_permalink(); ?>"><?php the_title(); ?></div>
                
                <?php 
                    $ld_location = get_field('location');
                    if($ld_location) :
                        do_action('ld_single', $ld_location); 	
                    endif;
                ?>
                
                </a>

            <?php endwhile; ?>

            <?php endif; wp_reset_query(); ?>
        </div>

        <?php if ( is_front_page() ) : ?>
        
            <div class="view-all-btn">
                <a href="<?php echo site_url(); ?>/posts" class="btn view-all-btn">View All Adventures</a>
            </div>

        <?php else : ?>

            <div class="pagination">
                <nav>
                    <?php
                        $big = 999999999; // need an unlikely integer

                        echo paginate_links( array(
                            'current' => max( 1, get_query_var('paged') ),
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'prev_text' => __( 'Back', 'textdomain' ),
                            'next_text' => __( 'Next', 'textdomain' ),

                            'total' => $the_query->max_num_pages
                        ) );
                    ?>
                </nav>
            </div><!-- pagination -->

        <?php endif; ?>    

    </div>

</div>