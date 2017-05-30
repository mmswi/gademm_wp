<?php
/*
Plugin Name: Gademm Custom Post Types
Description: Custom Post Types for 'Gademm' website.
Author: Mihai Marinescu
Author URI: https://www.facebook.com/mihai.marinescu.12
Version: 0.0.1
*/

//Exit if accessed rirectly

if(!defined('ABSPATH')) {
    exit;
}

// Registering the link images
// These will work by adding a featured image to the post type and specifying a href in the admin area
add_action('init', 'image_menu_register');

function image_menu_register() {

    $singular = 'Image Menu';
    $plural = 'Images Menu';

    $labels = array(
		'name' => _x($plural, 'post type general name'),
		'singular_name' => _x('Portfolio Item', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New ' . $singular),
		'edit_item' => __('Edit ' . $singular),
		'new_item' => __('New ' . $singular),
		'view_item' => __('View ' . $singular),
		'search_items' => __('Search ' . $plural),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

    $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-format-image',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','thumbnail', 'custom-fields')
	  ); 

    register_post_type( 'imagesmenu', $args);

}

// Registering the taxonomy for the links destination
// Using this to filter the menu links on the 'homepage' or 'collections' pages

add_action('init', 'image_menu_taxonomy_register');

function image_menu_taxonomy_register() {
    $args = array(
        'hierarchical' => true, 
        'label' => 'Link Destination', 
        'singular_label' => 'Link Destination', 
        'rewrite' => true,
        'show_ui' => true,
        'show_admin_column' => true
    );

    register_taxonomy('link_destination', array('imagesmenu'), $args);
}



// Registering the lookbook images
// These will work by adding a featured image to the post type and specifying a href in the admin area
add_action('init', 'lookbook_register');

function lookbook_register() {

    $singular = 'LookBook Gallery';
    $plural = 'LookBook Gallery';

    $labels = array(
		'name' => _x($plural, 'post type general name'),
		'singular_name' => _x('Portfolio Item', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New ' . $singular),
		'edit_item' => __('Edit ' . $singular),
		'new_item' => __('New ' . $singular),
		'view_item' => __('View ' . $singular),
		'search_items' => __('Search ' . $plural),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

    $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-images-alt2',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title', 'thumbnail', 'custom-fields')
	  ); 

    register_post_type( 'lookbookgallery', $args);

}

// Adding a custom field for every imagesmenu / lookbook gallery item custom post type
// The custom field is a link
add_action("admin_init", "admin_init_image_links_meta");
 
function admin_init_image_links_meta(){
  add_meta_box("image-button-order-meta", "Image Button Order on Page", "image_link_order", "imagesmenu", "side", "low");
  add_meta_box("page-link-meta", "Image Button Address", "image_link_address", "imagesmenu", "side", "low");
  add_meta_box("image-button-text-meta", "Image Button Text", "image_link_text", "imagesmenu", "side", "low");
  add_meta_box("image-button-order-meta", "LookBook Item Order on Page", "image_link_order", "lookbookgallery", "side", "low");
  add_meta_box("image-button-text-meta", "LookBook Item Link", "image_link_text", "lookbookgallery", "side", "low");
}

function image_link_order(){
  global $post;
  $custom = get_post_custom($post->ID);
  $image_link_order = $custom["image_link_order"][0];
  ?>
  <!-- HTML -->
  <label>Button order:</label>
  <input name="image_link_order" value="<?php echo $image_link_order; ?>" />
  <!-- /HTML -->
  <?php
}
 
function image_link_address(){
  global $post;
  $custom = get_post_custom($post->ID);
  $image_link_address = $custom["image_link_address"][0];
  ?>
  <!-- HTML -->
  <label>Page link:</label>
  <input name="image_link_address" value="<?php echo $image_link_address; ?>" />
  <!-- /HTML -->
  <?php
}

function image_link_text(){
  global $post;
  $custom = get_post_custom($post->ID);
  $image_link_text = $custom["image_link_text"][0];
  ?>
  <!-- HTML -->
  <label>Page text:</label>
  <input name="image_link_text" value="<?php echo $image_link_text; ?>" />
  <!-- /HTML -->
  <?php
}

// Saving the imagesmenu link
add_action('save_post', 'save_link_details');
function save_link_details(){
  global $post;
  update_post_meta($post->ID, 'image_link_order', $_POST['image_link_order']);
  update_post_meta($post->ID, 'image_link_address', $_POST['image_link_address']);
  update_post_meta($post->ID, 'image_link_text', $_POST['image_link_text']);
}



?>