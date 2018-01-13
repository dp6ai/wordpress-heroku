<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

function suidobashi_jetpack_setup() {

	/**
	 * Add theme support for Infinite Scroll.
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'primary',
	) );

	/**
	 * Add theme support for Portfolio Custom Post Type.
	 */
	add_theme_support( 'jetpack-portfolio' );
}
add_action( 'after_setup_theme', 'suidobashi_jetpack_setup' );


/**
 * Define the code that is used to render the posts added by Infinite Scroll.
 *
 * Includes the whole loop. Used to include the correct template part for the Portfolio CPT.
 */
function suidobashi_infinite_scroll_render() {
	while( have_posts() ) {
		the_post();

		if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
			get_template_part( 'content', 'portfolio' );
		} else {
			get_template_part( 'content', get_post_format() );
		}
	}
}


/**
 * Load Jetpack scripts.
 */
function suidobashi_jetpack_scripts() {
{
		wp_enqueue_script( 'suidobashi-portfolio', get_template_directory_uri() . '/js/portfolio.js', array( 'jquery', 'jquery-masonry' ), '20141015', true );
	}
}
add_action( 'wp_enqueue_scripts', 'suidobashi_jetpack_scripts' );

