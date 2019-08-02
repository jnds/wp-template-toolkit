<?php

/*********************
THUMBNAIL SIZE OPTIONS
*********************/
/* 

// Thumbnail sizes

add_image_size( 'plate-image-600', 600, 600, true );
add_image_size( 'plate-image-300', 300, 300, true );
add_image_size( 'plate-image-150', 150, 150, true ); 

// The next function  adds the ability to use the dropdown menu in the media manager

add_filter( 'image_size_names_choose', 'wtt_custom_image_sizes' );

function wtt_custom_image_sizes( $sizes ) {

    return array_merge( $sizes, array(

        'plate-image-600' => __('600px by 600px', 'platetheme'),
        'plate-image-300' => __('300px by 300px', 'platetheme'),
        'plate-image-150' => __('150px by 150px', 'platetheme'),

        ) 
    );
}

*/

/*********************
CONTENT WIDTH
Set to 100% for larger embeds : https://codex.wordpress.org/Content_Width
*********************/
 
if ( ! isset( $content_width ) ) {
	$content_width = '100%';
}

