<?php
/**
 * Template part for displaying images menu buttons
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gademm_underscores
 * variables $destination passed from the pages
 *
 *
 */

?>
<?php
    /* Querying custom post types of imagesmenu and filtering by the destination received from the page calling the menu*/
    $args = array( 
        'post_type' => 'imagesmenu',
        'posts_per_page'	=> -1,
        'meta_key'			=> 'image_link_order',
        'orderby'			=> 'meta_value',
        'order'				=> 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'link_destination',
                'field'    => 'slug',
                'terms' => $destination
            )
        )
        );

    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <a id="image-link-<?php the_ID(); ?>" class="grid-item image-menu-link <?php echo $destination . ' postition-'. get_post_meta( get_the_ID(), 'image_link_order', true ); ?>" 
        href="<?php echo get_post_meta( get_the_ID(), 'image_link_address', true ); ?>"
        style="background-image: url(<?php echo the_post_thumbnail_url() ?>)">
        <div class="image-container">
            <div class="visible-xs">                
                <?php the_post_thumbnail(); ?>
            </div>
            <?php
                  if (get_post_meta( get_the_ID(), 'image_link_text', true )) :
            ?>
            <span class="image-button-text-overlay"></span>
            <p class="image-button-text"><?php echo get_post_meta( get_the_ID(), 'image_link_text', true ) ?></p>
            <?php endif; ?>
        </div><!-- .image-container -->
        </a><!-- #image-link-## -->
    <?php
    endwhile;
    wp_reset_postdata();
?>