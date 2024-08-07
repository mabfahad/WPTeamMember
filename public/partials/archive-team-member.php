<?php
wp_head();

//Get all the team members with pagination, per page 10 by default
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type' => 'team-member',
    'posts_per_page' => 4,
    'paged' => $paged
);

$team_members = new WP_Query($args);

if($team_members->have_posts()){
    ?>
    <div id="wptm_team_members">
        <?php while($team_members->have_posts()): $team_members->the_post(); ?>
            <div class="wptm_team_member">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                <h4><?php echo get_post_meta(get_the_ID(), 'position', true); ?></h4>
            </div>
        <?php endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <?php
    //Pagination?>
    <div class="wptm_pagination">
        <?php
        echo paginate_links(array(
            'total' => $team_members->max_num_pages,
            'prev_text' => __('Previous', 'wptm'),
            'next_text' => __('Next', 'wptm'),
            'type' => 'list',
            'current' => $paged,
            'mid_size' => '1',
            'page' => '%',

        ));
        ?>
    </div>

<?php
}
else{
    echo '<p class="text-danger">Nothing Found!</p>';
}
wp_footer();
