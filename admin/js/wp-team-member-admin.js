(function ($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    $(document).ready(function () {
		const ajax_url = wptm_admin_ajax_object.ajax_url;
        const nonce = wptm_admin_ajax_object.nonce;
        //Ajax call for the team settings
        $('#wptm_settings_form').submit(function (e) {
            e.preventDefault();
            const post_type_name = $('#wptm_post_type_name').val();
			const post_type_slug = $('#wptm_post_type_slug').val();

            //validate form
            const data = {
                post_type_name: post_type_name,
				post_type_slug: post_type_slug,
                nonce: nonce
			};

            var error = validateForm(data);
            if (error.length > 0) {
                alert(error.join('\n'));
                return;
            }

            var ajaxData = {
                action: 'wptm_update_settings',
                data: data,
            };

            $.ajax({
                url: ajax_url,
                method: 'post',
                data: ajaxData,
                success: function (response) {
                    const data = JSON.parse(response);
                    if (data.status === 200) {
                        alert('Settings updated successfully');
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                },
                error: function (e) {
                    alert('Error');
                    // console.log(e);
                }
            });
        });

		function validateForm(data) {
			var error = [];
			if (!data.post_type_name) {
				error.push('Post Type Name is required');
			}
			if (!data.post_type_slug) {
				error.push('Post Type Slug is required');
			}
			return error;
		}
    });

})(jQuery);
