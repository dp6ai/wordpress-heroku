<?php
/**
 * Suidobashi Theme Customizer
 *
 * @package Suidobashi
 * @since Suidobashi 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since Suidobashi 1.0
 */
function suidobashi_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'suidobashi_themeoptions', array(
		'title'		=> __( 'Theme', 'suidobashi' ),
		'priority'	=> 135,
	) );

	// Add the custom settings and controls.
	$wp_customize->add_setting( 'header_textcolor' , array(
    	'default'	=> '#000000',
		'transport'	=> 'refresh',
	) );

	// Custom Colors.
	$wp_customize->add_setting( 'link_color' , array(
    	'default'	=> '#999999',
		'transport'	=> 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'		=> __( 'Link Color', 'suidobashi' ),
		'section'	=> 'colors',
		'settings'	=> 'link_color',
	) ) );

	$wp_customize->add_setting( 'special_link_bg_color' , array(
    	'default'	=> '#d2ffe4',
		'transport'	=> 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'special_link_bg_color', array(
		'label'		=> __( 'Special Link Background Color', 'suidobashi' ),
		'section'	=> 'colors',
		'settings'	=> 'special_link_bg_color',
	) ) );

	$wp_customize->add_setting( 'aboutpage_bg_color' , array(
    	'default'	=> '#cccccc',
		'transport'	=> 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aboutpage_bg_color', array(
		'label'		=> __( 'About Page Background Color', 'suidobashi' ),
		'section'	=> 'colors',
		'settings'	=> 'aboutpage_bg_color',
	) ) );

	$wp_customize->add_setting( 'aboutpage_text_color' , array(
    	'default'	=> '#000000',
		'transport'	=> 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aboutpage_text_color', array(
		'label'		=> __( 'About Page Text Color', 'suidobashi' ),
		'section'	=> 'colors',
		'settings'	=> 'aboutpage_text_color',
	) ) );

	// Theme Options.
	$wp_customize->add_setting( 'title_fixed', array(
		'default'	=> '',
	) );

	$wp_customize->add_control( 'title_fixed', array(
		'label'    	=> __( 'Fixed-positioned title/logo image', 'suidobashi' ),
		'section'	=> 'suidobashi_themeoptions',
		'priority'	=> 1,
		'type'		=> 'checkbox',
	) );

	$wp_customize->add_setting( 'logo_retina', array(
		'default'	=> '',
	) );

	$wp_customize->add_control( 'logo_retina', array(
		'label'    	=> __( 'Retina-optimized logo image', 'suidobashi' ),
		'section'	=> 'suidobashi_themeoptions',
		'priority'	=> 2,
		'type'		=> 'checkbox',
		'description'		=> __( 'Your uploaded logo/Header image needs to be 2x its actual size.', 'suidobashi' ),
	) );

	$wp_customize->add_setting( 'hide_search', array(
		'default'	=> '',
	) );

	$wp_customize->add_control( 'hide_search', array(
		'label'		=> __( 'Hide Header Search', 'suidobashi' ),
		'section'	=> 'suidobashi_themeoptions',
		'priority'	=> 3,
		'type'		=> 'checkbox',
	) );

	$wp_customize->add_setting( 'header_intro', array(
		'default'	=> '',
		'type'		=> 'theme_mod',
		'capability'=> 'edit_theme_options',
		'transport'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'header_intro', array(
    	'type'		=> 'textarea',
		'section'	=> 'suidobashi_themeoptions',
		'priority'	=> 4,
		'label'		=> __( 'Front Page Header Intro Text:', 'suidobashi' ),
		'description'		=> __( 'This text will be visible in the header area of your front page. You can use HTML.', 'suidobashi' ),
	) );

	$wp_customize->add_setting( 'contact_mail', array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'contact_mail', array(
		'label'		=> __( 'Header Email:', 'suidobashi' ),
		'section'	=> 'suidobashi_themeoptions',
		'priority'	=> 5,
		'type'		=> 'text',
	) );

	$wp_customize->add_setting( 'contact_phone', array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'contact_phone', array(
		'label'		=> __( 'Header Phone Number:', 'suidobashi' ),
		'section'	=> 'suidobashi_themeoptions',
		'priority'	=> 6,
		'type'		=> 'text',
	) );

		$wp_customize->add_setting( 'footer_slogan', array(
		'default'	=> '',
		'type'		=> 'theme_mod',
		'capability'=> 'edit_theme_options',
		'transport'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'footer_slogan', array(
    	'type'		=> 'textarea',
		'section'	=> 'suidobashi_themeoptions',
		'priority'	=> 7,
		'label'		=> __( 'Footer Slogan Text:', 'suidobashi' ),
		'description'		=> __( 'Include a slogan or quote text in the footer. You can use HTML.', 'suidobashi' ),
	) );

	$wp_customize->add_setting( 'credit_text', array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'credit_text', array(
		'label'		=> __( 'Custom Footer Credit Text:', 'suidobashi' ),
		'section'	=> 'suidobashi_themeoptions',
		'priority'	=> 8,
		'type'		=> 'text',
	) );

	$wp_customize->add_setting( 'further_projects', array(
		'default'       => '9',
		'sanitize_callback' => 'suidobashi_sanitize_furtherprojects',
	) );

	$wp_customize->add_control( 'further_projects', array(
		'label'         => __( 'Number of further Portfolio projects', 'suidobashi' ),
		'section'       => 'suidobashi_themeoptions',
		'type'          => 'select',
		'choices' 		=> array(
					'3'		=> '3',
               		'6'		=> '6',
			   		'9' 	=> '9',
			   		'12' 	=> '12',
				   	'15' 	=> '15',
		),
		'priority'      => 10,
		'description'		=> __( 'Change the number of further projects at the bottom of single Portfolio projects.', 'suidobashi' ),
	) );

}
add_action( 'customize_register', 'suidobashi_customize_register' );

/**
 * Sanitize Checkboxes.
 */
function suidobashi_sanitize_title_fixed( $title_fixed ) {
	 if ( $title_fixed == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function suidobashi_sanitize_logo_retina( $logo_retina ) {
	 if ( $logo_retina == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function suidobashi_sanitize_hide_search( $hide_search ) {
	 if ( $hide_search == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Sanitize Number Of Further Projects.
 */
function suidobashi_sanitize_furtherprojects( $furtherprojects ) {
	if ( ! in_array( $furtherprojects, array( '3', '6', '9', '12', '15' ) ) ) {
		$furtherprojects = '9';
	}

	return $furtherprojects;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function suidobashi_customize_preview_js() {
	wp_enqueue_script( 'suidobashi-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131221', true );
}
add_action( 'customize_preview_init', 'suidobashi_customize_preview_js' );