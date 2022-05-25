<?php

add_action('init', 'photo_icon_shortcode');

function photo_icon_shortcode()
{
    add_shortcode('photo-icon', 'photo_icon_shortcode_html');
}

function photo_icon_shortcode_html($args)
{

    if ($args && $args[0] === 'alt') {
        return '<span class="dashicons dashicons-camera-alt"></span>';
    }
    return '<span class="dashicons dashicons-camera"></span>';
}
