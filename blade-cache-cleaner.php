<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bants.dev
 * @since             1.0.0
 * @package           Blade_Cache_Cleaner
 *
 * @wordpress-plugin
 * Plugin Name:       Blade Cache Cleaner
 * Plugin URI:        https://bants.dev
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Anthony Barnes
 * Author URI:        https://bants.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       blade-cache-cleaner
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
define( 'BLADE_CACHE_CLEANER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-blade-cache-cleaner-activator.php
 */
function activate_blade_cache_cleaner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blade-cache-cleaner-activator.php';
	Blade_Cache_Cleaner_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-blade-cache-cleaner-deactivator.php
 */
function deactivate_blade_cache_cleaner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blade-cache-cleaner-deactivator.php';
	Blade_Cache_Cleaner_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_blade_cache_cleaner' );
register_deactivation_hook( __FILE__, 'deactivate_blade_cache_cleaner' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-blade-cache-cleaner.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_blade_cache_cleaner() {

	$plugin = new Blade_Cache_Cleaner();
	$plugin->run();

}
run_blade_cache_cleaner();
