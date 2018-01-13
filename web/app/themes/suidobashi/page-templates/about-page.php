<?php
/**
 * Template Name: About Page
 *
 * Description: A page template for an About Page
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

get_header(); ?>

<div id="primary" class="site-content" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'about' );

		endwhile;
	?>

</div><!-- end #primary -->

<?php get_footer(); ?>