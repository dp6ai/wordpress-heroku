<?php
/**
 * Suidobashi functions and definitions
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* S Set the content width based on the theme's design and stylesheet.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
		$content_width = 700;

function suidobashi_adjust_content_width() {
		global $content_width;

		if ( is_page_template( 'full-width.php' ) || is_page_template( 'portfolio-page.php' )  )
				$content_width = 1300;

		 if ( is_page_template( 'about-page.php' )  )
				$content_width = 960;
}
add_action( 'template_redirect', 'suidobashi_adjust_content_width' );

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function suidobashi_setup() {

	// Make Suidobashi available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'suidobashi', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary' => __( 'Primary menu', 'suidobashi' ),
	) );

	// Implement the Custom Header feature
	require get_template_directory() . '/inc/custom-header.php';

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'suidobashi_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'quote',
	) );

	// This theme uses post thumbnails.
	add_theme_support( 'post-thumbnails' );

}
add_action( 'after_setup_theme', 'suidobashi_setup' );


/*-----------------------------------------------------------------------------------*/
/*	Register Source Sans Pro Google font for Suidobashi.
/*-----------------------------------------------------------------------------------*/

function suidobashi_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'suidobashi' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Source Sans Pro:400,700,400italic&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/
function suidobashi_scripts() {
	global $wp_styles;

	// Add Source Sans Pro font, used in the main stylesheet.
	wp_enqueue_style( 'suidobashi-fonts', suidobashi_font_url(), array(), null );

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Loads main stylesheet.
	wp_enqueue_style( 'suidobashi-style', get_stylesheet_uri(), array(), '20141030' );

	wp_enqueue_script( 'illustratr-transform', get_template_directory_uri() . '/js/transform.js', array(), '20141030', true );

	wp_enqueue_script( 'suidobashi-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );

	// Loads Custom Suidobashi JavaScript functionality
	wp_enqueue_script( 'suidobashi-script', get_template_directory_uri() . '/js/suidobashi.js', array( 'jquery' ), '201401026', true );


}
add_action( 'wp_enqueue_scripts', 'suidobashi_scripts' );


/*-----------------------------------------------------------------------------------*/
/* Enqueue Google fonts style to admin screen for custom header display.
/*-----------------------------------------------------------------------------------*/
function suidobashi_admin_fonts() {
	wp_enqueue_style( 'suidobashi-fonts', suidobashi_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'suidobashi_admin_fonts' );


/*-----------------------------------------------------------------------------------*/
/* Add Post Type Conditional Tag.
/*-----------------------------------------------------------------------------------*/

function is_post_type($type){
		global $wp_query;
		if($type == get_post_type($wp_query->post->ID)) return true;
		return false;
}

/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/

function suidobashi_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'suidobashi_page_menu_args' );


/*-----------------------------------------------------------------------------------*/
/* Sets the authordata global when viewing an author archive.
/*-----------------------------------------------------------------------------------*/

function suidobashi_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'suidobashi_setup_author' );

/*-----------------------------------------------------------------------------------*/
/* Custom more link.
/*-----------------------------------------------------------------------------------*/
function suidobashi_more_link() {
	 $link = get_permalink('');
	 $new_link = '<a class="more-link" href="' . esc_url($link) . '"><span>' . __( 'Read More', 'suidobashi' ) . '</span></a>';

	 return $new_link;
}
add_filter('the_content_more_link', 'suidobashi_more_link');


/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/

function suidobashi_customize_css() {
		?>
	<style type="text/css">
		a.more-link:hover {border-bottom: none !important;}
		a.more-link:hover span,
		.entry-header h1.entry-title a:hover,
		.entry-header h2.entry-title a:hover,
		.intro-slogan a:hover,
		.footer-slogan a:hover,
		.entry-content a:hover,
		#comments a:hover,
		input[type="button"]:hover,
		input[type="submit"]:hover,
		input#submit:hover,
		#infinite-handle span:hover,
		a.more-link:hover span,
		.author-description a:hover {color: <?php echo get_theme_mod('link_color'); ?>; border-bottom: 1px solid <?php echo get_theme_mod('link_color'); ?>;}
		.entry-tags a:hover,
		.entry-cats a:hover,
		.edit-link:hover,
		a.post-edit-link:hover,
		h3.author-name a:hover,
		.nav-previous a span:hover,
		.nav-next a span:hover {color: <?php echo get_theme_mod('link_color'); ?>;}
		@media screen and (min-width: 1150px) {
			#site-nav li li:hover > a:hover {color: <?php echo get_theme_mod('link_color'); ?>;}
			body.template-about #site-nav li li:hover > a:hover {color: #000;}
		}
		.contact-info a:hover, #colophon #site-info a:hover {background: <?php echo get_theme_mod('special_link_bg_color'); ?>;}
		body.template-about {background: <?php echo get_theme_mod('aboutpage_bg_color'); ?> !important;}
		body.template-about .comment a,
		body.template-about .entry-content a,
		body.template-about #mobile-menu-toggle,
		body.template-about .intro-slogan a,
		body.template-about .footer-slogan a,
		body.template-about .intro-slogan a:hover,
		body.template-about .footer-slogan a:hover,
		body.template-about .entry-content a:hover,
		body.template-about input[type="button"]:hover,
		body.template-about input[type="submit"]:hover,
		body.template-about input#submit:hover {color: <?php echo get_theme_mod('aboutpage_text_color'); ?>; border-bottom: 1px solid <?php echo get_theme_mod('aboutpage_text_color'); ?>;}
		body.template-about .search-header #searchform:after {color: #000;}
		body.template-about a,
		body.template-about .entry-content h4:after,
		body.template-about .search-toggle,
		body.template-about,
		body.template-about input,
		body.template-about #site-title h1 a {color: <?php echo get_theme_mod('aboutpage_text_color'); ?> !important;}
		body.template-about .entry-content a, .divider-border {border-bottom: 1px solid <?php echo get_theme_mod('aboutpage_text_color'); ?>;}
		body.template-about #searchform input.search-field {border-bottom: 1px solid #000;}
		@media screen and (min-width: 1150px) {
			body.template-about #site-nav ul li a {color: <?php echo get_theme_mod('aboutpage_text_color'); ?>;}
			body.template-about #site-nav ul li a:hover,
			body.template-about #site-nav li:hover > a {border-bottom: 1px solid  <?php echo get_theme_mod('aboutpage_text_color'); ?>;}
		}
		<?php if ( '' != get_theme_mod( 'title_fixed' ) ) { ?>
		@media screen and (min-width: 1150px) {#site-title {position: fixed; right: 70px; bottom: 30px; z-index: 100000; text-align: right; padding: 0; }}
		<?php } ?>
		<?php if ( '' != get_theme_mod( 'title_fixed' ) && '' ==  get_theme_mod( 'header_intro' )  ) { ?>
		.contact-info {padding-top: 0 !important;}
		@media screen and (min-width: 1150px) {.home .contact-info {padding-bottom: 115px !important;}}
		<?php } ?>
		<?php if ( '' != get_theme_mod( 'title_fixed' ) && '' ==  get_theme_mod( 'header_intro' ) && '' ==  get_theme_mod( 'contact_mail' ) && '' ==  get_theme_mod( 'contact_phone' ) ) { ?>
		@media screen and (min-width: 1150px) {.template-portfolio .jetpack-portfolio-shortcode {padding-top: 65px !important;}}
		<?php } ?>
		<?php if ( '' != get_theme_mod( 'title_fixed' ) && '' !=  get_theme_mod( 'logo_height' )  && '' !=  get_theme_mod( 'header_intro' ) ) { ?>
		@media screen and (min-width: 1150px) {#masthead {padding-top: <?php echo get_theme_mod('logo_height')?>px !important;}}
		<?php } ?>
		<?php if ( '' != get_theme_mod( 'contact_mail' ) || '' !=  get_theme_mod( 'contact_phone' )) { ?>
		@media screen and (min-width: 1150px) {.menu-container {max-width: 70%;}}
		<?php } ?>
		<?php if ( '' != get_theme_mod( 'hide_search' ) ) { ?>
		.search-header,
		.show-mobile-search .search-header,
		.show-desktop-search .show-mobile-search .search-header,
		.show-desktop-search .search-header,
		.search-toggle {display: none !important;}
		@media screen and (min-width: 1150px) {.menu-container {right: 70px;}}
		<?php } ?>
		<?php if ( '' != get_theme_mod( 'logo_retina' ) ) { ?>
		#site-header {display: inline-block;}
		#site-header a {display: block; width: 50%;}
		#site-header img {display: block;}
		<?php } ?>
		<?php if ( '' != get_theme_mod( 'logo_retina' ) && '' != get_theme_mod( 'title_fixed' ) ) { ?>
		@media screen and (min-width: 1150px) {
			#site-header a {display: block; width: auto;}
			#site-header {text-align: right; float: right;}
			#site-header img {float: right; max-width: 50%;}
		}
		<?php } ?>
	</style>
		<?php
}
add_action( 'wp_head', 'suidobashi_customize_css');


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/

add_filter('use_default_gallery_style', '__return_false');


if ( ! function_exists( 'suidobashi_comment' ) ) :
/*-----------------------------------------------------------------------------------*/
/* Comments template suidobashi_comment
/*-----------------------------------------------------------------------------------*/
function suidobashi_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 80 ); ?>
			</div>

			<p class="comment-details cf">
				<?php printf( __( '%s', 'suidobashi' ), wp_kses_post( sprintf( '%s', get_comment_author_link() ) ) ); ?>

					<span class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						/* translators: 1: date */
							printf( __( '%1$s', 'suidobashi' ),
							get_comment_date());
						?></a>
					</span>
					<?php edit_comment_link(__('Edit', 'suidobashi'), '', ''); ?>

			</p><!-- end .comment-details -->

			<div class="comment-text">
			<?php comment_text(); ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'suidobashi' ); ?></p>
				<?php endif; ?>
			</div><!-- end .comment-text -->
			<?php if ( comments_open () ) : ?>
				<div class="comment-reply cf"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply to this comment', 'suidobashi' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
			<?php endif; ?>

		</article><!-- end .comment -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php _e( '<span>Pingback:</span>', 'suidobashi' ); ?> <?php comment_author_link(); ?></p>
		<p class="pingback-edit"><?php edit_comment_link(); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Blog Navigation.
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'suidobashi_content_nav' ) ) :

function suidobashi_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="nav-wrap cf" role="navigation">
			<nav id="<?php echo $nav_id; ?>">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">Previous</span>', 'suidobashi'  ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">Next</span>', 'suidobashi' ) ); ?></div>
			</nav>
		</div><!-- end .nav-wrap -->
	<?php endif;
}

endif; // suidobashi_content_nav


/*-----------------------------------------------------------------------------------*/
/* Portfolio Navigation.
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'suidobashi_paging_nav' ) ) :

function suidobashi_paging_nav( $max_num_pages = '' ) {
	// Get max_num_pages if not provided
	if ( '' == $max_num_pages )
		$max_num_pages = $GLOBALS['wp_query']->max_num_pages;

	// Don't print empty markup if there's only one page.
	if ( $max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="nav-wrap cf" role="navigation">
		<div class="nav-links">

			<?php if ( get_next_posts_link( '', $max_num_pages ) ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">Previous</span>', 'suidobashi' ), $max_num_pages ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link( '', $max_num_pages ) ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">Next</span>', 'suidobashi' ), $max_num_pages ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


/*-----------------------------------------------------------------------------------*/
/* Single Post Navigation.
/*-----------------------------------------------------------------------------------*/

function suidobashi_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="nav-wrap cf" role="navigation">
		<nav id="nav-single">
			<div class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">Previous</span>', 'suidobashi' ) ); ?></div>
			<div class="nav-next"><?php next_post_link('%link', __( '<span class="meta-nav">Next</span>', 'suidobashi' ) ); ?></div>
		</nav><!-- #nav-single -->
	</div><!-- end .nav-wrap -->
	<?php
}


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function suidobashi_body_class( $classes ) {

	if ( is_page_template( 'page-templates/portfolio-page.php' ) )
		$classes[] = 'template-portfolio';

	if ( is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'template-fullwidth';

	if ( is_page_template( 'page-templates/about-page.php' ) )
		$classes[] = 'template-about';

	return $classes;
}
add_filter( 'body_class', 'suidobashi_body_class' );


/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

/*-----------------------------------------------------------------------------------*/
/* Load Jetpack compatibility file.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/jetpack.php';

/*-----------------------------------------------------------------------------------*/
/* Grab the Suidobashi Custom shortcodes.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/shortcodes.php' );

/*-----------------------------------------------------------------------------------*/
/* Add One Click Demo Import code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/demo-installer.php';
