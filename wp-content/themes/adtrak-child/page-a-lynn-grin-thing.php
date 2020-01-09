<?php
/**
 * The template for rendering any single pages with no template.
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 */
?>

<?php
    get_header();
    include locate_template('parts/buckets.php');
?>
	<div class="top-bg"></div>

    <?php if (have_posts()): while (have_posts()): the_post(); ?>

    <main class="site-content site-content--page">
            
        <div class="container site-content__container">
            <article class="copy">				
                <?php the_title('<h1>', '</h1>'); ?>
                <?php the_content(); ?>
            </article>

            <div class="gallery">
                <?php 
                $images = get_field('grin_gallery');
                if( $images ): ?>
                    <ul>
                        <?php foreach( $images as $image ): ?>
                            <li>
                                <a data-fancybox="gallery" href="<?php echo esc_url($image['url']); ?>" >
                                    <img src="<?php echo esc_url($image['sizes']['img-600-600']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </a>
                                <p><?php echo esc_html($image['caption']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        
    </main>

    <?php endwhile; else: ?>

        <p>Nothing to see.</p>

    <?php endif; ?>

<?php get_footer(); ?>