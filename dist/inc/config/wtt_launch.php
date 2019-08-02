<?php

/************************************
 * PLATE LUNCH
 ************************************/

add_action( 'after_setup_theme', 'wtt_launch' );

function wtt_launch() {

    // editor style
    add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

    // language support, if you need it
    load_theme_textdomain( 'platetheme', get_template_directory() . '/library/translation' );

    // cleanup the <head>
    add_action( 'init', 'wtt_head_cleanup' );

    // remove WP version from RSS
    add_filter( 'the_generator', 'wtt_rss_version' );

    // remove injected css for recent comments widget
    add_filter( 'wp_head', 'wtt_remove_wp_widget_recent_comments_style', 1 );

    // clean up comment styles in the head
    add_action( 'wp_head', 'wtt_remove_recent_comments_style', 1 );

    // clean up gallery output in wp
    add_filter( 'gallery_style', 'wtt_gallery_style' );

    // enqueue the styles and scripts
    add_action( 'wp_enqueue_scripts', 'wtt_scripts_and_styles', 999 );

    // theme support options
    wtt_theme_support();

    // adding sidebars to Wordpress
    // add_action( 'widgets_init', 'wtt_register_sidebars' );

    // cleaning up <p> tags around images
    add_filter( 'the_content', 'wtt_filter_ptags_on_images' );

    // clean up the default WP excerpt
    add_filter( 'excerpt_more', 'wtt_excerpt_more' );

    // new body_open() function added in WP 5.2
    // https://generatewp.com/wordpress-5-2-action-that-every-theme-should-use/
    if ( ! function_exists( 'wp_body_open' ) ) {
        /**
         * Fire the wp_body_open action.
         *
         * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
         */
        function wp_body_open() {
            /**
             * Triggered after the opening <body> tag.
             */
            do_action( 'wp_body_open' );
        }
    }


}