<div class="rightcol">
    <div id="enrol">
    <a class="button emerald" href="<?php echo site_url() ?>/enrol-now/">Enrol Now!</a>
    </div><!-- enrol -->
    
    <?php if (is_home()) { ?>
        <div id="stop-press">
            <!--only show if stop press option set-->
            <?php if (strlen(get_option('stop-press'))!=0) {?>
            <h2>Stop Press!</h2>
            <p><?php echo stripslashes(get_option('stop-press')); ?></p>
            <?php } ?>
        </div><!--end stop press-->
    <?php } ?>
    <div class="side-list clouds">
    <h2>Quick Links</h2>
    <ul>
    <li><a href="<?php echo site_url() ?>/course/">All Courses</a></li>
        <ul class="side-sublist">
            <?php
                // Loop through the taxonomy terms - empty terms by default
                $args = array('orderby'=>'name');
                $terms = get_terms("course_season", $args);
                $count = count($terms);
                    if ( $count > 0 ){
                        foreach ( $terms as $term ) {
                            echo "<li><a href='" . site_url() . "/course_season/" . $term->slug . "'>" . $term->name . "</a></li>";
                }
            } ?>
        </ul>
    <li><a href="<?php echo site_url() ?>/venue/">Venues</a></li>
    <li><a href="<?php echo site_url() ?>/tutor/">Tutors</a></li>
    <li><a href="http://wea.org.uk/">WEA National</a></li>
    <li><a href="http://wea-sw.org.uk/">WEA Southwest</a></li>
    <li><a href="https://enrolonline.wea.org.uk/Online/CourseSearch.aspx">Find a Course</a>  
    <li><a href="<?php echo site_url() ?>/enrol-now/">Enrol Now</a></li>
    <li><a href="<?php echo site_url() ?>/contact/">Contact</a></li>
    </ul>
    </div><!-- end side list -->
</div><!--end right col-->