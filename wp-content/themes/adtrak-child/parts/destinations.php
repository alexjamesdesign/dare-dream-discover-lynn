<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>

<div class="wrapper destinations__wrapper">

    <div class="container destinations__container">

        <div class="title-full">
                <div class="line"></div>
                <p class="title-p">Destinations</p>
                <div class="line"></div>
        </div>
        
        <p class="title-full-description">
            <?php the_field('intro_text'); ?>
        </p>

        <div class="destinations-section">

            <?php
            $terms = get_terms( 'destination_category_taxonomy', array(
                'hide_empty' => true,
            ));

            ?>

            <?php $i = 0; foreach( $terms as $term ) : $i++ ?>

            <?php

                /* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

                $image = get_field('cat-image', $term->taxonomy . '_' . $term->term_id );
                $medImage = $image['sizes'][ 'medium' ];

                if ( $image ) : ?>

                    <style>
                        .destination-<?php echo $i; ?> {
                        background-image: url(<?php echo esc_url($medImage); ?>);
                        background-position: center;
                        background-color: red;
                        }
                        @media (min-width: 600px) {
                            .destination-<?php echo $i; ?> {
                            background-image: url(<?php echo esc_url($medImage); ?>);
                            }
                        }
                    </style>

                <?php endif; ?>

                <a class="destination-i destination-<?php echo $i; ?>" href="<?php echo $term->slug;?>">
                        
                    <p class="destination-name"><?php echo ($term->name); ?></p>
                    
                    <?php 
                        $ld_location = get_field('location');
                        if($ld_location) :
                            do_action('ld_single', $ld_location); 	
                        endif;
                    ?>
                    
                </a>

                <?php wp_reset_query(); ?>


            <?php endforeach; ?>

        </div>
            
    </div>

</div>