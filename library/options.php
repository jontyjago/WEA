<?php

//Start WEA Options
//***********************
// Options Page Functions

add_action( 'admin_menu', 'wea_options_menu' );

function wea_options_menu() {
	add_menu_page( 'WEA Options', 'WEA Options', 'manage_options', 'wea-user-options', 'wea_options_page', '', 99 );
}

function wea_options_page() {
	//if we got here with a POST, update the database with the new options
	if (isset($_POST['update_wea_options'])) {
        if ( $_POST['update_wea_options'] == 'true' ) { wea_options_update(); }
    }
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