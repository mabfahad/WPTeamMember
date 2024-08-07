<?php

/**
 * Class WPTM_Cpt
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
        add_action('init', array($this, 'create_taxonomy'));

        //Add meta box for the position field in the team member post type and it's required field
        add_action('add_meta_boxes', array($this, 'add_meta_box'));

        //save the position field value
        add_action('save_post', array($this, 'save_position_meta_box'));
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

    function create_taxonomy(){
        $labels = array(
            'name'              => _x( 'Member Types', 'taxonomy general name', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'singular_name'     => _x( 'Member Type', 'taxonomy singular name', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'search_items'      => __( 'Search Member Types', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'all_items'         => __( 'All Member Types', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'parent_item'       => __( 'Parent Member Type', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'parent_item_colon' => __( 'Parent Member Type:', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'edit_item'         => __( 'Edit Member Type', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'update_item'       => __( 'Update Member Type', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'add_new_item'      => __( 'Add New Member Type', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'new_item_name'     => __( 'New Member Type Name', WP_TEAM_MEMBER_TEXT_DOMAIN ),
            'menu_name'         => __( 'Member Type', WP_TEAM_MEMBER_TEXT_DOMAIN ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'member-type' ),
        );

        register_taxonomy( 'member-type', array( $this->post_type_name ), $args );
    }

    //Add meta box for the position field in the team member post type and it's required field
    function add_meta_box(){
        add_meta_box('team_member_position', 'Position', array($this, 'position_meta_box'), $this->post_type_name, 'side', 'high');
    }

    function position_meta_box($post){
        $value = get_post_meta($post->ID, 'position', true);
        ?>
        <label for="position">Position</label>
        <input type="text" name="position" id="position" value="<?php echo $value; ?>" required>
        <?php
    }

    //save the position field value
    function save_position_meta_box($post_id){
        if(array_key_exists('position', $_POST)){
            update_post_meta($post_id, 'position', $_POST['position']);
        }
    }
}
new WPTM_Cpt('team-member', 'Team Members', 'Team Member');
