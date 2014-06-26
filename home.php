<?php

get_header(); ?>

<div class="leftcol"><!--left column-->
    <div id="home-text">
        <h2><?php echo stripslashes(get_option('intro-title')); ?></h2>
        <p><img src="<?php echo get_stylesheet_directory_uri() . '/img/wea-home-image.jpg'; ?> ">
        <?php echo stripslashes(get_option('intro-text')); ?></p>	
    </div><!--end home text-->
    <div class="hp-grid">
        <div class="top">
            <div class="left clouds">
                <h2>Courses</h2>
                <p><?php echo stripslashes(get_option('courses-text')); ?></p>
                 <div class="grid-btn">
                    <a class="button carrot" href="/course/">See Course List</a>
                </div>
            </div><!-- top left-->
            <div class="right clouds">
                <h2>Contact</h2>
                <p><?php echo stripslashes(get_option('contact-text')); ?></p>
                <div class="grid-btn">
                    <a class="button carrot" href="/enrol/">Contact Us</a>
                </div>
            </div><!-- top right-->
        </div><!-- top row -->
        <div class="bottom">
            <div class="left clouds">
                <h2>Venues</h2>
                <p><?php echo stripslashes(get_option('venue-text')); ?></p>
                <div class="grid-btn">
                    <a class="button carrot" href="/venue/">See Venues</a>
                </div>
            </div><!-- bottom left-->
            <div class="right clouds">
                <h2>Tutors</h2>
                <p><?php echo stripslashes(get_option('tutor-text')); ?></p>
                <div class="grid-btn">
                    <a class="button carrot" href="/tutor/">See Tutor List</a>
                </div>
            </div><!-- bottom right-->
        </div><!-- bottom row -->
    </div><!-- #courses-->
</div><!--end left col-->

<?php get_template_part('get_rightcol'); ?>
<?php get_footer(); ?>