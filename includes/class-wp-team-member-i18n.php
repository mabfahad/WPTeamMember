<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://abfahad.me
 * @since      1.0.0
 *
 * @package    Wp_Team_Member
 * @subpackage Wp_Team_Member/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Team_Member
 * @subpackage Wp_Team_Member/includes
 * @author     Md Abdullah Al Fahad <mabf.fahad@gmail.com>
 */
class Wp_Team_Member_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-team-member',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
