<?php
/**
 * The template for displaying lookbook
 *
 *
 * @package gademm_underscores
 */

get_header(); ?>

<?php
    /* Querying custom post types of imagesmenu and filtering by the destination received from the page calling the menu*/
    $args = array( 
        'post_type' => 'lookbookgallery',
        'posts_per_page'	=> -1,
        'meta_key'			=> 'image_link_order',
        'orderby'			=> 'meta_value',
        'order'				=> 'ASC'
        );

    $loop = new WP_Query( $args );
    the_title( '<h1 class="look-book-title">', '</h1>' );
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <a id="lookbook-item-<?php echo get_post_meta( get_the_ID(), 'image_link_order', true ); ?>" class="lookbook-item <?php echo ' postition-'. get_post_meta( get_the_ID(), 'image_link_order', true ); ?>" href="<?php echo the_post_thumbnail_url(); ?>">      
            <?php
                the_post_thumbnail('medium_large');
                if (get_post_meta( get_the_ID(), 'image_link_text', true )) :
            ?>
            <!--<span class="image-button-text-overlay"></span>
            <p class="image-button-text"><?php echo get_post_meta( get_the_ID(), 'image_link_text', true ) ?></p>-->
            <?php endif; ?>

        </a><!-- #image-link-## -->   
    <?php
    endwhile;
    wp_reset_postdata();
?>

<?php
get_footer();
