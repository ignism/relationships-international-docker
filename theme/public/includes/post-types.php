<?php
// Register post types

// Register Custom Post Type Blog Article
function create_blogarticle_cpt() {

	$labels = array(
		'name' => _x( 'Blog Articles', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Blog Article', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Blog Articles', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Blog Article', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Blog Article Archives', 'textdomain' ),
		'attributes' => __( 'Blog Article Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Blog Article:', 'textdomain' ),
		'all_items' => __( 'All Blog Articles', 'textdomain' ),
		'add_new_item' => __( 'Add New Blog Article', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Blog Article', 'textdomain' ),
		'edit_item' => __( 'Edit Blog Article', 'textdomain' ),
		'update_item' => __( 'Update Blog Article', 'textdomain' ),
		'view_item' => __( 'View Blog Article', 'textdomain' ),
		'view_items' => __( 'View Blog Articles', 'textdomain' ),
		'search_items' => __( 'Search Blog Article', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Blog Article', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Blog Article', 'textdomain' ),
		'items_list' => __( 'Blog Articles list', 'textdomain' ),
		'items_list_navigation' => __( 'Blog Articles list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Blog Articles list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Blog Article', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'blogarticle', $args );

}
create_blogarticle_cpt();

// Register Custom Post Type Media Article
function create_mediaarticle_cpt() {

	$labels = array(
		'name' => _x( 'Media Articles', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Media Article', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Media Articles', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Media Article', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Media Article Archives', 'textdomain' ),
		'attributes' => __( 'Media Article Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Media Article:', 'textdomain' ),
		'all_items' => __( 'All Media Articles', 'textdomain' ),
		'add_new_item' => __( 'Add New Media Article', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Media Article', 'textdomain' ),
		'edit_item' => __( 'Edit Media Article', 'textdomain' ),
		'update_item' => __( 'Update Media Article', 'textdomain' ),
		'view_item' => __( 'View Media Article', 'textdomain' ),
		'view_items' => __( 'View Media Articles', 'textdomain' ),
		'search_items' => __( 'Search Media Article', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Media Article', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Media Article', 'textdomain' ),
		'items_list' => __( 'Media Articles list', 'textdomain' ),
		'items_list_navigation' => __( 'Media Articles list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Media Articles list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Media Article', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'mediaarticle', $args );

}
create_mediaarticle_cpt();

// Register Custom Post Type Workshop
function create_workshop_cpt() {

	$labels = array(
		'name' => _x( 'Workshops', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Workshop', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Workshops', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Workshop', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Workshop Archives', 'textdomain' ),
		'attributes' => __( 'Workshop Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Workshop:', 'textdomain' ),
		'all_items' => __( 'All Workshops', 'textdomain' ),
		'add_new_item' => __( 'Add New Workshop', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Workshop', 'textdomain' ),
		'edit_item' => __( 'Edit Workshop', 'textdomain' ),
		'update_item' => __( 'Update Workshop', 'textdomain' ),
		'view_item' => __( 'View Workshop', 'textdomain' ),
		'view_items' => __( 'View Workshops', 'textdomain' ),
		'search_items' => __( 'Search Workshop', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Workshop', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Workshop', 'textdomain' ),
		'items_list' => __( 'Workshops list', 'textdomain' ),
		'items_list_navigation' => __( 'Workshops list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Workshops list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Workshop', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'workshop', $args );

}
create_workshop_cpt();

// Register Custom Post Type Widget
function create_widget_cpt() {

	$labels = array(
		'name' => _x( 'Widgets', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Widget', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Widgets', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Widget', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Widget Archives', 'textdomain' ),
		'attributes' => __( 'Widget Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Widget:', 'textdomain' ),
		'all_items' => __( 'All Widgets', 'textdomain' ),
		'add_new_item' => __( 'Add New Widget', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Widget', 'textdomain' ),
		'edit_item' => __( 'Edit Widget', 'textdomain' ),
		'update_item' => __( 'Update Widget', 'textdomain' ),
		'view_item' => __( 'View Widget', 'textdomain' ),
		'view_items' => __( 'View Widgets', 'textdomain' ),
		'search_items' => __( 'Search Widget', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Widget', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Widget', 'textdomain' ),
		'items_list' => __( 'Widgets list', 'textdomain' ),
		'items_list_navigation' => __( 'Widgets list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Widgets list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Widget', 'textdomain' ),
		'description' => __( 'Global site widgets', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-megaphone',
		'supports' => array('title'),
		'taxonomies' => array(),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 6,
		'show_in_admin_bar' => false,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => false,
		'capability_type' => 'post',
	);
	register_post_type( 'widget', $args );
}
create_widget_cpt();