<?php

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, comment reply and custom scripts
function wtt_scripts_and_styles() {

    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    if ( !is_admin() ) {

        // modernizr (3.6.0 2018-04-17)
        // wp_enqueue_script( 'modernizr', get_theme_file_uri() . '/library/js/libs/modernizr-custom-min.js', array(), '3.6.0', false );

        // register main stylesheet
        wp_enqueue_style( 'plate-stylesheet', get_theme_file_uri() . '/library/css/style.css', array(), '', 'all' );

        // ie-only style sheet
        // wp_enqueue_style( 'plate-ie-only', get_theme_file_uri() . '/library/css/ie.css', array(), '' );

        // comment reply script for threaded comments
        if ( is_singular() AND comments_open() AND ( get_option('thread_comments') == 1 )) { wp_enqueue_script( 'comment-reply' ); }

        // adding scripts file in the footer
        wp_enqueue_script( 'plate-js', get_theme_file_uri() . '/library/js/scripts.js', array(), '', true ); // 'jquery'

        // accessibility (a11y) scripts
        // wp_enqueue_script( 'plate-a11y', get_theme_file_uri() . '/library/js/a11y.js', array( 'jquery' ), '', true );

        // $wp_styles->add_data( 'plate-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

        // plate extra scripts. Uncomment to use. Or better yet, copy what you need to the main scripts folder or on the page(s) you need it
        // wp_enqueue_script( 'plate-extra-js', get_theme_file_uri() . '/library/js/extras/extra-scripts.js', array( 'jquery' ), '', true );

    }
}

/*********************
// Plate Remove wp-embed.min.js from the front end. 
// See here: https://wordpress.stackexchange.com/questions/211701/what-does-wp-embed-min-js-do-in-wordpress-4-4
*********************/

add_action( 'init', function() {
      // Remove the REST API endpoint.
      remove_action('rest_api_init', 'wp_oembed_register_route');
      // Turn off oEmbed auto discovery.
      // Don't filter oEmbed results.
      remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
      // Remove oEmbed discovery links.
      remove_action('wp_head', 'wp_oembed_add_discovery_links');
      // Remove oEmbed-specific JavaScript from the front-end and back-end.
      remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1 );


/*********************
// Plate Dequeue jQuery Migrate 
*********************/

add_action( 'wp_default_scripts', 'wtt_dequeue_jquery_migrate' );
function wtt_dequeue_jquery_migrate( $scripts ) {
    if (! empty( $scripts->registered['jquery'] ) ) {
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
    }
}


/*********************
Stop Loading wp-embed and jquery
*********************/
function crunchify_stop_loading_wp_embed_and_jquery() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
        wp_deregister_script('jquery');  // Bonus: remove jquery too if it's not required
    }
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');


/*********************
Remove comment-reply.min.js from footer
*********************/

add_action('init','wtt_remove_comment_reply');
function wtt_remove_comment_reply(){
    wp_deregister_script( 'comment-reply' );
}


/*********************
GUTENBERG ENQUEUES
These are kept out of the main enqueue function in case you don't need them.
*********************/

// Don't load Gutenberg-related stylesheets.
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
    if (!is_single('post')) {
        wp_dequeue_style( 'wp-block-library' ); // Wordpress core
        wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
    }
}

// Gutenberg Editor Styles: Enqueue block editor style for Gutenberg backend
add_action( 'enqueue_block_editor_assets', 'wtt_block_editor_styles' );
function wtt_block_editor_styles() {
    wp_enqueue_style( 'plate-block-editor-styles', get_theme_file_uri( '/library/css/editor.css' ), false, '1.0', 'all' );
}

// Gutenberg Front End Styles: Enqueue front end styles for Gutenberg. 
// add_action( 'enqueue_block_assets', 'wtt_gutenberg_styles' );
// function wtt_gutenberg_styles() {
//     wp_enqueue_style( 'plate-gutenberg-styles', get_theme_file_uri( '/library/css/gutenberg.css' ), false, '1.0', 'all' );
// }


/*********************
// Move jQuery into footer
*********************/

// add_action( 'wp_default_scripts', 'move_jquery_into_footer' );
// function move_jquery_into_footer( $wp_scripts ) {
//     if( is_admin() ) {
//         return;
//     }
//     $wp_scripts->add_data( 'jquery', 'group', 1 );
//     $wp_scripts->add_data( 'jquery-core', 'group', 1 );
//     $wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
// }


/*********************
// Remove CF7 styles (compile & minify with gulp instead)
*********************/

// add_filter( 'wpcf7_load_css', '__return_false' );