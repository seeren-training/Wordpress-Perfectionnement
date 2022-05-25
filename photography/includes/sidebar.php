<?php

register_sidebar(
    array(
        'name'          => 'Header Sidebar',
        'id'            => 'sidebar-header',
        'description'   => 'Add widgets here to appear in your header.',
        'before_widget' => '<span id="%1$s" class="widget %2$s">',
        'after_widget'  => '</span>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    )
);
