<?php

 get_header(); ?>

<div class="homepage-image-menu-container grid row">
    <div class="grid-sizer"></div>
    <?php 
    
        $args = array(
            'posts_per_page'   => 1,
            'offset'           => 0,
            'name'             => 'homepage-video',
            'category_name'    => 'Making Of Video',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'numberposts'      => 1
        );
        $homepage_video = get_posts( $args ); 
        if( $homepage_video ) :
            ?>
                <div class="grid-item image-menu-link homepage-video-container position-0">
                    <div id="homepage-video-container" class="video-container homepage" style="background-image: url(<?php echo get_the_post_thumbnail_url($homepage_video[0]->ID) ?>)">
                        <?php echo $homepage_video[0]->post_content; ?>
                    </div>
                </div>
            <?php
        endif;
        // Home Page, showing only the images as menus
        $destination = 'homepage';
        include( locate_template( 'template-parts/content-images-menu.php', false, false ) ); 
    ?>
</div>

<?php get_footer(); 