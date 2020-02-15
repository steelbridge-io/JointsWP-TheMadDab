<?php
/*
 * Product CPT
 */


// Register Custom Post Type
function product_cpt() {
  
  $labels = array(
    'name'                  => _x( 'Products', 'Post Type General Name', 'themaddab' ),
    'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'themaddab' ),
    'menu_name'             => __( 'Products', 'themaddab' ),
    'name_admin_bar'        => __( 'Product', 'themaddab' ),
    'archives'              => __( 'Item Archives', 'themaddab' ),
    'attributes'            => __( 'Item Attributes', 'themaddab' ),
    'parent_item_colon'     => __( 'Parent Item:', 'themaddab' ),
    'all_items'             => __( 'All Items', 'themaddab' ),
    'add_new_item'          => __( 'Add New Item', 'themaddab' ),
    'add_new'               => __( 'Add New', 'themaddab' ),
    'new_item'              => __( 'New Item', 'themaddab' ),
    'edit_item'             => __( 'Edit Page', 'themaddab' ),
    'update_item'           => __( 'Update Item', 'themaddab' ),
    'view_item'             => __( 'View Page', 'themaddab' ),
    'view_items'            => __( 'View Pages', 'themaddab' ),
    'search_items'          => __( 'Search Item', 'themaddab' ),
    'not_found'             => __( 'Not found', 'themaddab' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'themaddab' ),
    'featured_image'        => __( 'Featured Image', 'themaddab' ),
    'set_featured_image'    => __( 'Set featured image', 'themaddab' ),
    'remove_featured_image' => __( 'Remove featured image', 'themaddab' ),
    'use_featured_image'    => __( 'Use as featured image', 'themaddab' ),
    'insert_into_item'      => __( 'Insert into item', 'themaddab' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'themaddab' ),
    'items_list'            => __( 'Items list', 'themaddab' ),
    'items_list_navigation' => __( 'Items list navigation', 'themaddab' ),
    'filter_items_list'     => __( 'Filter items list', 'themaddab' ),
  );
  $args = array(
    'label'                 => __( 'Products', 'themaddab' ),
    'description'           => __( 'Products', 'themaddab' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 10,
    'menu_icon'             => 'dashicons-admin-page',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => true
  );
  register_post_type( 'product_cpt', $args );
  
}
add_action( 'init', 'product_cpt', 0 );

// Custom Taxonomy
add_action('init', 'custom_travel_tax');
function custom_travel_tax() {
  register_taxonomy(
    'product-category',
    'product_cpt',
    array(
      'hierarchical'	=> true,
      'label'			=> __('Product Types'),
      'query_var'		=> true,
      'rewrite'		=> true,
      'show_in_rest'  => true
    )
  );
}

add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Product Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Product Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Product Tags' ),
    'popular_items' => __( 'Popular Product Tags' ),
    'all_items' => __( 'All Product Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Product Tags' ),
  );
  
  register_taxonomy('product-tag','product_cpt',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => true,
    'show_in_rest'  => true
  ));
}
