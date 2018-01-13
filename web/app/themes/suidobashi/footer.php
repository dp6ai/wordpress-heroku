<?php
/**
 * The template for displaying the footer.
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */
?>

<footer id="colophon" class="site-footer cf">

	<?php if ( get_theme_mod( 'footer_slogan' ) ) : ?>
		<div class="footer-slogan">
			<?php echo wpautop( get_theme_mod( 'footer_slogan' ) ); ?>
		</div><!-- end .footer-slogan -->
	<?php endif; ?>

	<div id="site-info">
		<ul class="credit" role="contentinfo">
		<?php if ( get_theme_mod( 'credit_text' ) ) : ?>
			<li><?php echo wp_kses_post( get_theme_mod( 'credit_text' ) ); ?></li>
		<?php else : ?>
			<li class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?>.</a></li>
			<li class="theme-credit"><?php printf( __( 'Suidobashi Theme by %2$s.', 'suidobashi' ), 'Suidobashi', '<a href="https://www.elmastudio.de/en/" rel="designer">Elmastudio</a>' ); ?></li>
			<li class="wp-credit"><?php _e('Powered by', 'suidobashi') ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'suidobashi' ) ); ?>" ><?php _e('WordPress.', 'suidobashi') ?></a></li>
			<?php endif; ?>
		</ul>
	</div><!-- end #site-info -->

</footer><!-- end #colophon -->

</div><!-- end #container -->

<?php wp_footer(); ?>

</body>
</html>
