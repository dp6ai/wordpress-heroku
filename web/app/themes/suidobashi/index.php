<?php
/**
 * The main template file.
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'content', get_post_format() );

				endwhile;
		?>

		<?php
		// Previous/next post navigation.
		suidobashi_content_nav( 'nav-below' ); ?>

	</div><!-- end #primary -->

<?php get_footer(); ?>