<?php
/**
 * Implement a custom logo for Suidobashi
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

function suidobashi_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '000',
		'width'                  => 200,
		'height'                 => 200,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'suidobashi_header_style',
	);

	add_theme_support( 'custom-header', $args );

}
add_action( 'after_setup_theme', 'suidobashi_custom_header_setup', 11 );


/**
 * Style the header text displayed on the blog.
 *
 * @since Suidobashi 1.0
 *
 * @return void
 */
function suidobashi_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="suidobashi-header-css">
	<?php
		if ( ! empty( $header_image ) and  display_header_text()) :
	?>
		#site-title h1 {

		}
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		#site-title h1,
		#site-title h2.site-description {
			display: none;
		}

	<?php

		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		#site-title h1 a {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
		#site-title h2.site-description {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}