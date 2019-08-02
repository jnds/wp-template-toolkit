<?php

/*********************************
WP_HEAD CLEANUP
**********************************/

function wtt_head_cleanup() {

    // category feeds
    remove_action( 'wp_head', 'feed_links_extra', 3 );

    // post and comment feeds
    remove_action( 'wp_head', 'feed_links', 2 );

    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );

    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link' );

    // start link
    remove_action( 'wp_head', 'start_post_rel_link' );

    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );

    // WP version
    remove_action( 'wp_head', 'wp_generator' );

    // remove WP version from css
    add_filter( 'style_loader_src', 'wtt_remove_wp_ver_css_js', 9999 );

    // remove WP version from scripts
    add_filter( 'script_loader_src', 'wtt_remove_wp_ver_css_js', 9999 );

} /* end plate head cleanup */


// remove WP version from RSS
function wtt_rss_version() {

    return ''; // it's as if it is not even there

}

// remove WP version from scripts
function wtt_remove_wp_ver_css_js( $src ) {

    if ( strpos( $src, 'ver=' ) )

        $src = remove_query_arg( 'ver', $src );

    return $src;
}

// remove injected CSS for recent comments widget
function wtt_remove_wp_widget_recent_comments_style() {

    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {

        remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
}

// remove injected CSS from recent comments widget
function wtt_remove_recent_comments_style() {

    global $wp_widget_factory;

    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {

        remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
    }
}

// remove injected CSS from gallery
function wtt_gallery_style($css) {

    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );

}


/****************************************
* REMOVE WP EXTRAS & DEQUEUEING STUFFS *
****************************************/

/* 
* Remove emojis: because WordPress is serious business.
* But, if you want emojis, don't let me stop you from having a good time. 
* To enable emojis, comment these functions out or just delete them.
*/

add_action( 'init', 'disable_wp_emojicons' );

function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );

}

function disable_emojicons_tinymce( $plugins ) {

    if ( is_array( $plugins ) ) {

        return array_diff( $plugins, array( 'wpemoji' ) );

    } else {

        return array();

    }
}


// Remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
// This only works for the main content box, not using ACF or other page builders.
// Added small bit of javascript in scripts.js that will work everywhere. 
// Keeping this in in case people are still using it.
add_filter('the_content', 'wtt_filter_ptags_on_images');

function wtt_filter_ptags_on_images( $content ) {

    return preg_replace('/<pp>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);

}


// Simple function to remove the [...] from excerpt and add a 'Read More »' link.
function wtt_excerpt_more($more) {
    global $post;
    // edit here if you like
    return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="'. __( 'Read ', 'platetheme' ) . esc_attr( get_the_title( $post->ID ) ).'">'. __( 'Read more &raquo;', 'platetheme' ) .'</a>';
}

