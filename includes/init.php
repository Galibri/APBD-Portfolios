<?php

//custom post type register for portfolios

function apbd_init(){
    $labels = array(
        'name'                      => __( 'Portfolio', 'apbd' ),
        'singular_name'             => __( 'Portfolio', 'apbd' ),
        'menu_name'                 => __( 'Image Portfolio', 'apbd' ),
        'name_admin_bar'            => __( 'Image Portfolio', 'apbd' ),
        'add_new'                   => __( 'Add New', 'apbd' ),
        'add_new_item'              => __( 'Add New Portfolio', 'apbd' ),
        'new_item'                  => __( 'New Portfolio', 'apbd' ),
        'edit_item'                 => __( 'Edit Portfolio', 'apbd' ),
        'view_item'                 => __( 'View Portfolio', 'apbd' ),
        'all_items'                 => __( 'All Portfolio', 'apbd' ),
        'search_items'              => __( 'Search Portfolio', 'apbd' ),
        'parent_item_colon'         => __( 'Parent Portfolio:', 'apbd' ),
        'not_found'                 => __( 'No Portfolio found.', 'apbd' ),
        'not_found_in_trash'        => __( 'No Portfolio found in Trash.', 'apbd' ),
        'featured_image'            => __( 'Portfolio Image', 'apbd' ),
        'set_featured_image'        => __( 'Set Portfolio image', 'apbd' ),
        'remove_featured_image'     => __( 'Remove Portfolio image', 'apbd' ),
        'use_featured_image'        => __( 'Use as Portfolio image', 'apbd' ),
        'archives'                  => __( 'Portfolio archives', 'apbd' ),
        'insert_into_item'          => __( 'Insert into Portfolio', 'apbd' ),
        'uploaded_to_this_item'     => __( 'Uploaded to this Portfolio', 'apbd' ),
        'filter_items_list'         => __( 'Filter Portfolio list', 'apbd' ),
        'items_list_navigation'     => __( 'Portfolio list navigation', 'apbd' ),
        'items_list'                => __( 'Portfolio list', 'apbd' ),
    );
 
    $args = array(
        'labels'                    => $labels,
        'public'                    => true,
        'publicly_queryable'        => true,
        'show_ui'                   => true,
        'show_in_menu'              => true,
        'query_var'                 => true,
        'rewrite'                   => array( 'slug' => 'portfolios' ),
        'capability_type'           => 'post',
        'has_archive'               => true,
        'hierarchical'              => false,
        'menu_position'             => 20,
        'supports'                  => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'portfolios', $args );
    
    //taxonomy registration for portfolios post type
    $names = array(
		'name'              => __( 'Portfolio Type', 'textdomain' ),
		'singular_name'     => __( 'Portfolio Type', 'textdomain' ),
		'search_items'      => __( 'Search Portfolio Type', 'textdomain' ),
		'all_items'         => __( 'All Portfolio Type', 'textdomain' ),
		'parent_item'       => __( 'Parent Portfolio Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Portfolio Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Portfolio Type', 'textdomain' ),
		'update_item'       => __( 'Update Portfolio Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Portfolio Type', 'textdomain' ),
		'new_item_name'     => __( 'New Portfolio Type Name', 'textdomain' ),
		'menu_name'         => __( 'Portfolio Type', 'textdomain' ),
	);

	$parameters = array(
		'hierarchical'      => true,
		'labels'            => $names,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'type', array( 'portfolios' ), $parameters );
    
    flush_rewrite_rules();
}
