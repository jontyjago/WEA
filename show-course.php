<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

//Get the custom data
$course_code 		= get_post_meta(get_the_id(), 'course_code', true);
$course_fee 		= get_post_meta(get_the_id(), 'course_fee', true);
$course_tutor 		= get_post_meta(get_the_id(), 'course_tutor', true);
$course_tutor_url 	= get_post_meta(get_the_id(), 'course_tutor_url', true);
$course_venue 		= get_post_meta(get_the_id(), 'course_venue', true);
$course_venue_url 	= get_post_meta(get_the_id(), 'course_venue_url', true);
$course_start 		= date('l d/m/Y', get_post_meta(get_the_id(), 'course_start_date', true));
$course_end 		= date('l d/m/Y', get_post_meta(get_the_id(), 'course_end_date', true));
$course_sessions 	= get_post_meta(get_the_id(), 'course_sessions', true);
$session_length		= get_post_meta(get_the_id(), 'session_length', true);
$course_info 		= get_post_meta(get_the_id(), 'course_info', true);
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
			
		<div class='course-meta clearfix'>
			<div class='meta-title'>Course Code</div><div class='meta-entry'><?php echo $course_code; ?></div>
			<?php if (strlen($course_fee) !=0) : ?>
				<div class='meta-title'>Course Fee</div><div class='meta-entry'><?php echo '£' . $course_fee; ?></div>
			<?php endif; ?>
			<div class='meta-title'>Tutor</div><div class='meta-entry'><a href="<?php echo $course_tutor_url; ?>"><?php echo $course_tutor; ?></a></div>
			<div class='meta-title'>Venue</div><div class='meta-entry'><a href="<?php echo $course_venue_url; ?>"><?php echo $course_venue; ?></a></div>
			
			<?php if ($course_end != $course_start) : ?>
		    	<div class='meta-title'>Course Dates</div><div class='meta-entry'><?php echo $course_start . ' - ' . $course_end; ?></div>
			<?php else : ?>
				<div class='meta-title'>Course Date</div><div class='meta-entry'><?php echo $course_start; ?></div>
			<?php endif; ?>

			<div class='meta-title'>Sessions</div><div class='meta-entry'><?php echo $course_sessions; ?></div>
			<div class='meta-title'>Session Length</div><div class='meta-entry'><?php echo $session_length; ?></div>
			
			<?php if (strlen($course_info) !=0) : ?>
				<div class='meta-title'>Notes</div><div class='meta-entry'><?php echo $course_info; ?></div>
			<?php endif; ?>
			
			<div class='meta-title'>Season</div><div class='meta-entry'><?php the_terms( $post->ID, 'course_season', '', ', ', ' ' ); ?></div>
		</div><!-- end course meta -->

		<div class="course-footer">
		    <p>Interested? <a href="<?php echo site_url() ?>/contact/">Contact Us</a> for more details.</p>
		    <p>Not what you were looking for? Go back to <a href="<?php echo site_url() ?>/course/">our Course list</a>, or <a href="https://enrolonline.wea.org.uk/Online/CourseSearch.aspx">search</a> for more courses.</p>
		</div>

		
	</article><!-- #post -->
