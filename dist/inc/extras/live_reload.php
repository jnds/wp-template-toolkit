<?php

/************************************
 * Live Reload for during development
 ************************************/

// If your site is running locally it will load the livereload js file into the footer. 
// This makes it possible for the browser to reload after a change has been made. 

if ( in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')) ) {

    function wtt_livereload_script() {

    	wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
    	wp_enqueue_script('livereload');

    }
  
    add_action( 'wp_enqueue_scripts', 'wtt_livereload_script' );

}