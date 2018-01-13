<?php
/**
 * The template for displaying 404 error pages.
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">
		<section id="post-0" class="page no-results not-found cf">

			<header class="entry-header">
			<h1 class="entry-title"><a href="%s" rel="bookmark"><?php _e( '404! Oops, that page can&rsquo;t be found', 'suidobashi' ); ?></a></h1>
			</header><!-- end .entry-header -->

			<div class="entry-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try another search term?', 'suidobashi' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- end .entry-content -->

		</section><!-- end #post-0 -->
	</div><!-- end #primary -->

<?php get_footer(); ?>