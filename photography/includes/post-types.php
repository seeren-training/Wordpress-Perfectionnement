<?php

add_action('init', 'create_photo_post_type');
function create_photo_post_type()
{
    register_post_type(
        'photo',
        [
            'labels' => [
                'name'          => 'Photos',
                'singular_name' => 'Photo',
            ],
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-camera-alt',
            'public'      => true,
            'has_archive' => true,
            'supports' => [
                'title',
                'editor',
                'author',
                'excerpt',
                'thumbnail',
                'custom-fields',
                'revisions',
            ],
        ]
    );
}