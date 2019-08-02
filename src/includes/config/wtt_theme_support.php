<?php

/*********************
THEME SUPPORT
*********************/

// support all of the theme things
function wtt_theme_support() {

    // wp thumbnails (see wtt_image_sizes.php)
    add_theme_support( 'post-thumbnails' );

    // default thumb size
    set_post_thumbnail_size(125, 125, true);

    // rss feed links
    add_theme_support( 'automatic-feed-links' );

    // To add another menu, uncomment the second line and change it to whatever you want. You can have even more menus.
    register_nav_menus( array(
        'main-nav' => __( 'The Main Menu', 'platetheme' ),   // main nav in header
        'footer-links' => __( 'Footer Links', 'platetheme' ) // secondary nav in footer. Uncomment to use or edit.
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    // Title tag. Note: this still isn't working with Yoast SEO
    add_theme_support( 'title-tag' );

    // Add theme support for selective refresh for widgets.
    // add_theme_support( 'customize-selective-refresh-widgets' );
    
    // Adds default Gutenberg styles to custom blocks
    // Delete/comment out if you are adding your own block styles
    add_theme_support( 'wp-block-styles' );

    // To limit the Gutenberg editor to your theme colors, uncomment this
    // add_theme_support( 'disable-custom-colors' );

} /* end plate theme support */



