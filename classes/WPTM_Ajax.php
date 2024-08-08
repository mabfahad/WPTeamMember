<?php

class WPTM_Ajax
{
    function __construct()
    {
        add_action('wp_ajax_wptm_update_settings', array($this, 'wptm_update_settings'));
    }

    function wptm_update_settings()
    {
//        echo "<pre>";print_r($_POST);exit();
//        echo $_POST['data']['post_type_name'];exit();

        if (!isset($_POST['data']['post_type_name'])){
            echo json_encode(array('message' => 'Post type name is required','status'=>400));
            wp_die();
        }

        if (!isset($_POST['data']['post_type_slug'])){
            echo json_encode(array('message' => 'Post type slug is required','status'=>400));
            wp_die();
        }

        $post_type_name = sanitize_text_field($_POST['data']['post_type_name']);
        $post_type_slug = sanitize_text_field($_POST['data']['post_type_slug']);

        update_option('wptm_post_type_name', $post_type_name);
        update_option('wptm_post_type_slug', $post_type_slug);

        echo json_encode(array('message' => 'Settings updated successfully','status'=>200));
        wp_die();
    }
}
new WPTM_Ajax();
