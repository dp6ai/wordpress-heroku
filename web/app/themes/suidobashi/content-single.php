<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'suidobashi' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- end .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">',
				'after'  => '</div>',
			) );
		?>
	</div><!-- end .entry-content -->

	<footer class="entry-meta cf">
		<a class="entry-date" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
		<div class="entry-cats"><span><?php _e( 'Filed under: ', 'suidobashi' ); ?></span>
			<?php the_category(', '); ?>
		</div><!-- end .entry-cats -->
		<?php $tags_list = get_the_tag_list();
		if ( $tags_list ): ?>
			<div class="entry-tags"><span><?php _e( 'Tagged: ', 'suidobashi' ); ?></span><?php the_tags('', ', ', ''); ?></span></div>
		<?php endif; // get_the_tag_list() ?>
		<?php edit_post_link( __( 'Edit Post', 'suidobashi' ), ' ', '' ); ?>

		<?php if ( get_the_author_meta( 'description' ) && ! get_post_format() ): // If post author filled out the author bio, show it on standard posts. ?>
			<div class="authorbox cf">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'suidobashi_author_bio_avatar_size', 80 ) ); ?>
				<h3 class="author-name"><span><?php _e('by ', 'suidobashi') ?></span><?php printf( "<a href='" .  esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) . "' rel='author'>" . get_the_author() . "</a>" ); ?></h3>
				<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
			</div><!-- end .author-wrap -->
		<?php endif; ?>
	</footer><!-- end .entry-meta -->

</article><!-- end .post-<?php the_ID(); ?> -->