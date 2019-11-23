<div class="about-lynn">
    <div class="container about-lynn__container">
        <div class="about-lynn__image grid grid4_12">
        
        <?php 
        $image = get_field('about_image', options);
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        
        </div>

        <div class="about-lynn__text grid grid8_12">
            <p class="title about-lynn__title"><?php the_field('about_title', options); ?></p>
            <p><?php the_field('about_content', options); ?></p>

            <?php 
            $link = get_field('about_link', options);
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn--pink"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>