<?php
/**
 * The default template for displaying content
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (is_post_type_archive('jetpack-portfolio')) : ?>

	<div class="project-wrap">
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- end .entry-thumbnail -->
		<div class="title-wrap">
			<header class="entry-header cf">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header><!-- end .entry-header -->
		</div><!-- end .title-wrap -->
	</div><!-- end .project-wrap -->

	<?php else : ?>

	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'suidobashi' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- end .entry-header -->

		<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search results. ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Read More', 'suidobashi' ) ); ?>
				<?php
					wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'suidobashi' ),
					'after'  => '</div>',
					) );
				?>
			</div><!-- end .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta cf">
			<a class="entry-date" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
			<?php if ( 'post' == get_post_type() ) : // Hide post meta for pages on Search ?>
			<div class="entry-cats"><span><?php _e( 'Filed under: ', 'suidobashi' ); ?></span>
				<?php the_category(', '); ?>
			</div><!-- end .entry-cats -->
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'suidobashi' ), ' ', '' ); ?>
		</footer><!-- end .entry-meta -->

	<?php endif; ?>

</article><!-- end post -<?php the_ID(); ?> -->