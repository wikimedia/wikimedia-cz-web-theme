<?php
/**
 * WMCZ Theme Customizer
 *
 * @package WMCZ
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wmcz_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wmcz_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wmcz_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_setting( 'support-page', [
		'default' => '',
		'sanitize_callback' => 'absint',
	] );
	$wp_customize->add_control( 'support-page', [
		'label' => 'Support us page',
		'type' => 'dropdown-pages',
		'section' => 'title_tagline',
	] );
	$wp_customize->add_setting( 'support-text', [
		'default' => '',
	] );
	$wp_customize->add_control( 'support-text', [
		'label' => 'Support us page description text',
		'type' => 'text',
		'section' => 'title_tagline'
	] );

	$wp_customize->add_setting( 'address', [
		'default' => '',
	] );
	$wp_customize->add_control( 'address', [
		'label' => 'Address',
		'type' => 'text',
		'section' => 'title_tagline'
	] );

	$wp_customize->add_setting( 'email', [
		'default' => '',
	] );
	$wp_customize->add_control( 'email', [
		'label' => 'Email address',
		'type' => 'text',
		'section' => 'title_tagline'
	] );

	$wp_customize->add_setting( 'phone', [
		'default' => '',
	] );
	$wp_customize->add_control( 'phone', [
		'label' => 'Phone number',
		'type' => 'text',
		'section' => 'title_tagline'
	] );

	$wp_customize->add_setting( 'facebook', [
		'default' => '',
	] );
	$wp_customize->add_control( 'facebook', [
		'label' => 'Facebook profile',
		'type' => 'text',
		'section' => 'title_tagline'
	] );

	$wp_customize->add_setting( 'twitter', [
		'default' => '',
	] );
	$wp_customize->add_control( 'twitter', [
		'label' => 'Twitter profile',
		'type' => 'text',
		'section' => 'title_tagline'
	] );

	$wp_customize->add_setting( 'instagram', [
		'default' => '',
	] );
	$wp_customize->add_control( 'instagram', [
		'label' => 'Instagram profile',
		'type' => 'text',
		'section' => 'title_tagline'
	] );

	$wp_customize->add_setting( 'youtube', [
		'default' => '',
	] );
	$wp_customize->add_control( 'youtube', [
		'label' => 'Youtube profile',
		'type' => 'text',
		'section' => 'title_tagline'
	] );
}
add_action( 'customize_register', 'wmcz_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wmcz_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wmcz_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wmcz_customize_preview_js() {
	wp_enqueue_script( 'wmcz-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wmcz_customize_preview_js' );
