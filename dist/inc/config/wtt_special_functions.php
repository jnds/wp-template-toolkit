<?php

/*****************************************
PLATE SPECIAL FUNCTIONS       
*****************************************/

// Body Class functions
// Adds more slugs to body class so we can style individual pages + posts.
add_filter( 'body_class', 'wtt_body_class' );

function wtt_body_class( $classes ) {

    // Adds new classes for blogroll page (list of blog posts)
    // good for containing full-width images from Gutenberg
    // Added: 2018-12-07
    global $wp_query;

    if ( isset( $wp_query ) && (bool) $wp_query->is_posts_page ) {
        $classes[] = 'blogroll page-blog';
    }

    global $post;

    if ( isset( $post ) ) {

        /* Un comment below if you want the post_type-post_name body class */
        /* $classes[] = $post->post_type . '-' . $post->post_name; */
        
        $pagetemplate = get_post_meta( $post->ID, '_wp_page_template', true);
        $classes[] = sanitize_html_class( str_replace( '.', '-', $pagetemplate ), '' );
        $classes[] = $post->post_name;

    }

    if (is_page()) {

        global $post;

        if ( $post->post_parent ) {

            // Parent post name/slug
            $parent = get_post( $post->post_parent );
            $classes[] = $parent->post_name;

            // Parent template name
            $parent_template = get_post_meta( $parent->ID, '_wp_page_template', true );
            
            if ( !empty($parent_template) )
                $classes[] = 'template-'.sanitize_html_class( str_replace( '.', '-', $parent_template ), '' );

        }
        
        // If we *do* have an ancestors list, process it
        // http://codex.wordpress.org/Function_Reference/get_post_ancestors
        if ($parents = get_post_ancestors( $post->ID )) {

            foreach ( (array)$parents as $parent ) {

                // As the array contains IDs only, we need to get each page
                if ( $page = get_page($parent) ) {
                    // Add the current ancestor to the body class array
                    $classes[] = "{$page->post_type}-{$page->post_name}";
                }

            }

        }
 
        // Add the current page to our body class array
        $classes[] = "{$post->post_type}-{$post->post_name}";

    }

    if ( is_page_template('single-full.php') ) {
        $classes[] = 'single-full';
    }

    return $classes;

}
  
// Post Author function (from WP Twenty Seventeen theme)
// We use this in the byline template part but included here in case you want to use it elsewhere.
if ( ! function_exists( 'wtt_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wtt_posted_on() {

    // Get the author name; wrap it in a link.
    $byline = sprintf(

    /* translators: %s: post author */
    __( 'by %s', 'platetheme' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'

    );

    // Finally, let's write all of this to the page.
    echo '<span class="posted-on">' . wtt_time_link() . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;


// Post Time function (from WP Twenty Seventeen theme)
if ( ! function_exists( 'wtt_time_link' ) ) :
/**
 * Gets a nicely formatted string for the published date.
 */
function wtt_time_link() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    // if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    //   $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    // }

    $time_string = sprintf( $time_string,
        get_the_date( DATE_W3C ),
        get_the_date(),
        get_the_modified_date( DATE_W3C ),
        get_the_modified_date()
    );

    // Wrap the time string in a link, and preface it with 'Posted on'.
    return sprintf(

        /* translators: %s: post date */
        __( '<span class="screen-reader-text">Posted on</span> %s', 'platetheme' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'

    );
}
endif;
