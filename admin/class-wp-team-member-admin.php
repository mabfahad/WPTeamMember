<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://abfahad.me
 * @since      1.0.0
 *
 * @package    Wp_Team_Member
 * @subpackage Wp_Team_Member/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Team_Member
 * @subpackage Wp_Team_Member/admin
 * @author     Md Abdullah Al Fahad <mabf.fahad@gmail.com>
 */
class Wp_Team_Member_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Team_Member_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Team_Member_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-team-member-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Team_Member_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Team_Member_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-team-member-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * add a menu under the custom post type team member
     */
    public function WPTM_admin_menu(){
        add_submenu_page('edit.php?post_type=team-member', 'Settings', 'Settings', 'manage_options', 'WPTM-settings', array($this, 'WPTM_settings_page'));
    }

    /**
     * Settings page
     */
    public function WPTM_settings_page()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/wp-team-member-admin-display.php';
    }
}
