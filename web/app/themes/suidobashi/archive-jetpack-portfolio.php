<?php
/**
 * The template for displaying Archive pages for Portfolio items.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">

		<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>

			<div class="jetpack-portfolio-primary cf">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'portfolio' ); ?>

				<?php endwhile; ?>

				<?php suidobashi_paging_nav(); ?>

			</div><!-- .projects -->

		<?php endif; ?>

	</div><!-- end #primary -->

<?php get_footer(); ?>