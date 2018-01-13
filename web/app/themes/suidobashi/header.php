<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrap">
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
 ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">

	<header id="masthead" class="cf" role="banner">

		<div id="mobile-menu-toggle"><span><?php _e( 'Menu', 'suidobashi' ); ?></span></div>
		<nav id="site-nav" class="cf">
			<div class="menu-container">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu') ); ?>
			</div>
			<div class="search-toggle"><span><?php _e( 'Search', 'suidobashi' ); ?></span></div>
			<div class="search-header">
				<?php get_search_form(); ?>
			</div><!-- end .search-header -->
		</nav><!-- end #site-nav -->

		<div id="site-title">
			<?php if ( get_header_image() ) : ?>
				<div id="site-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""></a>
				</div><!-- end #site-header -->
			<?php endif; ?>
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- end #site-title -->

		<?php if ( get_theme_mod( 'contact_mail' ) || get_theme_mod( 'contact_phone' ) ) : ?>
		<div class="contact-info">
			<?php if ( get_theme_mod( 'contact_mail' ) ) : ?>
				<p class="contact-mail"><?php echo wp_kses_post( get_theme_mod( 'contact_mail' ) ); ?></p>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'contact_phone' ) ) : ?>
				<p class="contact-phone"><?php echo wp_kses_post( get_theme_mod( 'contact_phone' ) ); ?></p>
			<?php endif; ?>
		</div><!-- end .contact-info -->
		<?php endif; ?>

		<?php if ( get_theme_mod( 'header_intro' ) && is_front_page() ) : ?>
		<div class="intro-slogan">
			<?php echo wpautop( get_theme_mod( 'header_intro' ) ); ?>
		</div><!-- end .intro-slogan -->
		<?php endif; ?>

	</header><!-- end #masthead -->
	<div id="spinner"></div>