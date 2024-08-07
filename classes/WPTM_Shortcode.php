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

        if($team_members->have_posts()){
            ob_start();
            ?>
            <div id="wptm_team_members">
                <?php while($team_members->have_posts()): $team_members->the_post(); ?>
                    <div class="wptm_team_member">
                        <?php if($atts['image_position'] == 'top'): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <h4><?php echo get_post_meta(get_the_ID(), 'position', true); ?></h4>
                        <?php if($atts['image_position'] == 'bottom'): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php
            return ob_get_clean();
        }
        else{
            return '<p class="text-danger">Nothing Found!</p>';
        }
    }
}

new WPTM_Shortcode();
