<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bants.dev
 * @since      1.0.0
 *
 * @package    Blade_Cache_Cleaner
 * @subpackage Blade_Cache_Cleaner/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Blade_Cache_Cleaner
 * @subpackage Blade_Cache_Cleaner/includes
 * @author     Anthony Barnes <anthonyjbarnes@gmail.com>
 */
class Blade_Cache_Cleaner_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'blade-cache-cleaner',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
