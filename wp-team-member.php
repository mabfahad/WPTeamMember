<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://abfahad.me
 * @since             1.0.0
 * @package           Wp_Team_Member
 *
 * @wordpress-plugin
 * Plugin Name:       WP Team Member
 * Plugin URI:        https://abfahad.me
 * Description:       The  Plugin is a versatile tool designed to enhance team collaboration and organization. It allows you to create detailed profiles for each team member, showcasing details. 
 * Version:           1.0.0
 * Author:            Md Abdullah Al Fahad
 * Author URI:        https://abfahad.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-team-member
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
define( 'WP_TEAM_MEMBER_VERSION', '1.0.0' );

/**
 * Define text domain
 */
define( 'WP_TEAM_MEMBER_TEXT_DOMAIN', 'wp-team-member' );

/**
 * Define text domain
 */
define( 'WPTMP_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-team-member-activator.php
 */
function activate_wp_team_member() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-team-member-activator.php';
	Wp_Team_Member_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-team-member-deactivator.php
 */
function deactivate_wp_team_member() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-team-member-deactivator.php';
	Wp_Team_Member_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_team_member' );
register_deactivation_hook( __FILE__, 'deactivate_wp_team_member' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-team-member.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_team_member() {

	$plugin = new Wp_Team_Member();
	$plugin->run();

}
run_wp_team_member();
