<?php
/*********************
Plate Functions
Moved to separate files to keep things tidy. 
*********************/

/* Admin functions (for customizing the WP Admin) */
require_once( 'wtt_admin.php' );

/* Scripts & Enqueueing */
require_once( 'wtt_enqueue.php' );

/* Image Sizes */
require_once( 'wtt_image_sizes.php' );

/* Plate Launch */
require_once( 'wtt_launch.php' );

/* Page Navi */
// require_once( 'wtt_page_navi.php' );

/* Related Posts */
// require_once( 'wtt_related_posts.php' );

/* Remove WP Extras */
require_once( 'wtt_remove_wp_extras.php' );

/* Plate Special Functions */
require_once( 'wtt_special_functions.php' );

/* Theme Support */
require_once( 'wtt_theme_support.php' );
