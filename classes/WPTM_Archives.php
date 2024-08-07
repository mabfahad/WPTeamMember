<?php

class WPTM_Archives
{
    function __construct()
    {
        add_action('archive_template', array($this, 'team_member_archive_template'));
        add_action( 'pre_get_posts', array($this, 'only_2_jobs_per_page'));
    }

    function team_member_archive_template($archive_template)
    {
        if (is_post_type_archive('team-member')) {
            $archive_template = WPTMP_PLUGIN_DIR . 'public/partials/archive-team-member.php';
        }
        return $archive_template;
    }

    function only_2_jobs_per_page( $query ) {
        if ( $query->is_post_type_archive('team-member') && $query->is_main_query() ) {
            $query->set( 'posts_per_page', 2 );
        }
    }
}
new WPTM_Archives();
