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

define('HMD_ADDONS_DIR', plugins_url('', __FILE__));
define('HMD_ADDONS_CSS' , HMD_ADDONS_DIR . '/assets/css');
define('HMD_ADDONS_JS' , HMD_ADDONS_DIR . '/assets/public/js');
define('HMD_ADDONS_VERSION', '1.0.0');

function register_widgets_hmd( $widgets_manager ): void {

	require_once( __DIR__ . '/widgets/blog/widget-blog.php' );
	require_once( __DIR__ . '/widgets/services/widget-service.php' );

	$widgets_manager->register( new \HMD_Posts );
	$widgets_manager->register( new \HMD_Service );

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
	require_once ('widgets/services/service.php');
}

add_action( 'elementor/init', 'hmd_file_include' );
function hmd_widgets_dependencies(): void {

	/* Scripts */
	wp_register_script( 'tailwindCss', HMD_ADDONS_JS . '/tailwindcss.min.js' );
	// wp_register_script( 'hmd-swiper', HMD_ADDONS_JS . '/swiper-bundle.min.js', ['jquery'], false, true );
	wp_register_script( 'hmd-config-swiper-services', HMD_ADDONS_JS . '/config-siwper.js' );

	/* Styles */
	// wp_register_style('hmd-swiper', HMD_ADDONS_JS . '/swiper-bundle.min.css', '', '', '');

}
add_action('wp_enqueue_scripts', 'hmd_widgets_dependencies');

function hmd_addons_enqueue_base_styles() {
	wp_enqueue_style( 'widget-editor', HMD_ADDONS_CSS . '/editor.css', [], HMD_ADDONS_VERSION );
}
add_action( 'elementor/editor/before_enqueue_styles', 'hmd_addons_enqueue_base_styles' );


function my_plugin_frontend_scripts_one() {
	wp_register_script( 'hmd-swiper', HMD_ADDONS_JS . '/swiper-bundle.min.js', ['jquery'], false, true );
	wp_register_style('hmd-swiper', HMD_ADDONS_JS . '/swiper-bundle.min.css', '', '', '');

	wp_enqueue_script( 'hmd-swiper' );
	wp_enqueue_style( 'hmd-swiper' );

}
add_action( 'elementor/frontend/before_register_scripts', 'my_plugin_frontend_scripts_one' );
