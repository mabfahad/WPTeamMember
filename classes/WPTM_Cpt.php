<?php

/**
 * Class Car
 *
 * Handles the creation of a custom post type
 */
class WPTM_Cpt
{

    protected $post_type_name;
    protected $plural_name;
    protected $singular_name;

    function __construct($name,$plural_name, $singular_name)
    {
        $this->post_type_name = $name;
        $this->plural_name = $plural_name;
        $this->singular_name = $singular_name;
        add_action('init', array($this, 'create_post_type'));
    }

    function create_post_type(){
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( $this->plural_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'singular_name'       => _x( $this->singular_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'menu_name'           => __( $this->plural_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'all_items'           => __( 'All '.$this->plural_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'view_item'           => __( 'View '.$this->singular_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New '.$this->singular_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New '.$this->singular_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit '.$this->singular_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'update_item'         => __( 'Update '.$this->singular_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'search_items'        => __( 'Search '.$this->singular_name, WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'not_found'           => __( 'Not Found', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', WP_TEAM_MEMBER_TEXT_DOMAIN ),
        );

        $args = array(
            'label' => __($this->singular_name, WP_TEAM_MEMBER_TEXT_DOMAIN),
            'description' => __($this->plural_name, WP_TEAM_MEMBER_TEXT_DOMAIN),
            'labels' => $labels,
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'editor', 'thumbnail'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-groups',

        );

        // Registering the Post Type
        register_post_type($this->post_type_name, $args);

    }
}
new WPTM_Cpt('team-member', 'Team Members', 'Team Member');
