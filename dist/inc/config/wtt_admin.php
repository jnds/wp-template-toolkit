<?php 

/*********************
REMOVE DASHBOARD WIDGETS
*********************/

add_action('wp_dashboard_setup', 'wtt_remove_dashboard_widgets');

function wtt_remove_dashboard_widgets() {

    remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
    remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
    remove_meta_box('dashboard_primary','dashboard','side'); // WordPress.com Blog
    remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
    remove_meta_box('dashboard_incoming_links','dashboard','normal'); // Incoming Links
    remove_meta_box('dashboard_plugins','dashboard','normal'); // Plugins
    remove_meta_box('dashboard_right_now','dashboard', 'normal'); // Right Now
    remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
    remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
    remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
    remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
    remove_action('welcome_panel','wp_welcome_panel'); // WP Welcome

}

/*********************
CUSTOM LOGIN PAGE
*********************/

// calling your own login css so you can style it

// Updated to proper 'enqueue' method
// http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function wtt_login_css() {
	wp_enqueue_style( 'wtt_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function wtt_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function wtt_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'wtt_login_css', 10 );
add_filter( 'login_headerurl', 'wtt_login_url' );
add_filter( 'login_headertitle', 'wtt_login_title' );


/*********************
CUSTOMIZE ADMIN
*********************/

/*
Watch out for WordPress updates if you are editing the admin too much
Here a few functions which you can choose to use if you like.
*/

// Load admin-specific styles. Edit in admin.scss.
function wtt_admin_css() {
    wp_enqueue_style( 'wtt_admin_css', get_template_directory_uri() . '/library/css/admin.css', false );
}
add_action( 'admin_enqueue_scripts', 'wtt_admin_css', 10 );


// Custom Backend Footer
// adding it to the admin area
// add_filter( 'admin_footer_text', 'wtt_custom_admin_footer' );

function wtt_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="https://" target="_blank">[Developer Name]</a></span>', 'platetheme' );
}

?>