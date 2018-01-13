<?php
/**
 * Template for displaying the standard search forms
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="screen-reader-text"><span><?php _e( 'Search', 'suidobashi' ); ?></span></label>
	<input type="text" class="search-field" name="s" autofocus id="s" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'suidobashi' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'suidobashi' ); ?>" />
</form>