<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'your_option_name';

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => $theme->get( 'Name' ),
    'display_version'      => $theme->get( 'Version' ),
    'menu_type'            => 'menu', // or submenu
    'allow_sub_menu'       => true,
    'menu_title'           => __( 'Theme Setting', 'redux-framework-demo' ),
    'page_title'           => __( 'Theme Setting', 'redux-framework-demo' ),
    'google_api_key'       => '', // Google API Key
    'google_update_weekly' => false, // Google updates checking
    'async_typography'     => false, // Use a asynchronous font on the front end.
    'admin_bar'            => true, // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio', // Choose an icon for the admin bar menu
    'global_variable'      => '', // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false, // Show the time the page took to load, etc
    'update_notice'        => true, // If dev_mode is enabled, and running an older version of Redux, notify user
    'customizer'           => false, // Enable the customizer (a future-proof way of setting Redux values)
    'page_priority'        => null, // Order where the menu appears in the admin area. If there is any conflict, something will not appear.
    'page_parent'          => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options', // Permissions needed to access the options panel.
    'menu_icon'            => '', // Specify a custom URL to an icon
    'last_tab'             => '', // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '_options', // So you can customize / change as per requirement
    'save_defaults'        => true, // On load save the defaults to DB before user clicks save or not
    'default_show'         => false, // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '', // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true, // Shows the Import/Export panel when not used as a field.
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit'        => '', // Disable the footer credit of Redux. Please leave if you can help it.
    'database'             => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional yet, but extra easy to use.
    'use_cdn'              => true, // Enable when you want to override local CSS: https://www.jsdelivr.com/projects/redux-framework
    'compiler'             => true, // Compiles the CSS theme.
    'compiler_timestamp'   => true, // Show the time the CSS was generated.
    'disable_google_fonts_link' => false, // Disable this if you want to enable google fonts. This is a global variable for all instances.
    'customizer_only'      => false, // Enable this if you want to allow option changes only via the Customizer. Disabled by default.
    'disable_save_warn'    => false, // Disable the save warning when a user changes a field.
    'ajax_save'            => true, // Enable AJAX save for Redux. Can be disabled by using Redux's global variable.
    'ajax_save_always'     => false, // Always save data with AJAX (slower, but no page refreshes). Can be disabled by using Redux's global variable.
    'welcome_panel'        => true, // Disable the welcome panel and sidebar
    'hint_icon'            => 'icon-question-sign',
    'hint_position'        => 'right',
    'show_options_object'  => false,
    'customizer_menu_title' => __('Theme Options', 'redux-framework-demo'),
);

// Redux::setArgs($opt_name, $args);

Redux::setArgs( $opt_name, $args );

// -> Set Sections
Redux::setSection( $opt_name, array(
    'title'  => __( 'General', 'redux-framework-demo' ),
    'id'     => 'general',
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'opt-text',
            'type'     => 'text',
            'title'    => __( 'Text Option', 'redux-framework-demo' ),
            'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
            'desc'     => __( 'Field Description', 'redux-framework-demo' ),
            'default'  => 'Default Text',
        ),
        array(
            'id'       => 'opt-checkbox',
            'type'     => 'checkbox',
            'title'    => __( 'Checkbox Option', 'redux-framework-demo' ),
            'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
            'desc'     => __( 'Field Description', 'redux-framework-demo' ),
            'default'  => '1',
        ),
    )
) );


