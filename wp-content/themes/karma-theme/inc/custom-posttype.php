<?php
// Exit If Accessed Directly
if( !defined( 'ABSPATH' ) ) exit;

function demo_register_posttype(){
	// register Banner post type
	$banner_labels = array(
		'name'               => _x( 'Banners', 'demo_banner', 'demo' ),
		'singular_name'      => _x( 'Banners', 'demo_banner', 'demo' ),
		'menu_name'          => _x( 'Banners', 'demo_banner', 'demo' ),
		'name_admin_bar'     => _x( 'Banners', 'demo_banner', 'demo' ),
		'add_new'            => _x( 'Add New', 'demo_banner', 'demo' ),
		'add_new_item'       => __( 'Add New Banners', 'demo' ),
		'new_item'           => __( 'New Banners', 'demo' ),
		'edit_item'          => __( 'Edit Banners', 'demo' ),
		'view_item'          => __( 'View Banners', 'demo' ),
		'all_items'          => __( 'All Banners', 'demo' ),
		'search_items'       => __( 'Search Banners', 'demo' ),
		'parent_item_colon'  => __( 'Parent Banners:', 'demo' ),
		'not_found'          => __( 'No Banners found.', 'demo' ),
		'not_found_in_trash' => __( 'No Banners found in Trash.', 'demo' )
	);

	$banner_args = array(
		'labels'             => $banner_labels,
		'description'        => __( 'Description.', 'demo' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'banner' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'			 => 'dashicons-slides',
		'menu_position'      => null,
		'supports'           => array( 'title')
	);

	register_post_type( 'banner', $banner_args );

	// Projects Type post type
	$Service_labels = array(
		'name'               => _x( 'Service', 'systems', 'demo' ),
		'singular_name'      => _x( 'Service', 'systems', 'demo' ),
		'menu_name'          => _x( 'Service', 'systems', 'demo' ),
		'name_admin_bar'     => _x( 'Service', 'systems', 'demo' ),
		'add_new'            => _x( 'Add New Service', 'systems', 'demo' ),
		'add_new_item'       => __( 'Add New Service', 'demo' ),
		'new_item'           => __( 'New Service', 'demo' ),
		'edit_item'          => __( 'Edit Service', 'demo' ),
		'view_item'          => __( 'View Service', 'demo' ),
		'all_items'          => __( 'All Service', 'demo' ),
		'search_items'       => __( 'Search Service', 'demo' ),
		'parent_item_colon'  => __( 'Parent Service:', 'demo' ),
		'not_found'          => __( 'No Service found.', 'demo' ),
		'not_found_in_trash' => __( 'No Service found in Trash.', 'demo' )
	);

	$Service_args = array(
		'labels'             => $Service_labels,
		'description'        => __( 'Description.', 'demo' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'	     => 'dashicons-screenoptions',
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor','thumbnail','author')
	);

    register_post_type( DEMO_SERVICE_POST_TYPE, $Service_args );
	

	// Testimonials post type
	$test_labels = array(
		'name'               => _x( 'Testimonial', 'systems', 'demo' ),
		'singular_name'      => _x( 'Testimonial', 'systems', 'demo' ),
		'menu_name'          => _x( 'Testimonial', 'systems', 'demo' ),
		'name_admin_bar'     => _x( 'Testimonial', 'systems', 'demo' ),
		'add_new'            => _x( 'Add New', 'systems', 'demo' ),
		'add_new_item'       => __( 'Add New Testimonial', 'demo' ),
		'new_item'           => __( 'New Testimonial', 'demo' ),
		'edit_item'          => __( 'Edit Testimonial', 'demo' ),
		'view_item'          => __( 'View Testimonial', 'demo' ),
		'all_items'          => __( 'All Testimonial', 'demo' ),
		'search_items'       => __( 'Search Testimonial', 'demo' ),
		'parent_item_colon'  => __( 'Parent Testimonial:', 'demo' ),
		'not_found'          => __( 'No Testimonial found.', 'demo' ),
		'not_found_in_trash' => __( 'No Testimonial found in Trash.', 'demo' )
	);

	$test_args = array(
		'labels'             => $test_labels,
		'description'        => __( 'Description.', 'demo' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'	     => 'dashicons-format-chat',
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor')
	);

    register_post_type( DEMO_TESTIMONIAL_POST_TYPE, $test_args );


    	flush_rewrite_rules();
}

add_action( 'init', 'demo_register_posttype' ); ?>