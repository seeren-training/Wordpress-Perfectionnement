<?php

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
