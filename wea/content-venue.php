<?php
/**
 * The template for displaying tutor content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
    <article>
    <?php
    if (is_single()) { ?>
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
    <?php } else { ?>
        <h1 class="entry-title">
	        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	    </h1>
	<?php } ?>
    <div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
    </article>
