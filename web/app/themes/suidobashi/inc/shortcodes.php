<?php
/**
 * Available Suidobashi Shortcodes
 *
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Suidobashi Shortcodes
/*-----------------------------------------------------------------------------------*/
// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

// Replace WP autop formatting
if (!function_exists( "suidobashi_remove_wpautop")) {
	function suidobashi_remove_wpautop($content) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Multi Columns Shortcodes
/* Don't forget to add "_last" behind the shortcode if it is the last column.
/*-----------------------------------------------------------------------------------*/

// Two Columns
function suidobashi_shortcode_two_columns_one( $atts, $content = null ) {
   return '<div class="two-columns-one">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one', 'suidobashi_shortcode_two_columns_one' );

function suidobashi_shortcode_two_columns_one_last( $atts, $content = null ) {
   return '<div class="two-columns-one last">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one_last', 'suidobashi_shortcode_two_columns_one_last' );

// Three Columns
function suidobashi_shortcode_three_columns_one($atts, $content = null) {
   return '<div class="three-columns-one">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one', 'suidobashi_shortcode_three_columns_one' );

function suidobashi_shortcode_three_columns_one_last($atts, $content = null) {
   return '<div class="three-columns-one last">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one_last', 'suidobashi_shortcode_three_columns_one_last' );

function suidobashi_shortcode_three_columns_two($atts, $content = null) {
   return '<div class="three-columns-two">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two', 'suidobashi_shortcode_three_columns_two' );

function suidobashi_shortcode_three_columns_two_last($atts, $content = null) {
   return '<div class="three-columns-two last">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two_last', 'suidobashi_shortcode_three_columns_two_last' );

// Four Columns
function suidobashi_shortcode_four_columns_one($atts, $content = null) {
   return '<div class="four-columns-one">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one', 'suidobashi_shortcode_four_columns_one' );

function suidobashi_shortcode_four_columns_one_last($atts, $content = null) {
   return '<div class="four-columns-one last">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one_last', 'suidobashi_shortcode_four_columns_one_last' );

function suidobashi_shortcode_four_columns_two($atts, $content = null) {
   return '<div class="four-columns-two">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two', 'suidobashi_shortcode_four_columns_two' );

function suidobashi_shortcode_four_columns_two_last($atts, $content = null) {
   return '<div class="four-columns-two last">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two_last', 'suidobashi_shortcode_four_columns_two_last' );

function suidobashi_shortcode_four_columns_three($atts, $content = null) {
   return '<div class="four-columns-three">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three', 'suidobashi_shortcode_four_columns_three' );

function suidobashi_shortcode_four_columns_three_last($atts, $content = null) {
   return '<div class="four-columns-three last">' . suidobashi_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three_last', 'suidobashi_shortcode_four_columns_three_last' );


// Divide Text Shortcode
function suidobashi_shortcode_divider($atts, $content = null) {
   return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'suidobashi_shortcode_divider' );


/*-----------------------------------------------------------------------------------*/
/* Info Boxes Shortcodes
/*-----------------------------------------------------------------------------------*/

function suidobashi_shortcode_white_box($atts, $content = null) {
   return '<div class="white-box">' . do_shortcode( suidobashi_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'white_box', 'suidobashi_shortcode_white_box' );

function suidobashi_shortcode_yellow_box($atts, $content = null) {
   return '<div class="yellow-box">' . do_shortcode( suidobashi_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'suidobashi_shortcode_yellow_box' );

function suidobashi_shortcode_red_box($atts, $content = null) {
   return '<div class="red-box">' . do_shortcode( suidobashi_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'red_box', 'suidobashi_shortcode_red_box' );

function suidobashi_shortcode_blue_box($atts, $content = null) {
   return '<div class="blue-box">' . do_shortcode( suidobashi_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'suidobashi_shortcode_blue_box' );

function suidobashi_shortcode_green_box($atts, $content = null) {
   return '<div class="green-box">' . do_shortcode( suidobashi_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'green_box', 'suidobashi_shortcode_green_box' );

function suidobashi_shortcode_lightgrey_box($atts, $content = null) {
   return '<div class="lightgrey-box">' . do_shortcode( suidobashi_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'lightgrey_box', 'suidobashi_shortcode_lightgrey_box' );

function suidobashi_shortcode_grey_box($atts, $content = null) {
   return '<div class="grey-box">' . do_shortcode( suidobashi_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'suidobashi_shortcode_grey_box' );

function suidobashi_shortcode_dark_box($atts, $content = null) {
   return '<div class="dark-box">' . do_shortcode( suidobashi_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'suidobashi_shortcode_dark_box' );


/*-----------------------------------------------------------------------------------*/
/* Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/
function suidobashi_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target' => '',
    'color'	=> '',
    'size'	=> '',
	 'form'	=> '',
	 'font'	=> '',
    ), $atts));

	$color = ($color) ? ' '.$color. '-btn' : '';
	$size = ($size) ? ' '.$size. '-btn' : '';
	$form = ($form) ? ' '.$form. '-btn' : '';
	$font = ($font) ? ' '.$font. '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'suidobashi_button');

