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
    'menu_title'                => esc_html__('Theme Options', 'nine'),
    'page_title'                => esc_html__('Theme Options', 'nine'),
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
    'title' => __('Header Setting', 'nine'),
    'id' => 'header_settings',
    'desc' => __('Settings related to the theme Header.', 'nine'),
    'icon' => 'fa fa-solid fa-star',
    'fields' => array(
        array(
            'id'       => 'header_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Header template', 'nine'),
            'subtitle' => esc_html__('Select the template to show in Header.', 'nine'),
            'desc'     => sprintf(esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine'), '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>', '</strong></a>'),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Post', 'nine'),
    'id' => 'single_post',
    'desc' => __('Settings related to the theme Single Post.', 'nine'),
    'icon' => 'fa fa-brands fa-readme',
    'fields' => array(
        array(
            'id'       => 'single_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Single Post template', 'nine'),
            'subtitle' => esc_html__('Select the template to show in Single Post.', 'nine'),
            'desc'     => sprintf(esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine'), '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>', '</strong></a>'),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),

        array(
            'id'       => 'single_select',
            'type'     => 'image_select',
            'title' => esc_html__('Single Post', 'nine'),
            'subtitle' => esc_html__('Select Post Template For Single Post', 'nine'),
            'options'  => array(
                'single-one'=> array(
                    'alt'   => 'Reght Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/single-right-sidebar.png'
                ),
                'single-two'=> array(
                    'alt'   => 'Left Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/single-left-sidebar.png'
                ),
                'single-three'=> array(
                    'alt'   => 'No Side Bar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/single-no-sidebar.png'
                ),
                // 'single-four'=> array(
                //     'alt'   => 'Title At Image', 
                //     'img'   => get_template_directory_uri() . '/Assets/images/title-at-image.jpg'
                // ),
                // 'single-five'=> array(
                //     'alt'   => 'Below SIdeBAr', 
                //     'img'   => get_template_directory_uri() . '/Assets/images/below-sidebar.jpg'
                // ),
            ),
            'default' => 'single-one'
        ),

    ),
));


Redux::setSection($opt_name, array(
    'title' => __('Page', 'nine'),
    'id' => 'page_setting',
    'desc' => __('Settings related to the theme Single Post.', 'nine'),
    'icon' => 'fa fa-solid fa-file',
    'fields' => array(
        array(
            'id'       => 'page_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Page Post template', 'nine'),
            'subtitle' => esc_html__('Select the template to show in Page Post.', 'nine'),
            'desc'     => sprintf(esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine'), '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>', '</strong></a>'),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),

        array(
            'id'       => 'page_select',
            'type'     => 'image_select',
            'title' => esc_html__('Page Post', 'nine'),
            'subtitle' => esc_html__('Select Post Template For Page Post', 'nine'),
            'options'  => array(
                'single-one'=> array(
                    'alt'   => 'Reght Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/single-right-sidebar.png'
                ),
                'single-two'=> array(
                    'alt'   => 'Left Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/single-left-sidebar.png'
                ),
                'single-three'=> array(
                    'alt'   => 'No Side Bar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/single-no-sidebar.png'
                ),
                // 'single-four'=> array(
                //     'alt'   => 'Title At Image', 
                //     'img'   => get_template_directory_uri() . '/Assets/images/title-at-image.jpg'
                // ),
                // 'single-five'=> array(
                //     'alt'   => 'Below SIdeBAr', 
                //     'img'   => get_template_directory_uri() . '/Assets/images/below-sidebar.jpg'
                // ),
            ),
            'default' => 'single-one'
        ),

    ),
));





Redux::setSection($opt_name, array(
    'title' => __('Archive Page', 'nine'),
    'id' => 'archive_page',
    'desc' => __('Settings related to the theme Archive Page.', 'nine'),
    'icon' => 'fa fa-solid fa-folder',
    'fields' => array(
        array(
            'id'       => 'archive_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Archive template', 'nine'),
            'subtitle' => esc_html__('Select the template to show in Archive Page.', 'nine'),
            'desc'     => sprintf(
                esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine'),
                '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>',
                '</strong></a>'
            ),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),
        array(
            'id'       => 'archive_select',
            'type'     => 'image_select',
            'title' => esc_html__('Archive Page', 'nine'),
            'subtitle' => esc_html__('Select Post Template For archive Page', 'nine'),
            'options'  => array(
                'post-one'=> array(
                    'alt'   => 'Reght Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/grid-post.png'
                ),
                'post-two'=> array(
                    'alt'   => 'Left Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/sidebar-grid-post.png'
                ),
                'post-three'=> array(
                    'alt'   => 'No Side Bar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/list-post.png'
                ),
                'post-four'=> array(
                    'alt'   => 'Title At Image', 
                    'img'   => get_template_directory_uri() . '/Assets/images/sidebar-list-post.png'
                ),
            ),
            'default' => 'post-one'
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Category Page', 'nine'),
    'id' => 'category_page',
    'desc' => __('Settings related to the theme Category Page.', 'nine'),
    'icon' => 'fa fa-solid fa-hashtag',
    'fields' => array(
        array(
            'id'       => 'category_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Category template', 'nine'),
            'subtitle' => esc_html__('Select the template to show in Category Page.', 'nine'),
            'desc'     => sprintf(
                esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine'),
                '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>',
                '</strong></a>'
            ),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),
        array(
            'id'       => 'category_select',
            'type'     => 'image_select',
            'title' => esc_html__('Category Page', 'nine'),
            'subtitle' => esc_html__('Select Post Template For Category Page', 'nine'),
            'options'  => array(
               'post-one'=> array(
                    'alt'   => 'Reght Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/grid-post.png'
                ),
                'post-two'=> array(
                    'alt'   => 'Left Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/sidebar-grid-post.png'
                ),
                'post-three'=> array(
                    'alt'   => 'No Side Bar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/list-post.png'
                ),
                'post-four'=> array(
                    'alt'   => 'Title At Image', 
                    'img'   => get_template_directory_uri() . '/Assets/images/sidebar-list-post.png'
                ),
            ),
            'default' => 'post-one'
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Author Page', 'nine'),
    'id' => 'author_page',
    'desc' => __('Settings related to the theme Author Page.', 'nine'),
    'icon' => 'fa fa-solid fa-user-tie',
    'fields' => array(
        array(
            'id'       => 'author_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Author template', 'nine'),
            'subtitle' => esc_html__('Select the template to show in Author Page.', 'nine'),
            'desc'     => sprintf(
                esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine'),
                '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>',
                '</strong></a>'
            ),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),
        array(
            'id'       => 'author_select',
            'type'     => 'image_select',
            'title' => esc_html__('Author Page', 'nine'),
            'subtitle' => esc_html__('Select Post Template For Author Page', 'nine'),
            'options'  => array(
                'post-one'=> array(
                    'alt'   => 'Reght Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/grid-post.png'
                ),
                'post-two'=> array(
                    'alt'   => 'Left Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/sidebar-grid-post.png'
                ),
                'post-three'=> array(
                    'alt'   => 'No Side Bar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/list-post.png'
                ),
                'post-four'=> array(
                    'alt'   => 'Title At Image', 
                    'img'   => get_template_directory_uri() . '/Assets/images/sidebar-list-post.png'
                ),
            ),
            'default' => 'post-one'
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Search Page', 'nine'),
    'id' => 'search_page',
    'desc' => __('Settings related to the theme Search Page.', 'nine'),
    'icon' => 'fa fa-solid fa-magnifying-glass',
    'fields' => array(
        array(
            'id'       => 'search_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom Search template', 'nine'),
            'subtitle' => esc_html__('Select the template to show in Search Page.', 'nine'),
            'desc'     => sprintf(
                esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine'),
                '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>',
                '</strong></a>'
            ),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),
        array(
            'id'       => 'search_select',
            'type'     => 'image_select',
            'title' => esc_html__('Search Page', 'nine'),
            'subtitle' => esc_html__('Select Post Template For Search Page', 'nine'),
            'options'  => array(
               'post-one'=> array(
                    'alt'   => 'Reght Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/grid-post.png'
                ),
                'post-two'=> array(
                    'alt'   => 'Left Sidebar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/sidebar-grid-post.png'
                ),
                'post-three'=> array(
                    'alt'   => 'No Side Bar', 
                    'img'   => get_template_directory_uri() . '/Assets/images/list-post.png'
                ),
                'post-four'=> array(
                    'alt'   => 'Title At Image', 
                    'img'   => get_template_directory_uri() . '/Assets/images/sidebar-list-post.png'
                ),
            ),
            'default' => 'post-one'
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Footer Settings', 'nine'),
    'id' => 'footer_settings',
    'desc' => __('Settings related to the theme footer.', 'nine'),
    'icon' => 'el el-arrow-down',
    'fields' => array(
        array(
            'id'       => 'footer_template',
            'type'     => 'select',
            'title'    => esc_html__('Footer template', 'nine'),
            'subtitle' => esc_html__('Select Custom Footer Template', 'nine'),
            'desc'     => sprintf(esc_html__('You can create the custom template from %1$sblock builder%2$s.', 'nine'), '<a target="_blank" href="' . admin_url('edit.php?post_type=th90_block') . '"><strong>', '</strong></a>'),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),
        array(
            'id' => 'footer_text',
            'type' => 'text',
            'title' => esc_html__('Copyright text default', 'nine'),
            'desc' => esc_html__('Custom footer text', 'nine'),
            'default' => esc_html__('Designed by VasuTheme - Newspaper WordPress Theme.', 'nine'),
            'hint' => array(
                'content' => 'This Text Show At Footer If You Are Not create Custon Footer Then you change Footer Text.',
            ),
        ),

    ),
));


Redux::setSection($opt_name, array(
    'title' => __('Error-404', 'nine'),
    'id' => '404_settings',
    'desc' => __('Settings related to the theme 404.', 'nine'),
    'icon' => 'fa fa-solid fa-circle-exclamation',
    'fields' => array(
        array(
            'id'       => '404_template',
            'type'     => 'select',
            'title'    => esc_html__('Custom 404 template', 'nine'),
            'subtitle' => esc_html__('Select the template to show in 404.', 'nine'),
            'desc'     => sprintf(esc_html__('You can create the custom template from %1$sTemplate Builder%2$s.', 'nine'), '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>', '</strong></a>'),
            'options'  => nine_get_posts_id('nine_theme'),
            'placeholder' => esc_html__('Select block', 'nine'),
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Typography', 'nine'),
    'id' => 'Typography_settings',
    'desc' => __('Settings related to the general appearance of the theme.', 'nine'),
    'icon' => 'fa-solid fa-paintbrush',
    'fields' => array(
        array(
            'id' => 'section_start_global_color',
            'type'   => 'section',
            'class'  => 'nine-section-start',
            'title'  => esc_html__('Highlight Elements', 'nine'),
            'indent' => true,
        ),
        array(
            'id' => 'body_bg_color',
            'type' => 'color',
            'title' => esc_html__('Body Background Color', 'nine'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),
        array(
            'id' => 'primary_colors',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'nine'),
            'default' => '#0D1BE5',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),
        array(
            'id' => 'primary_text',
            'type' => 'color',
            'title' => esc_html__('Primary Text Color', 'nine'),
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
            'title' => esc_html__('Header Background Color', 'nine'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),
        array(
            'id' => 'box_color',
            'type' => 'color',
            'title' => esc_html__('Box Background Color', 'nine'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'subtitle' => '',
            'desc'     => '',
            'transparent'     => false,
        ),

            
    ),
));
