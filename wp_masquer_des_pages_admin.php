<?php
/**
 *  rendre invisible des pages dans l'admin
 */
function wpse_hide_special_pages($query) {

    // Make sure we're in the admin and it's the main query
    if ( !is_admin() && !is_main_query() ) {
        return;
    }

   /* // Set the ID of your user so you can see see the pages
    $your_id = 1;

    // If it's you that is logged in then return
    if ($your_id == get_current_user_id()) {
        return;
    }
*/
    global $typenow;

    // Only do this for pages
    if ( 'page' == $typenow) {

        // Don't show the special pages (get the IDs of the pages and replace these)
        $query->set( 'post__not_in', array('2') );
        return;

    }

}
add_action('pre_get_posts', 'wpse_hide_special_pages');
?>