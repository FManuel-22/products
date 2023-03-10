<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.femiproducts.com
 * @since             1.0.0
 * @package           Products
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Post Type
 * Plugin URI:        https://www.computantests.com/products
 * Description:       Product Post type will have following custom meta fields:
Title (Default Post Title)
SKU (Custom Text Field)
Rating (Custom Number Field)
Document (File Field) - This will save the file in the WordPress media library {restrict to PDF type only}
Price (Custom Text Field)
Image (Featured Image)
Video (Custom Text Field) {This will be used to fill in a YouTube video URL}
Details (Default Content Field)
Post Type (Products) will have the following custom taxonomies:
Category
Seller
 * Version:           1.0.0
 * Author:            Olufemi Emmanuel
 * Author URI:        https://www.femiproducts.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       products
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PRODUCTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-products-activator.php
 */
function activate_products() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-products-activator.php';
	Products_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-products-deactivator.php
 */
function deactivate_products() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-products-deactivator.php';
	Products_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_products' );
register_deactivation_hook( __FILE__, 'deactivate_products' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-products.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_products() {

	$plugin = new Products();
	$plugin->run();

}
run_products();
