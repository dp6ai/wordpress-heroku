<?php
/**
 * Template for displaying the main search forms
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
?>

<div class="search-overlay">
	<div class="search-wrap">
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<input type="text" class="field mainsearch" name="s" id="s" autofocus="autofocus" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'suidobashi' ); ?>" />
			<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'suidobashi' ); ?>" />
		</form>
	<div class="search-close"><?php _e('Close', 'suidobashi') ?></div>
	</div><!-- end .search-wrap -->
</div><!-- end .search-overlay -->