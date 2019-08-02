<?php

/**
 * Disabling the Gutenberg editor all post types except post.
 *
 * @param bool   $can_edit  Whether to use the Gutenberg editor.
 * @param string $post_type Name of WordPress post type.
 * @return bool  $can_edit
 */
function wtt_gutenberg_can_edit_post_type( $can_edit, $post_type ) {
	//die();
	$gutenberg_supported_types = array( 'post' );
	if ( ! in_array( $post_type, $gutenberg_supported_types, true ) ) {
		$can_edit = false;
	}
	return $can_edit;
}
add_filter( 'use_block_editor_for_post_type', 'wtt_gutenberg_can_edit_post_type', 10, 2 );