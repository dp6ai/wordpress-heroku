<?php
/**
 * Template Name: Portfolio Page
 *
 * @package Suidobashi
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">

			<?php
				if ( get_query_var( 'paged' ) ) :
					$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = 1;
				endif;

				$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '20' );

				$args = array(
					'post_type'      => 'jetpack-portfolio',
					'paged'          => $paged,
					'posts_per_page' => $posts_per_page,
				);

				$project_query = new WP_Query ( $args );

				if ( $project_query -> have_posts() ) :
			?>

			<div class="jetpack-portfolio-primary cf">

			<?php
				while ( $project_query -> have_posts() ) : $project_query -> the_post();

					get_template_part( 'content', 'portfolio' );

				endwhile;
			?>

			</div><!-- end .jetpack-portfolio-primary -->

			<?php
				suidobashi_paging_nav( $project_query->max_num_pages );
				wp_reset_postdata();
			?>

			<?php else : ?>

				<section class="no-results not-found">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'No Project Found', 'suidobashi' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<?php if ( current_user_can( 'publish_posts' ) ) : ?>

							<p><?php printf( __( 'Ready to publish your first portfolio project? <a href="%1$s">Get started here</a>.', 'suidobashi' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

						<?php else : ?>

							<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'suidobashi' ); ?></p>

						<?php endif; ?>
					</div><!-- .page-content -->
				</section><!-- .no-results -->

			<?php endif; ?>

	</div><!-- end #primary -->

<?php get_footer(); ?>