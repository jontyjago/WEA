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
	
		<div id="content" role="main" class="leftcol">
        <h2>Our Tutors</h2>

		 <?php 
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
   			'post_type' => 'tutor',
   			'orderby' => 'title',
   			'order' => 'ASC',
   			'posts_per_page' => 15,
   			'paged' => $paged,
 		);
 		$query = new WP_Query($args);

		if ( $query -> have_posts() ) : 
			/* Start the Loop */
			while ( $query -> have_posts() ) : $query -> the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content-tutor', get_post_format() );

			endwhile;

			// next_posts_link() usage with max_num_pages
			next_posts_link( 'Next Page', $query->max_num_pages );
			echo ' | ';
			previous_posts_link( 'Previous Page' );
			wp_reset_postdata();

		else : ?>
			<?php get_template_part( 'tutor', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_template_part('get_rightcol'); ?>
<?php get_footer(); ?>