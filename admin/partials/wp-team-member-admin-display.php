<div id="wptm_settings">
    <form method="post" action="" id="wptm_settings_form">
        <div class="form-group">
            <label for="wptm_post_type_name">Post Type Name</label>
            <input type="text" class="form-control" id="wptm_post_type_name" name="wptm_post_type_name" value="<?php echo get_option('wptm_post_type_name'); ?>">
        </div>
        <div class="form-group">
            <label for="wptm_post_type_slug">Post Type Slug</label>
            <input type="text" class="form-control" id="wptm_post_type_slug" name="wptm_post_type_slug" value="<?php echo get_option('wptm_post_type_slug'); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


