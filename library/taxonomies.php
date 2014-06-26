<?php 

//Seasons taxonomy

function wea_season() {
	$labels = array(
		'name'              => _x( 'Course Seasons', 'taxonomy general name' ),
		'singular_name'     => _x( 'Course Season', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Course Seasons' ),
		'all_items'         => __( 'All Course Seasons' ),
		'parent_item'       => __( 'Parent Course Season' ),
		'parent_item_colon' => __( 'Parent Course Season:' ),
		'edit_item'         => __( 'Edit Course Season' ),
		'update_item'       => __( 'Update Course Season' ),
		'add_new_item'      => __( 'Add New Course Season' ),
		'new_item_name'     => __( 'New Course Season' ),
		'menu_name'         => __( 'Course Seasons' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite'        => array( 'slug' => 'season' ),
	);
	register_taxonomy( 'course_season', 'course', $args );
}
add_action( 'init', 'wea_season', 0 );

function course_status() {
	$labels = array(
		'name'              => _x( 'Course Status', 'taxonomy general name' ),
		'singular_name'     => _x( 'Course Status', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Course Status' ),
		'all_items'         => __( 'All Course Status' ),
		'parent_item'       => __( 'Parent Course Status' ),
		'parent_item_colon' => __( 'Parent Course Status:' ),
		'edit_item'         => __( 'Edit Course Status' ),
		'update_item'       => __( 'Update Course Status' ),
		'add_new_item'      => __( 'Add New Course Status' ),
		'new_item_name'     => __( 'New Course Status' ),
		'menu_name'         => __( 'Course Status' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite'        => array( 'slug' => 'status' ),
	);
	register_taxonomy( 'course_status', 'course', $args );
}
add_action( 'init', 'course_status', 0 );