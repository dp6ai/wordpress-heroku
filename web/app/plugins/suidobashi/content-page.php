<?php
/**
 * The template used for displaying page content.
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- end .entry-header -->

	<div class="entry-content cf">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'suidobashi' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta cf">
		<?php edit_post_link( __( 'Edit Page', 'suidobashi' ), '', '' ); ?>
	</footer><!-- end .entry-meta -->

</article><!-- end post-<?php the_ID(); ?> -->