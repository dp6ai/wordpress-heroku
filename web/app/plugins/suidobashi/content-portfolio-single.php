<?php
/**
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- end .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'suidobashi' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'suidobashi' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta cf">
		<?php
			echo get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '<div class="entry-tags">', ', ', '</div>' );
		?>
		<?php
			echo get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '<div class="entry-cats"><span> '. __( 'Filed under: ', 'suidobashi' ) .' </span> ', ', ','</div>' );
		?>
		<?php edit_post_link( __( 'Edit', 'suidobashi' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->

</article><!-- #post-## -->