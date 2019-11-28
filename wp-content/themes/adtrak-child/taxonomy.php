<?php
/**
 * The template for rendering anything not caught by other file as well
 * as the loop for any blog posts. In theory this is a "fallback" file. 
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 */
?>

<?php
    get_header();
?>

<div class="wrapper destinations__wrapper">

    <div class="container destinations__container">

        <p class="title">Destinations Taxo</p>

        <div class="destinations-section">

            <?php $terms = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>

            <?php if ( have_posts() ) : $count = 0; while (have_posts()) : the_post(); ?>

            <?php

                /* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

                $thumb_id = get_post_thumbnail_id();

                $thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'square-350', true);
                $thumb_url_small = $thumb_url_array_small[0];

                $thumb_url_array_large = wp_get_attachment_image_src($thumb_id, 'img-1310-750', true);
                $thumb_url_large = $thumb_url_array_large[0];

                if($thumb_id): ?>

                    <style>
                        .destination-<?php echo $count; ?> {
                        background-image: url(<?php echo $thumb_url_small; ?>);
                        background-color: red;
                        }
                        @media (min-width: 600px) {
                            .destination-<?php echo $count; ?> {
                            background-image: url(<?php echo $thumb_url_small; ?>);
                            }
                        }
                    </style>

                <?php endif; ?>

                <a class="destination-i destination-<?php echo $count; ?>" href="<?php the_permalink(); ?>">
                        
                    <p class="destination-name"><?php echo $term->name;?></p>
                    
                </a>

            <?php $count++; endwhile; endif; ?>

        </div>
            
    </div>

</div>

<?php get_footer(); ?>