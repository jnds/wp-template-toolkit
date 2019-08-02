<?php
/*********************
PAGE NAVI
*********************/

/* 
* Numeric Page Navi (built into the theme by default).
* (Updated 2018-05-17)
* 
* If you're using this with a custom WP_Query, make sure 
* to add your query variable as an argument and this 
* function will play nice. Example:
* 
* wtt_page_navi( $query );
*
* Also make sure your query has pagination set, e.g.:
* $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
* (or something similar)
* See the codex: https://codex.wordpress.org/Pagination
*
*/

function wtt_page_navi( $wp_query ) {
    $pages = $wp_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ( $pages > 1 ) {
        $page_current = max(1, get_query_var('paged'));

        echo '<nav class="pagination">';

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current'       => $page_current,
            'total'         => $pages,
            'prev_text'     => '&larr;',
            'next_text'     => '&rarr;',
            'type'          => 'list',
            'end_size'      => 3,
            'mid_size'      => 3
        ));

        echo '</nav>';
    }
}
