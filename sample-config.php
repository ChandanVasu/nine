<?php

if (!class_exists('Redux')) {
    return;
}

$opt_name = 'nine_theme';

$args = array(
    'opt_name' => $opt_name,
    'display_name' => 'Theme Settings',
    'display_version' => '1.0',
    'menu_type' => 'menu',
    'allow_sub_menu' => true,
    'menu_title' => 'Theme Settings',
    'page_title' => 'Theme Settings',
    'admin_bar' => true,
    'admin_bar_icon' => 'dashicons-admin-generic',
    'global_variable' => 'redux_global',
    'dev_mode' => false,
    'update_notice' => false,
    'customizer' => false,
    'page_parent' => 'themes.php',
    'page_permissions' => 'manage_options',
    'page_slug' => 'theme_settings',
    'save_defaults' => true,
    'default_show' => true,
    'show_import_export' => true,
    'output' => true,
    'output_tag' => true,
    'footer_credit' => '',
    'use_cdn' => true,
    'compiler' => true,
    'compiler_timestamp' => true,
    'disable_google_fonts_link' => false,
    'customizer_only' => false,
    'disable_save_warn' => false,
    'ajax_save' => true,
    'welcome_panel' => true,
);

Redux::setArgs($opt_name, $args);

// Add a new section for the footer settings


Redux::setSection($opt_name, array(
    'title' => __('Header', 'nine-theme'),
    'id' => 'header_settings',
    'desc' => __('Settings related to the theme Header.', 'nine-theme'),
    'icon' => 'el el-star-alt',
    'fields' => array(
        array(
            'id' => 'header_select',
            'type' => 'select',
            'title' => esc_html__('Header', 'nine-theme'),
            'options' => array(
                'header-one' => esc_html__('Header One', 'nine-theme'),
                'header-two' => esc_html__('Header Two', 'nine-theme'),
                'header-three' => esc_html__('Header Three', 'nine-theme'),
            ),
            'default' => 'header-one', // Default option
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Footer Settings', 'nine-theme'),
    'id' => 'footer_settings',
    'desc' => __('Settings related to the theme footer.', 'nine-theme'),
    'icon' => 'el el-arrow-down',
    'fields' => array(
        array(
            'id' => 'footer_text',
            'type' => 'text',
            'title' => esc_html__('Footer Text', 'nine-theme'),
            'desc' => esc_html__('Custom footer text', 'nine-theme'),
            'default' => esc_html__('All Rights Reserved.', 'nine-theme'),
        ),
       
    ),
));