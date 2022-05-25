<?php

add_action('init', 'create_location_taxonomies');

function create_location_taxonomies()
{
    register_taxonomy('location', ['photo'], [
        'hierarchical'      => true,
        'labels'            => [
            'name'              => 'Locations',
            'singular_name'     => 'Location',
            'search_items'      => 'Search Locations',
            'all_items'         => 'All Locations',
            'parent_item'       => 'Parent Location',
            'parent_item_colon' => 'Parent Location',
            'edit_item'         => 'Edit Location',
            'update_item'       => 'Update Location',
            'add_new_item'      => 'Add New Location',
            'new_item_name'     => 'New Location Name',
            'menu_name'         => 'Location',
        ],
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest' => true,
    ]);
}