<?php
/**
 * Theme Functions File.
 *
 * This file handles the enqueueing of stylesheets and scripts for the theme.
 *
 * @package ArdianPradanaTheme
 */

/**
 * Enqueue main stylesheet and JavaScript assets.
 *
 * @return void
 */
function ardianpradana_enqueue_assets() {

	// Enqueue main stylesheet.
	wp_enqueue_style(
		'ardianpradana-main-style',
		get_template_directory_uri() . '/assets/css/main.css', // Correct file path.
		array(),
		filemtime( get_template_directory() . '/assets/css/main.css' ) // Cache bust when file changes.
	);

	// Enqueue main JavaScript file.
	wp_enqueue_script(
		'ardianpradana-main-js',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'jquery' ),
		filemtime( get_template_directory() . '/assets/js/main.js' ), // Cache bust version.
		true // Load in footer.
	);
}
add_action( 'wp_enqueue_scripts', 'ardianpradana_enqueue_assets' );
