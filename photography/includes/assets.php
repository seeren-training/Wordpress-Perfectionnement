<?php

add_action( 'wp_enqueue_scripts', 'add_child_styles' );
function add_child_styles() {
    wp_enqueue_style( 
        'photography-theme-css', 
        get_stylesheet_directory_uri() . '/assets/css/theme.css' 
    );
    wp_enqueue_script(
        'photography-theme-js', 
        get_stylesheet_directory_uri() . '/assets/js/theme.js' 
    );
}
