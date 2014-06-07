<?php
/**
 * The template for displaying course content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
    <article>
    
    <div class='course-meta clearfix'>
        <h1>
            <div class='meta-title'>Course Name</div><div class='meta-entry'><span class='course-name'><?php the_title(); ?></span></div> 
        </h1>
        <?php 
	       $course_start = date('l d/m/Y', get_post_meta(get_the_id(), 'course_start_date', true));
            $course_info = get_post_meta(get_the_id(), 'course_info', true); ?>
	       <div class='meta-title'>Course Starts</div><div class='meta-entry'><?php echo $course_start; ?></div>
            <div class='meta-title'>Course Notes</div><div class='meta-entry'><?php echo $course_info; ?></div>
    </div><!-- end course meta -->
    <div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<p><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Full Details for %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">Full Details</a></p>
    </article>
