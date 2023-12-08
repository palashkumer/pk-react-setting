<?php
/**
 * Plugin Name: React Settings Page
 * Description: This is simple react settings page.
 * Version: 1.0.0
 * Author: Palash Kumer
 * Author URI: https://github.com/palashkumer
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin Menu Page Function
 *
 * @return void
 */
function me_add_admin_menu() {

	add_menu_page(
		esc_html__( 'UT', 'react-settings-page' ),
		esc_html__( 'React UI Test', 'react-settings-page' ),
		'manage_options',
		'react-settings-page-options',
		'me_display_menu_options'
	);

	global $screen_id_options;
	$screen_id_options = add_submenu_page(
		'react-settings-page-options',
		esc_html__( 'UT - Options', 'react-settings-page' ),
		esc_html__( 'Options', 'react-settings-page' ),
		'manage_options',
		'react-settings-page-options',
		'me_display_menu_options'
	);
}

add_action( 'admin_menu', 'me_add_admin_menu' );


/**
 * Display Menu Function
 *
 * @return void
 */
function me_display_menu_options() {
	echo '<div class="wrap"><div id="my-react-app"></div></div>';
}


function enqueue_admin_scripts() {

	global $screen_id_options;
	if ( $screen_id_options == $screen_id_options ) {

		$plugin_url = plugin_dir_url( __FILE__ );

		wp_enqueue_script(
			'react-settings-page-menu-options',
			$plugin_url . '/src/build/index.js',
			array( 'wp-element', 'wp-api-fetch' ),
			'1.00',
			true
		);

	}
}

add_action( 'admin_enqueue_scripts', 'enqueue_admin_scripts' );


// Add two plugin options
add_option( 'plugin_option_1', 'default_value_1' );
add_option( 'plugin_option_2', 'default_value_2' );
