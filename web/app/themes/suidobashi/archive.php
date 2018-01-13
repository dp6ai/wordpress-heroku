<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

get_header(); ?>

<div id="primary" class="site-content cf" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
			<h1 class="archive-title">
					<?php
						if ( is_category() ) :
							printf( __( 'All posts filed under &lsquo;%s&rsquo;', 'suidobashi' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						elseif ( is_tag() ) :
							printf( __( 'All posts tagged &lsquo;%s&rsquo;', 'suidobashi' ), '<span>' . single_tag_title( '', false ) . '</span>' );

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'suidobashi' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'suidobashi' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'suidobashi' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'suidobashi' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'suidobashi' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'suidobashi' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'All Quotes', 'suidobashi' );

						elseif ( is_post_type_archive( 'jetpack-portfolio' ) ) :
							_e( 'All Projects', 'suidobashi' );

						elseif ( is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) :
							printf( __( 'All projects filed under &lsquo;%s&rsquo;', 'suidobashi' ), '<span>' . single_term_title( '', false ) . '</span>' );

						else :
							_e( 'Archives', 'suidobashi' );

						endif;
					?>
			</h1>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header><!-- end .archive-header -->

		<?php if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) : ?>

			<div class="jetpack-portfolio-primary cf">

				<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'portfolio' ); ?>

				<?php endwhile; ?>

			</div><!-- end .jetpack-portfolio-shortcode -->

		<?php else : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

		<?php endif; ?>

		<?php
		// Previous/next post navigation.
		suidobashi_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'suidobashi' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'suidobashi' ); ?></p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>


</div><!-- end #primary -->

<?php get_footer(); ?>