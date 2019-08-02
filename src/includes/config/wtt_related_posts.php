<?php

/*********************
RELATED POSTS FUNCTION
*********************/

/**
 * Plate Related Posts.
 * 
 * Adapted from this gist:
 * https://gist.github.com/claudiosanches/3167825
 * 
 * Replaced old related posts function from Bones.
 * Added: 2018-05-03
 *
 * Usage:
 * To show related by categories:
 * Add in single.php <?php wtt_related_posts(); ?>.
 * To show related by tags:
 * Add in single.php <?php wtt_related_posts('tag'); ?>.
 *
 * @global array $post
 *   WP global post.
 * @param string $display
 *   Set category or tag.
 * @param int $qty
 *   Number of posts to be displayed.
 * @param bool $images
 *   Enable or disable displaying images.
 * @param string $title
 *   Set the widget title.
 */

function wtt_related_posts( $display = 'category', $qty = 5, $images = true, $title = 'Related Posts' ) {
    global $post;
    $show = false;
    $post_qty = (int) $qty;
    switch ( $display ) :
        case 'tag':
            $tags = wp_get_post_tags( $post->ID) ;
            if ( $tags ) {
                $show = true;
                $tag_ids = array();
                foreach ( $tags as $individual_tag ) {
                    $tag_ids[] = $individual_tag->term_id;
                }
                $args = array(
                    'tag__in' => $tag_ids,
                    'post__not_in' => array( $post->ID ),
                    'posts_per_page' => $post_qty,
                    'ignore_sticky_posts' => 1
                );
            }
            break;
        default :
            $categories = get_the_category( $post->ID );
            if ( $categories ) {
                $show = true;
                $category_ids = array();
                foreach ( $categories as $individual_category ) {
                    $category_ids[] = $individual_category->term_id;
                }
                $args = array(
                    'category__in' => $category_ids,
                    'post__not_in' => array( $post->ID ),
                    'showposts' => $post_qty,
                    'ignore_sticky_posts' => 1
                );
            }
    endswitch;
    if ( $show == true ) {
        $related = new wp_query( $args );
        if ( $related->have_posts() ) {
            $layout = '<div class="related-posts">';
            $layout .= '<h3>' . strip_tags( $title ) . '</h3>';
            $layout .= '<ul class="nostyle related-posts-list">';
            while ( $related->have_posts() ) {
                $related->the_post();
                $layout .= '<li class="related-post">';
                if ( $images == true ) {
                    $layout .= '<span class="related-thumb">';
                    $layout .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_post_thumbnail() . '</a>';
                    $layout .= '</span>';
                }
                $layout .= '<span class="related-title">';
                $layout .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
                $layout .= '</span>';
                $layout .= '</li>';
            }
            $layout .= '</ul>';
            $layout .= '</div>';
            echo $layout;
        }
        wp_reset_query();
    }
}

