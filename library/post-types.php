<?php

//********
//Custom Post Types
//********
//Start Course
//*********
function wea_course() {
	$labels = array(
		'name'               => _x( 'Courses', 'post type general name' ),
		'singular_name'      => _x( 'Course', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'course' ),
		'add_new_item'       => __( 'Add New Course' ),
		'edit_item'          => __( 'Edit Course' ),
		'new_item'           => __( 'New Course' ),
		'all_items'          => __( 'All Courses' ),
		'view_item'          => __( 'View Course' ),
		'search_items'       => __( 'Search Courses' ),
		'not_found'          => __( 'No courses found' ),
		'not_found_in_trash' => __( 'No courses found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Courses'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Allows you to enter and edit courses',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'course', $args );
	flush_rewrite_rules( false );
}

add_action( 'init', 'wea_course' );

//Customise messages
function wea_course_messages( $messages ) {
	global $post, $post_ID;
	$messages['course'] = array(
		0 => '',
		1 => sprintf( __( 'Course updated. <a href="%s">View course</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		2 => __( 'Custom field updated.' ),
		3 => __( 'Custom field deleted.' ),
		4 => __( 'Course updated.' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Course restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Course published. <a href="%s">View course</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		7 => __( 'Course saved.' ),
		8 => sprintf( __( 'Course submitted. <a target="_blank" href="%s">Preview product</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( __( 'Course scheduled for publication on: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Course draft updated. <a target="_blank" href="%s">Preview product</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'wea_course_messages' );

//********
//End Course
//********
//Start Tutor
//*********

function wea_tutor() {
	$labels = array(
		'name'               => _x( 'Tutors', 'post type general name' ),
		'singular_name'      => _x( 'Tutors', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'tutor' ),
		'add_new_item'       => __( 'Add New Tutor' ),
		'edit_item'          => __( 'Edit Tutor' ),
		'new_item'           => __( 'New Tutor' ),
		'all_items'          => __( 'All Tutors' ),
		'view_item'          => __( 'View Tutor' ),
		'search_items'       => __( 'Search Tutors' ),
		'not_found'          => __( 'No tutors found' ),
		'not_found_in_trash' => __( 'No tutors found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Tutors'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Allows you to enter and edit course tutors',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'tutor', $args );
	flush_rewrite_rules( false );
}

add_action( 'init', 'wea_tutor' );

//Customise messages
function wea_tutor_messages( $messages ) {
	global $post, $post_ID;
	$messages['tutor'] = array(
		0 => '',
		1 => sprintf( __( 'Tutor updated. <a href="%s">View Tutor</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		2 => __( 'Tutor field updated.' ),
		3 => __( 'Tutor field deleted.' ),
		4 => __( 'Tutor updated.' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Tutor restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Tutor Details published. <a href="%s">View Tutor</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		7 => __( 'Tutor saved.' ),
		8 => sprintf( __( 'Tutor Details submitted. <a target="_blank" href="%s">Preview Tutor</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( __( 'Tutor Details scheduled for publication on: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Tutor</a>' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Tutor draft updated. <a target="_blank" href="%s">Preview Tutor</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'wea_tutor_messages' );
//*********
//End Tutor
//*********
//********
//Start Venue
//*********

function wea_venue() {
	$labels = array(
		'name'               => _x( 'Venues', 'post type general name' ),
		'singular_name'      => _x( 'Venue', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'venue' ),
		'add_new_item'       => __( 'Add New Venue' ),
		'edit_item'          => __( 'Edit Venue' ),
		'new_item'           => __( 'New Venue' ),
		'all_items'          => __( 'All Venues' ),
		'view_item'          => __( 'View Venue' ),
		'search_items'       => __( 'Search Venues' ),
		'not_found'          => __( 'No venues found' ),
		'not_found_in_trash' => __( 'No venues found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Venues'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Allows you to enter and edit venues',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'venue', $args );
	flush_rewrite_rules( false );
}

add_action( 'init', 'wea_venue' );

//Customise messages
function wea_venue_messages( $messages ) {
	global $post, $post_ID;
	$messages['venue'] = array(
		0 => '',
		1 => sprintf( __( 'Venue updated. <a href="%s">View course</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		2 => __( 'Venue field updated.' ),
		3 => __( 'Venue field deleted.' ),
		4 => __( 'Venue updated.' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Venue restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Venue Details published. <a href="%s">View Venue</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		7 => __( 'Venue saved.' ),
		8 => sprintf( __( 'Venue Details submitted. <a target="_blank" href="%s">Preview Venue</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( __( 'Venue Details scheduled for publication on: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Venue</a>' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Venue draft updated. <a target="_blank" href="%s">Preview Venue</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'wea_venue_messages' );
//*********
//End Venue
//*********