<?php


/*********************
Change Media Postion
*********************/

function wtt_custom_menu_order() {
    return array( 'index.php', 'upload.php' );
}

add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'wtt_custom_menu_order' );

/*********************
Remove Theme Customise Menu Item
*********************/

// https://wordpress.stackexchange.com/questions/319306/hide-theme-options-and-customize-admin-menu

add_action( 'admin_menu', function() {
    global $current_user;
    $current_user = wp_get_current_user();
    $user_name = $current_user->user_login;

        //check condition for the user means show menu for this user
        if(is_admin() &&  $user_name != 'USERNAME') {
            //We need this because the submenu's link (key from the array too) will always be generated with the current SERVER_URI in mind.
            $customizer_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
            remove_submenu_page( 'themes.php', $customizer_url );
   }
}, 999 );