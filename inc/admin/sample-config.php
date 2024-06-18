<?php

if (!class_exists('Redux')) {
    return;
}

$theme = wp_get_theme();

$opt_name = 'nine_theme';

$args = array(
    'opt_name'                  => $opt_name,
    'display_name'              => $theme->get('Name'),
    'display_version'           => $theme->get('Version'),
    'menu_type'                 => 'menu',
    'allow_sub_menu'            => true,
    'menu_title'                => esc_html__('Theme Options', 'nine-theme'),
    'page_title'                => esc_html__('Theme Options', 'nine-theme'),
    'google_api_key'            => '',
    'google_update_weekly'      => false,
    'async_typography'          => false,
    'admin_bar'                 => true,
    'admin_bar_icon'            => 'dashicons-admin-generic',
    'menu_icon'                 => get_theme_file_uri('Assets/Images/opstion.svg'),
    'admin_bar_priority'        => 50,
    'global_variable'           => 'nine_theme',
    'dev_mode'                  => false,
    'update_notice'             => false,
    'customizer'                => true,
    'page_priority'             => 2,
    'page_parent'               => 'themes.php',
    'page_permissions'          => 'manage_options',
    'last_tab'                  => '',
    'page_icon'                 => 'icon-themes',
    'page_slug'                 => 'nine-options',
    'show_options_object'       => false,
    'save_defaults'             => true,
    'default_show'              => false,
    'default_mark'              => '',
    'show_import_export'        => true,
    'transient_time'            => 6400,
    'use_cdn'                   => true,
    'output'                    => true,
    'output_tag'                => true,
    'disable_tracking'          => true,
    'database'                  => '',
    'disable_google_fonts_link' => true,
    'system_info'               => false,
    'search'                    => true,
);

Redux::setArgs($opt_name, $args);

function add_panel_css() {
    wp_register_style(
        'redux-custom-css',
        get_template_directory_uri() . '/Assets/Css/admin.css',
        array('redux-admin-css'),
        filemtime(get_template_directory() . '/Assets/Css/admin.css'),
        'all'
    );  
    wp_enqueue_style('redux-custom-css');
}
add_action('redux/page/' . $opt_name . '/enqueue', 'add_panel_css');

Redux::setSection($opt_name, array(
    'title' => __('Header Setting', 'nine-theme'),
    'id' => 'header_settings',
    'desc' => __('Settings related to the theme Header.', 'nine-theme'),
    'icon' => 'fa fa-bell-o',
    'fields' => array(
        array(
            'id'       => 'header_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Header template', 'nine-theme'),
            'subtitle' => esc_html__('Select the template to show in Header.', 'nine-theme'),
            'desc'     => sprintf(esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine-theme'), '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>', '</strong></a>'),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine-theme'),
        ),
        array(
            'id' => 'header_select',
            'type' => 'select',
            'title' => esc_html__('Header', 'nine-theme'),
            'subtitle' => esc_html__('This All Header Is All Ready Have Theme, If You Want Create New Header Please Select Custom Header', 'nine-theme'),
            'options' => array(
                'header-one' => esc_html__('Header One', 'nine-theme'),
                'header-two' => esc_html__('Header Two', 'nine-theme'),
                'header-three' => esc_html__('Header Three', 'nine-theme'),
            ),
            'default' => 'header-one',
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Single Post', 'nine-theme'),
    'id' => 'single_post',
    'desc' => __('Settings related to the theme Single Post.', 'nine-theme'),
    'icon' => 'fa fa-solid fa-file',
    'fields' => array(
        array(
            'id'       => 'single_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Single Post template', 'nine-theme'),
            'subtitle' => esc_html__('Select the template to show in Single Post.', 'nine-theme'),
            'desc'     => sprintf(esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine-theme'), '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>', '</strong></a>'),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine-theme'),
        ),
        array(
            'id' => 'single_select',
            'type' => 'select',
            'title' => esc_html__('Single Post', 'nine-theme'),
            'subtitle' => esc_html__('This All Header Is All Ready Have Theme, If You Want Create New Header Please Select Custom Header', 'nine-theme'),
            'options' => array(
                'single-template-one' => esc_html__('Single One', 'nine-theme'),
                'single-template-two' => esc_html__('Single Two', 'nine-theme'),
                'single-template-three' => esc_html__('Single Three', 'nine-theme'),
            ),
            'default' => 'single_template-one',
        ),
        // array(
        //     'id' => 'video_post_type',
        //     'type'   => 'section',
        //     'class'  => 'nine-section-start',
        //     'title'  => esc_html__('Video Post', 'nine-theme'),
        //     'indent' => true,
        // ),
        // array(
        //     'id' => 'gallary_post_type',
        //     'type'   => 'section',
        //     'class'  => 'nine-section-start',
        //     'title'  => esc_html__('Gallary Post', 'nine-theme'),
        //     'indent' => true,
        // ),
    ),
));


Redux::setSection($opt_name, array(
    'title' => __('Category', 'nine-theme'),
    'id' => 'category_page',
    'desc' => __('Settings related to the theme Category Page.', 'nine-theme'),
    'icon' => 'fa fa-solid fa-file',
    'fields' => array(
        array(
            'id'       => 'category_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Category Page template', 'nine-theme'),
            'subtitle' => esc_html__('Select the template to show in Category Page.', 'nine-theme'),
            'desc'     => sprintf(
                esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine-theme'),
                '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>',
                '</strong></a>'
            ),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine-theme'),
        ),
        array(
            'id' => 'category_select',
            'type' => 'select',
            'title' => esc_html__('Category Page', 'nine-theme'),
            'subtitle' => esc_html__('This All Header Is All Ready Have Theme, If You Want Create New Header Please Select Custom Header', 'nine-theme'),
            'options' => array(
                'post-one' => esc_html__('Category One', 'nine-theme'),
                'post-two' => esc_html__('Category Two', 'nine-theme'),
                'post-three' => esc_html__('Category Three', 'nine-theme'),
            ),
            'default' => 'category-one',
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
            'id'       => 'footer_template',
            'type'     => 'select',
            'title'    => esc_html__('Top template', 'nine-theme'),
            'subtitle' => esc_html__('Select the template to show in top of the post. Usually for showing advertisement and others...', 'nine-theme'),
            'desc'     => sprintf(esc_html__('You can create the custom template from %1$sblock builder%2$s.', 'nine-theme'), '<a target="_blank" href="' . admin_url('edit.php?post_type=th90_block') . '"><strong>', '</strong></a>'),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine-theme'),
        ),
        array(
            'id' => 'footer_text',
            'type' => 'text',
            'title' => esc_html__('Footer Text', 'nine-theme'),
            'desc' => esc_html__('Custom footer text', 'nine-theme'),
            'default' => esc_html__('All Rights Reserved.', 'nine-theme'),
            'hint' => array(
                'content' => 'This Text Show At Footer If You Are Not create Custon Footer Then you change Footer Text.',
            ),
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Typography', 'nine-theme'),
    'id' => 'Typography_settings',
    'desc' => __('Settings related to the general appearance of the theme.', 'nine-theme'),
    'icon' => 'fa-solid fa-paintbrush',
    'fields' => array(
        array(
            'id' => 'section_start_global_color',
            'type'   => 'section',
            'class'  => 'nine-section-start',
            'title'  => esc_html__('Highlight Elements', 'nine-theme'),
            'indent' => true,
        ),
        array(
            'id' => 'body_bg_color',
            'type' => 'color',
            'title' => esc_html__('Body Background Color', 'nine-theme'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),
        array(
            'id' => 'primary_colors',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'nine-theme'),
            'default' => '#0D1BE5',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),
        array(
            'id' => 'primary_text',
            'type' => 'color',
            'title' => esc_html__('Primary Text Color', 'nine-theme'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),
        array(
            'id' => 'header_background_colors',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Header Background Color', 'nine-theme'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),
        array(
            'id' => 'box_color',
            'type' => 'color',
            'title' => esc_html__('Box Background Color', 'nine-theme'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),
        
    ),
));
