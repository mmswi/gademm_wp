This is somepage bitcheees!!!

<?php
    $args = array( 
        'post_type' => 'imagesmenu',
        'tax_query' => array(
            array(
                'taxonomy' => 'link_destination',
                'field'    => 'slug',
                'terms' => 'collection'
            )
        )
        );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    the_title();
    echo '<div class="entry-content">';
    the_content();
    // the_post_thumbnail();
    echo get_post_custom_values('image_link_address')[0];
    echo '<br>';
    echo get_post_meta( get_the_ID(), 'image_link_address', true );
    echo '</div>';
    endwhile;
?>