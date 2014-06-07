<?php

//Functions.php for WEA Theme
//Author: Jonathan Evans
//Version 1.0

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
	);
	register_taxonomy( 'course_season', 'course', $args );
}
add_action( 'init', 'wea_season', 0 );

//Course Details

/* Define the custom box */

add_action( 'add_meta_boxes', 'add_wea_course_data' );

// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'myplugin_add_custom_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'save_wea_course_data' );

/* Adds a box to the main column on the Post and Page edit screens */
function add_wea_course_data() {
	$screens = array( 'course' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'wea_sectionid',
			__( 'Course Details' ),
			'wea_custom_box',
			$screen
		);
	}
}

/* Prints the box content */
function wea_custom_box( $post ) {

	// Use nonce for verification
	wp_nonce_field( plugin_basename( __FILE__ ), 'wea_noncename' );

	// The actual fields for data entry
	// Use get_post_meta to retrieve an existing value from the database and use the value for the form
?>
	<label for="course_code">Course Code</label>
	<input type="text" id="course_code" name="course_code" size=8 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_code', true ) ); ?>">
	<br /><label for="course_tutor">Tutor</label>
	<input type="text" id="course_tutor" name="course_tutor" size=30 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_tutor', true ) ); ?>">
	<br /><label for="course_tutor_url">Tutor URL</label>
	<input type="text" id="course_tutor_url" name="course_tutor_url" size=30 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_tutor_url', true ) ); ?>">
  	<br /><label for="course_venue">Venue</label>
	<input type="text" id="course_venue" name="course_venue" size=10 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_venue', true ) ); ?>">
    <br /><label for="course_venue">Venue URL</label>
	<input type="text" id="course_venue_url" name="course_venue_url" size=30 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_venue_url', true ) ); ?>">
    <br /><label for="course_start">Course Start Date (IMPORTANT - use YYYY-MM-DD format)</label>
	<input type="text" id="course_start" name="course_start" size=10 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_start', true ) ); ?>">
    <br /><label for="course_end">Course End Date (IMPORTANT - use YYYY-MM-DD format)</label>
	<input type="text" id="course_end" name="course_end" size=10 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_end', true ) ); ?>">
    <br /><label for="course_info">Course Information</label>
	<input type="text" id="course_info" name="course_info" size=60 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_info', true ) ); ?>">
	<?php
}

/* When the post is saved, saves our custom data */
function save_wea_course_data( $post_id ) {


	// Secondly we need to check if the user intended to change this value.
	if ( ! isset( $_POST['wea_noncename'] ) || ! wp_verify_nonce( $_POST['wea_noncename'], plugin_basename( __FILE__ ) ) )
		return;

	// Thirdly we can save the value to the database

	//if saving in a custom table, get post_ID
	$post_ID = $_POST['post_ID'];


	// Do something with $mydata
	// either using
	$course_code = sanitize_text_field( $_POST['course_code'] );
	add_post_meta( $post_ID, 'course_code', $course_code, true ) or
		update_post_meta( $post_id, 'course_code', $course_code );

	$course_tutor = sanitize_text_field( $_POST['course_tutor'] );
	add_post_meta( $post_ID, 'course_tutor', $course_tutor, true ) or
		update_post_meta( $post_id, 'course_tutor', $course_tutor );

	$course_venue = sanitize_text_field( $_POST['course_venue'] );
	add_post_meta( $post_id, 'course_venue', $course_venue, true ) or
		update_post_meta( $post_id, 'course_venue', $course_venue );

	$course_tutor_url = sanitize_text_field( $_POST['course_tutor_url'] );
	add_post_meta( $post_id, 'course_tutor_url', $course_tutor_url, true ) or
		update_post_meta( $post_id, 'course_tutor_url', $course_tutor_url );

	$course_venue_url = sanitize_text_field( $_POST['course_venue_url'] );
	add_post_meta( $post_id, 'course_venue_url', $course_venue_url, true ) or
		update_post_meta( $post_id, 'course_venue_url', $course_venue_url );

	$course_start = sanitize_text_field( $_POST['course_start'] );
	$course_start_date = strtotime( $course_start );
	add_post_meta( $post_id, 'course_start_date', $course_start_date, true ) or
		update_post_meta( $post_id, 'course_start_date', $course_start_date );
	add_post_meta( $post_id, 'course_start', $course_start, true ) or
		update_post_meta( $post_id, 'course_start', $course_start );

	if ( strlen( $_POST['course_end'] )!=0 ) {
		$course_end = sanitize_text_field( $_POST['course_end'] );
	}
	else {
		$course_end = sanitize_text_field( $_POST['course_start'] );
	}
	$course_end_date = strtotime( $course_end );
	add_post_meta( $post_id, 'course_end', $course_end, true ) or
		update_post_meta( $post_id, 'course_end', $course_end );
	add_post_meta( $post_id, 'course_end_date', $course_end_date, true ) or
		update_post_meta( $post_id, 'course_end_date', $course_end_date );

	$course_info = sanitize_text_field( $_POST['course_info'] );
	add_post_meta( $post_id, 'course_info', $course_info, true ) or
		update_post_meta( $post_id, 'course_info', $course_info );
}


//Start WEA Options
//***********************
// Options Page Functions

add_action( 'admin_menu', 'wea_options_menu' );

function wea_options_menu() {
	add_menu_page( 'WEA Options', 'WEA Options', 'manage_options', 'wea-user-options', 'wea_options_page', '', 99 );
}

function wea_options_page() {
	//if we got here with a POST, update the database with the new options
	if ( $_POST['update_wea_options'] == 'true' ) { wea_options_update(); }
	// here's the main function that will generate our options page
?>

<!--Options Markup-->
<div class="wrap">
    <div id="icon-themes" class="icon32"><br />
    </div>
    <h2>WEA Options</h2>
    <form method="POST" action="">
        <input type="hidden" name="update_wea_options" value="true" />
        <h3>Organisation Name</h3>
        <p>The name of your organisation is shown in the header and footer, for example in the copyright.</p>
        <p><input type="text" name="org-name" id="org-name" size="30" value="<?php esc_attr_e( get_option( 'org-name' ) ); ?>"/> Your organisation eg WEA Dorchester</p>
        <h3>Homepage Text</h3>
        <p>These options allow you to customise the titles and text you see on the homepage.</p>
        <p><input type="text" name="intro-title" id="intro-title" size="48" value="<?php esc_attr_e( get_option( 'intro-title' ) ); ?>"/> Homepage Title</p>
        <p><textarea name="intro-text" id="intro-text" cols=36 rows=6><?php esc_attr_e( get_option( 'intro-text' ) ); ?></textarea> Homepage Text - Use &lt;br /&gt; for line breaks, the &lt;p&gt; tag could break the layout.</p>
        <p><textarea name="stop-press" id="stop-press" cols=36 rows=6><?php esc_attr_e( get_option( 'stop-press' ) ); ?></textarea> Stop Press Text - Use &lt;br /&gt; for line breaks, the &lt;p&gt; tag could break the layout.</p>
        <h3>Contact Details</h3>
        <p>These details will be displayed on both the header and footer of every page.</p>
        <p><input type="text" name="wea-phone" id="wea-phone" size="24" value="<?php esc_attr_e( get_option( 'wea-phone' ) ); ?>"/> Contact Phone Number</p>
        <p><input type="text" name="regional-phone" id="regional-phone" size="24" value="<?php esc_attr_e( get_option( 'regional-phone' ) ); ?>"/> Regional Office Phone Number (optional)</p>
        <p><input type="text" name="wea-email" id="wea-email" size="24" value="<?php esc_attr_e( get_option( 'wea-email' ) ); ?>"/> Email Address</p>
        <h3>Front Page Quick Link Text</h3>
        <p>These options allow you to customise the text on the 4 Quick Link boxes on the home page.</p>
        <p><input type="text" name="courses-text" id="courses-text" size="48" value="<?php esc_attr_e( get_option( 'courses-text' ) ); ?>"/> Courses</p>
        <p><input type="text" name="contact-text" id="contact-text" size="48" value="<?php esc_attr_e( get_option( 'contact-text' ) ); ?>"/> Contact</p>
        <p><input type="text" name="tutor-text" id="tutor-text" size="48" value="<?php esc_attr_e( get_option( 'tutor-text' ) ); ?>"/> Tutor</p>
        <p><input type="text" name="venue-text" id="venue-text" size="48" value="<?php esc_attr_e( get_option( 'venue-text' ) ); ?>"/> Venue</p>
        <!-- submit button -->
        <p><input type="submit" name="search" value="Update Options" class="button" /></p>
    </form>
</div>

<?php
}
function wea_options_update() {
	// this is where validation would go
	update_option( 'org-name', $_POST['org-name'] );
	update_option( 'intro-title', $_POST['intro-title'] );
	update_option( 'intro-text', $_POST['intro-text'] );
	update_option( 'stop-press', $_POST['stop-press'] );
	update_option( 'wea-phone', $_POST['wea-phone'] );
	update_option( 'regional-phone', $_POST['regional-phone'] );
	update_option( 'wea-email', $_POST['wea-email'] );
	update_option( 'courses-text', $_POST['courses-text'] );
	update_option( 'contact-text', $_POST['contact-text'] );
	update_option( 'tutor-text', $_POST['tutor-text'] );
	update_option( 'venue-text', $_POST['venue-text'] );
}
//Google fonts into header

function load_fonts() {
	wp_register_style( 'googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700' );
	wp_enqueue_style( 'googleFonts' );
}

add_action( 'wp_print_styles', 'load_fonts' );

function remove_page_excerpt_field() {
	remove_meta_box( 'postexcerpt' , 'course' , 'normal' );
	remove_meta_box( 'postexcerpt' , 'venue' , 'normal' );
	remove_meta_box( 'postexcerpt' , 'tutor' , 'normal' );
	remove_meta_box( 'commentstatusdiv', 'course', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'venue', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'tutor', 'normal' );
}
add_action( 'admin_menu' , 'remove_page_excerpt_field' );

//remove options from Admin

//add_action( 'admin_init', 'my_remove_menu_pages' );

// function my_remove_menu_pages() {
//  remove_menu_page('edit.php');//posts
//  remove_menu_page('edit-comments.php');//comments
//  remove_menu_page('link-manager.php');//links
//  remove_submenu_page('themes.php', 'widgets.php');//widgets
// }
?>
