<?php

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

	<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

   	<!-- Call the jquery Datepicker -->
   	<script type="text/javascript">
   		$(function() {
        	$("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       	});
   	</script>
   	<script type="text/javascript">
    	$(function() {
        	$("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val()
       	});
   	</script>

	<label for="course_code">Course Code</label>
	<input type="text" id="course_code" name="course_code" size=8 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_code', true ) ); ?>">
	<br /><label for="course_fee">Course Fee £</label>
	<input type="text" id="course_fee" name="course_fee" size=5 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_fee', true ) ); ?>">
	<br /><label for="course_tutor">Tutor</label>
	<input type="text" id="course_tutor" name="course_tutor" size=20 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_tutor', true ) ); ?>">
	<label for="course_tutor_url">Tutor URL</label>
	<input type="text" id="course_tutor_url" name="course_tutor_url" size=40 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_tutor_url', true ) ); ?>">
  	<br /><label for="course_venue">Venue</label>
	<input type="text" id="course_venue" name="course_venue" size=20 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_venue', true ) ); ?>">
    <label for="course_venue">Venue URL</label>
	<input type="text" id="course_venue_url" name="course_venue_url" size=40 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_venue_url', true ) ); ?>">
    <br /><label for="course_start">Course Start Date</label>
	<input type="text" id="datepicker1" name="course_start" size=10 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_start', true ) ); ?>">
    <br /><label for="course_end">Course End Date</label>
	<input type="text" id="datepicker2" name="course_end" size=10 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_end', true ) ); ?>">
    <br /><label for="course_sessions">Number of Sessions</label>
	<input type="text" id="course_sessions" name="course_sessions" size=10 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'course_sessions', true ) ); ?>">    
    <label for="session_length">Session Length</label>
	<input type="text" id="session_length" name="session_length" size=10 value="<?php echo esc_attr( get_post_meta( get_the_id(), 'session_length', true ) ); ?>">    
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

	$course_fee = sanitize_text_field( $_POST['course_fee'] );
	add_post_meta( $post_ID, 'course_fee', $course_fee, true ) or
		update_post_meta( $post_id, 'course_fee', $course_fee );

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
	
	$course_sessions = sanitize_text_field( $_POST['course_sessions'] );
	add_post_meta( $post_id, 'course_sessions', $course_sessions, true ) or
		update_post_meta( $post_id, 'course_sessions', $course_sessions );

	$session_length = sanitize_text_field( $_POST['session_length'] );
	add_post_meta( $post_id, 'session_length', $session_length, true ) or
		update_post_meta( $post_id, 'session_length', $session_length );
	
	$course_info = sanitize_text_field( $_POST['course_info'] );
	add_post_meta( $post_id, 'course_info', $course_info, true ) or
		update_post_meta( $post_id, 'course_info', $course_info );
}