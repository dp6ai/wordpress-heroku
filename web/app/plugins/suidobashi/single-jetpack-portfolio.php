<?php
/**
 * The Template for displaying all single portfolio posts.
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'portfolio-single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		<?php suidobashi_post_nav(); ?>

		<?php
				$this_post = $post->ID;

				$args = array(
					'post_type' => 'jetpack-portfolio',
					'post__not_in' => array($this_post),
					'posts_per_page' => get_theme_mod( 'further_projects' ),
					'public' => true,

				);


				$project_query = new WP_Query ( $args );

				if ( $project_query -> have_posts() ) :
			?>

			<h3 class="more-projects"><?php _e('More Projects', 'suidobashi') ?></h3>
			<div class="jetpack-portfolio-shortcode cf">

			<?php
				while ( $project_query -> have_posts() ) : $project_query -> the_post();

					get_template_part( 'content', 'portfolio' );

				endwhile;
			?>

			</div><!-- end .jetpack-portfolio-shortcode -->


			<?php
				suidobashi_paging_nav( $project_query->max_num_pages );
				wp_reset_postdata();
			?>
			<?php endif; ?>

	</div><!-- #primary -->

<?php get_footer(); ?>