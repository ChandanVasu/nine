<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
--------------------------------------------------------------------------------
* Add frontend style 
* ------------------------------------------------------------------------------
*/

function enqueue_custom_assets() {
    // Enqueue CSS files
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/main.css');
    wp_enqueue_style('editor-style', get_template_directory_uri() . '/style-editor.css');
    wp_enqueue_style('icon', get_template_directory_uri() . '/Assets/Css/icon.css');

    // Enqueue JavaScript files
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/Assets/Js/main.js');

    // If the script relies on jQuery, add 'jquery' to the array of dependencies
    // wp_enqueue_script('custom-script', get_template_directory_uri() . '/Assets/js/main.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_assets');


/*
--------------------------------------------------------------------------------
* Register Sidebar
* ------------------------------------------------------------------------------
*/


function theme_register_sidebar() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'your-theme-text-domain'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets in this area will be shown on the sidebar.', 'your-theme-text-domain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'theme_register_sidebar');



/*
--------------------------------------------------------------------------------
*  Get the excerpt
* ------------------------------------------------------------------------------
*/


function father_get_the_excerpt($length = 0) {

	$excerpt = get_the_excerpt();
	if ($excerpt) {
		$excerpt = wp_strip_all_tags($excerpt);
		$excerpt = str_replace('[…]', '', $excerpt);
		$excerpt = trim($excerpt);
        if( absint($length) < strlen($excerpt) ) {
	        $excerpt = substr($excerpt, 0, absint($length));
	        $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
	        $excerpt .= '...';
        }
	}

    return $excerpt;
}

/*
--------------------------------------------------------------------------------
*  Call jquary
* ------------------------------------------------------------------------------
*/

function mytheme_enqueue_scripts() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');





/*
--------------------------------------------------------------------------------
* Theme Setup
* ------------------------------------------------------------------------------
*/


if ( ! function_exists( 'nine_theme' ) ) {
    function nine_theme() {
        load_theme_textdomain( 'nine', get_template_directory() . '/languages' );
        if ( ! isset( $GLOBALS['content_width'] ) ) {
            $GLOBALS['content_width'] = 1920;
        }

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'editor-styles' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

        register_nav_menus( array(
            'main_menu'   => 'Main Menu',
            'mobile_menu' => 'Mobile Menu',
        ) );

        add_theme_support( 'amp' );

        add_theme_support( 'post-thumbnails' );
        add_image_size( 'placeholder-img', 30, 30, true );
        set_post_thumbnail_size( 480, 0 );

        // Adds support for editor color palette.
        add_theme_support( 'editor-color-palette', array(
            array(
                'name'  => esc_html__( 'Accent', 'nine' ),
                'slug'  => 'accent',
                'color' => '#ff0000', // Replace with your desired color value
            ),
            array(
                'name'  => esc_html__( 'Dark', 'nine' ),
                'slug'  => 'dark',
                'color' => '#000000', // Replace with your desired color value
            ),
            array(
                'name'  => esc_html__( 'Light', 'nine' ),
                'slug'  => 'light',
                'color' => '#ffffff', // Replace with your desired color value
            ),
        ) );

        // Support only standard post format
        add_theme_support( 'post-formats', array( 'standard' ) );

        // Add support for custom logo
        add_theme_support( 'custom-logo', array(
            'height'      => 100, // Adjust as needed
            'width'       => 400, // Adjust as needed
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ), // Optional, to hide these elements when the logo is displayed
        ) );
    }
}
add_action( 'after_setup_theme', 'nine_theme', 1 );





if( !class_exists('ReduxFramework')){
    require_once(dirname(__FILE__) . '/redux-core/framework.php');
}

if( !isset( $redux_demo ) ){
    require_once( dirname( __FILE__) . '/sample-config.php');
}

