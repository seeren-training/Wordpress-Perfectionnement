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

add_action('customize_register', 'add_theme_colors');
function add_theme_colors($wp_customize)
{
    $wp_customize->add_setting(
        'header_bg_color',
        [
            'default' => '#FFFFFF'
        ]
    );
    $wp_customize->add_setting(
        'footer_bg_color',
        [
            'default' => '#FFFFFF'
        ]
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color_control',
            array(
                'label'      => 'Header Color',
                'section'    => 'colors', 
                'settings'   => 'header_bg_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color_control',
            array(
                'label'      => 'Footer Color',
                'section'    => 'colors', 
                'settings'   => 'footer_bg_color'
            )
        )
    );
}
