<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://codepixelzmedia.com.np
 * @since      1.0.0
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/includes
 * @author     Codepixelzmedia <info@codepixelzmedia.com>
 */
class Bikago_Shop_Manager_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bikago-shop-manager',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
