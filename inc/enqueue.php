<?php

/**
 * Enqueue scripts and styles.
 */
function writer_scripts() {
	wp_enqueue_style( 'writer-style', get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap-min-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7', false );
	wp_enqueue_style( 'style-min-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.1', false );
	wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true );

	
}
add_action( 'wp_enqueue_scripts', 'writer_scripts' );