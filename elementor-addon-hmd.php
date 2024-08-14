<?php
/**
 * Plugin Name: Elementor Addon HMD
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      mr3obhan
 * Author URI:  https://hamrocket.com/
 * Text Domain: elementor-addon-hmd
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.21.0
 * Elementor Pro tested up to: 3.21.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
function register_widgets_hmd( $widgets_manager ): void {

	require_once( __DIR__ . '/widgets/blog/widget-blog.php' );

	$widgets_manager->register( new \HMD_Posts );

}

add_action( 'elementor/widgets/register', 'register_widgets_hmd' );

function add_categories_widgets_hmd( $elements_manager ): void {
	$categories                         = [];
	$categories['hmd-widgets-category'] =
		[
			'title' => 'همراکت',
			'icon'  => 'fa fa-plug'
		];

	$old_categories = $elements_manager->get_categories();
	$categories     = array_merge( $categories, $old_categories );

	$set_categories = function ( $categories ) {
		$this->categories = $categories;
	};

	$set_categories->call( $elements_manager, $categories );
}

add_action( 'elementor/elements/categories_registered', 'add_categories_widgets_hmd' );

function hmd_file_include(): void {
	require_once ('widgets/blog/blog.php');
}

add_action( 'elementor/init', 'hmd_file_include' );


function hmd_widgets_dependencies(): void {

	/* Scripts */
	wp_register_script( 'tailwindCss', plugins_url( 'assets/js/tailwindcss.min.js', __FILE__ ) );


	/* Styles */


}
add_action('wp_enqueue_scripts', 'hmd_widgets_dependencies');