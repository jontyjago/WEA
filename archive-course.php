<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
		
		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$page_limit == stripslashes(get_option('course-limit'));
		
		$args = array(
   			'post_type' => 'course',
   			'meta_key' => 'course_start_date',
   			'orderby' => 'meta_value_num',
   			'order' => 'ASC',
   			'course_status' => 'current',
   			'posts_per_page' => $page_limit,
   			'paged' => $paged,
 		);

 		$query = new WP_Query($args);

		if ( $query -> have_posts() ) : ?>
			<h2>Our Courses</h2>
			<?php 
			/* Start the Loop */
			while ( $query -> have_posts() ) : $query -> the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content-course', get_post_format() );

			endwhile;

			// next_posts_link() usage with max_num_pages
			next_posts_link( 'Next Page', $query->max_num_pages );
			echo ' | ';
			previous_posts_link( 'Previous Page' );
			wp_reset_postdata();

		else : ?>
			<?php get_template_part( 'all-course', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_template_part('get_rightcol'); ?>
<?php get_footer(); ?>