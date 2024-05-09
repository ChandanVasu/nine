<?php

if (!class_exists('Redux')) {
    return;
}

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$opt_name = 'nine_theme';

$args = array(
    'opt_name'                  => $opt_name,
	'display_name'              => $theme->get( 'Name' ),
	'display_version'           => $theme->get( 'Version' ),
    'menu_type'                 => 'menu',
    'allow_sub_menu'            => true,
    'menu_title'                => esc_html__( 'Theme Options', 'nine-theme' ),
    'page_title'                => esc_html__( 'Theme Options', 'nine-theme' ),
    'google_api_key'            => '',
    'google_update_weekly'      => false,
    'async_typography'          => false,
    'admin_bar'                 => true,
    'admin_bar_icon'            => 'dashicons-admin-generic',
    'menu_icon'                 => get_theme_file_uri('Assets/Images/opstion.svg'), // Custom SVG icon
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

// Add a new section for the footer settings


Redux::setSection($opt_name, array(
    'title' => __('Header', 'nine-theme'),
    'id' => 'header_settings',
    'desc' => __('Settings related to the theme Header.', 'nine-theme'),
    'icon' => 'el el-star-alt',
    'fields' => array(

        array(
			'id'       => 'header_template',
			'type'     => 'select',
			'title'    => esc_html__('Custom Header template', 'nine-theme'),
			'subtitle' => esc_html__('Select the template to show in Header.', 'nine-theme'),
			'desc'	=> sprintf( esc_html__( 'You can create the custom template from %1$sTemplate Builder%2$s.', 'nine-theme' ), '<a target="_blank" href="' . admin_url('edit.php?post_type=nine_theme') . '"><strong>', '</strong></a>' ),
			'options'  => nine_get_posts_id( 'nine_theme' ),
			'placeholder'  => esc_html__('Select block', 'nine-theme'),
		),

        array(
            'id' => 'header_select',
            'type' => 'select',
            'title' => esc_html__('Header', 'nine-theme'),
            'subtitle' => esc_html__('This All Header Is All Ready Have Theme , If You Want Craete New Header Plese Select Custom Header', 'nine-theme'),
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
			'id'       => 'footer_template',
			'type'     => 'select',
			'title'    => esc_html__('Top template', 'nine-theme'),
			'subtitle' => esc_html__('Select the template to show in top of the post. Usually for showing advertisement and others...', 'nine-theme'),
			'desc'	=> sprintf( esc_html__( 'You can create the custom template from %1$sblock builder%2$s.', 'nine-theme' ), '<a target="_blank" href="' . admin_url('edit.php?post_type=th90_block') . '"><strong>', '</strong></a>' ),
			'options'  => nine_get_posts_id( 'nine_theme' ),
			'placeholder'  => esc_html__('Select block', 'nine-theme'),
		),
        
        array(
            'id' => 'footer_text',
            'type' => 'text',
            'title' => esc_html__('Footer Text', 'nine-theme'),
            'desc' => esc_html__('Custom footer text', 'nine-theme'),
            'default' => esc_html__('All Rights Reserved.', 'nine-theme'),
            'hint'     => array(
                        'content' => 'This Text Show At Footer If You Are Not create Custon Footer Then you change Footer Text.',)
        ),
       
    ),
));



Redux::setSection($opt_name, array(
    'title' => __('Typography Settings', 'nine-theme'),
    'id' => 'Typography_settings',
    'desc' => __('Settings related to the general appearance of the theme.', 'nine-theme'),
    'icon' => 'el el-cogs',
    // 'subsection' => true,

    'fields' => array(
         array(
            'id' => 'body_bg_color',
            'type' => 'color',
            'title' => esc_html__('Body Background Color', 'nine-theme'),
            'default' => '#ffffff', // Default white background
            'validate' => 'color',
        ),
        array(
            'id' => 'primary_text',
            'type' => 'color',
            'title' => esc_html__('Primary Text Color', 'nine-theme'),
            'default' => '#000000', // Default white background
            'validate' => 'color',
        ),
        array(
            'id' => 'link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'nine-theme'),
            'default' => '#340DE5', // Default white background
            'validate' => 'color',
        ),

        array(
            'id' => 'primary_colors',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'nine-theme'),
            'default' => '#E50D0D', // Default white background
            'validate' => 'color',
        ),
        array( 
            
                'id'          => 'opt-typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Typography', 'nine-theme'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('.title a'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'nine-theme'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '700', 
                    'font-family' => 'poppins', 
                    'google'      => true,
                    'font-size'   => '', 
                    'line-height' => ''

            
        ),
    ),

    array(
            'id' => 'custom_css_code',
            'title' => __( 'Custom Css Style' , 'nine-theme' ),
            'type' => 'ace_editor',
            'theme' => 'chrome',
            'mode' => 'css',
    )
    ),
));

