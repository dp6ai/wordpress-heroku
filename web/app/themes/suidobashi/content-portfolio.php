<?php
/**
 * The template for displaying Projects on index view
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-entry'); ?>>
	<div class="project-wrap">
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	</div><!-- end .entry-thumbnail -->
		<header class="entry-header cf">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php
			echo get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '<div class="entry-tags">', ', ', '</div>' );
		?>
		<?php
			echo get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '<div class="entry-cats"><span> '. __( 'Filed under: ', 'suidobashi' ) .' </span> ', ', ','</div>' );
		?>
		</header><!-- end .entry-header -->
	</div><!-- end .project-wrap -->
</article><!-- end .project -->