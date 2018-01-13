<?php
/**
 * Demo Installer content, One Click Demo Import plugin required
 * See: https://wordpress.org/plugins/one-click-demo-import/
 *
 * @package Suidobashi
 * @since Suidobashi 1.0.5
 */

function ocdi_import_files() {
	return array(

		array(
			'import_file_name'             => 'Demo Suidobashi',
			'categories'                   => array( 'Portfolio' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demo/suidobashi-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demo/suidobashi-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demo/suidobashi-customizer.dat',
			'import_notice'             	 => esc_html__( 'Make sure you have the Jetpack plugin for your portfolio installed, before importing this demo!', 'suidobashi' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
