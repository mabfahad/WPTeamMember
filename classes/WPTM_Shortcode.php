<?php

class WPTM_Shortcode
{
    function __construct()
    {
        add_shortcode( 'team_members', array($this, 'team_members_shortcode'));
    }

    //Shortcode must accept 3 parameters, number of team members to show, the position of image in the html template and if display or not
    function team_members_shortcode($atts)
    {
        $atts = shortcode_atts(array(
            'number' => 3,
            'image_position' => 'top', //Allowed only top and bottom
            'display' => 'yes' //Allowed only yes and no
        ), $atts, 'team_members');

        $args = array(
            'post_type' => 'team-member',
            'posts_per_page' => $atts['number']
        );

        $team_members = new WP_Query($args);
        ob_start();
        ?>
<!--            HTML template for team members-->
        <div id="wptm_team_members">
            <div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div>

            <div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div>

            <div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div>

            <div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div><div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div><div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div><div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div><div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div><div class="wptm_team_member">
                <img src="http://localhost/codeexpert/wp-content/uploads/2024/08/IMG_0616.jpeg" alt="">
                <h3>Team Members</h3>
                <h4>Designation</h4>
            </div>

        </div>
        <?php
        return ob_get_clean();
    }
}

new WPTM_Shortcode();
