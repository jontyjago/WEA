<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">

	<div class="wrapper">
	    <div class="one-fourth">
	    <div id="contact-foot">
                <h4>Contact <?php echo stripslashes( get_option( 'org-name' ) );?></h4>
                <p>Phone: <?php echo stripslashes( get_option( 'wea-phone' ) ); ?></p>
                <p>Email: <?php echo stripslashes( get_option( 'wea-email' ) ); ?></p>
                <?php
if ( strlen( get_option( 'regional-phone' ) )!=0 ) {?> <p>Regional Phone: <?php echo stripslashes( get_option( 'regional-phone' ) );}?> </p>
            </div><!--end contact-->
	    </div><!-- #one-fourth -->
	    <div class="one-fourth">
	    <ul>
            <li><a href="<?php echo site_url() ?>/course/">All Courses</a></li>
            <li><a href="<?php echo site_url() ?>/season/day-courses/">Day Courses</a></li>
            <li><a href="<?php echo site_url() ?>/season/autumn/">Autumn</a></li>
            <li><a href="<?php echo site_url() ?>/season/spring/">Spring</a></li>
            <li><a href="<?php echo site_url() ?>/season/multi-week-courses/">Multi-Week</a></li>
        </ul>
	    </div><!-- #one-fourth -->
	    <div class="one-fourth">
        <ul>
            <li><a href="<?php echo site_url() ?>/venue/">Venues</a></li>
            <li><a href="<?php echo site_url() ?>/tutor/">Tutors</a></li>
            <li><a href="<?php echo site_url() ?>/contact/">Contact</a></li>
            <li><a href="<?php echo site_url() ?>/enrol-now/">Enrol Now</a></li>
        </ul>
	    </div><!-- #one-fourth -->
	    <div class="one-fourth last">
	    <div class="copy">
	        <p>The WEA is a registered charity; Number 1112775</p>
	    <p>&copy; <?php echo stripslashes( get_option( 'org-name' ) ); ?> 2013</p>
	    <?php if ( is_home() ) { ?>
	        <p>Photo courtesy of West Dorset District Council</p>
	    <?php } ?>
	    <p>Site by <a href="http://www.jontyjago.com">Jonathan Evans</a></p>
	</div><!-- copy -->
	    </div><!-- #one-fourth -->
	</div><!-- .wrapper -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>