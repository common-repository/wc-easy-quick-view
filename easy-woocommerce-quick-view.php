<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Easy_Woocommerce_Quick_View
 *
 * @wordpress-plugin
 * Plugin Name:       Quick View for WooCommerce
 * Plugin URI:        https://wordpress.org/plugins/wc-easy-quick-view/
 * Description:       Quick View for WooCommerce is a convenient and time-saving feature designed for online stores powered by WooCommerce, a popular e-commerce platform.
 * Version:           1.2.0
 * Author:            Noruzzaman
 * Author URI:        https://github.com/noruzzamans
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-woo-quick-view
 * Domain Path:       /languages
 */

/** If this file is called directly, abort. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EASY_WOO_QUICK_VIEW_VERSION', '1.2.0' );
define( 'EASY_WOO_QUICK_VIEW_PATH', plugin_dir_path( __FILE__ ) );
define( 'EASY_WOO_QUICK_VIEW_URL', plugin_dir_url( __FILE__ ) );
define( 'EASY_WOO_QUICK_VIEW_SLUG', 'easy-woo-quick-view' );
define( 'EASY_WOO_QUICK_VIEW_NAME', 'Quick View for WooCommerce' );
define( 'EASY_WOO_QUICK_VIEW_FULL_NAME', 'Quick View for WooCommerce' );
define( 'EASY_WOO_QUICK_VIEW_BASE_NAME', plugin_basename( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-woocommerce-quick-view-activator.php
 */
function easy_woocommerce_quick_view_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-woocommerce-quick-view-activator.php';
	Easy_Woocommerce_Quick_View_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-woocommerce-quick-view-deactivator.php
 */
function easy_woocommerce_quick_view_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-woocommerce-quick-view-deactivator.php';
	Easy_Woocommerce_Quick_View_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'easy_woocommerce_quick_view_activate' );
register_deactivation_hook( __FILE__, 'easy_woocommerce_quick_view_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-easy-woocommerce-quick-view.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_easy_woocommerce_quick_view() {
	$plugin = Easy_Woocommerce_Quick_View::get_instance();
	$plugin->run();

}
run_easy_woocommerce_quick_view();
