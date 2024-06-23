<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
--------------------------------------------------------------------------------
* Enqueue Frontend Styles and Scripts
* ------------------------------------------------------------------------------
*/

function enqueue_custom_assets() {
    // Enqueue CSS files
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/Assets/Css/main.css');
    wp_enqueue_style('editor-style', get_template_directory_uri() . '/style-editor.css');
    wp_enqueue_style('icon', get_template_directory_uri() . '/Assets/Css/icon.css');
    wp_enqueue_style('video', get_template_directory_uri() . '/Assets/Css/video.css');


    // Enqueue JavaScript files
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/Assets/Js/main.js');
    wp_enqueue_script('video-script', get_template_directory_uri() . '/Assets/Js/video.js');
    wp_localize_script('custom-script', 'reduxOptions', get_option('nine_theme'));

    // If the script relies on jQuery, uncomment the following line
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
        'name'          => __('Main Sidebar', 'nine'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets in this area will be shown on the sidebar.', 'nine'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'theme_register_sidebar');

/*
--------------------------------------------------------------------------------
* Get the Excerpt
* ------------------------------------------------------------------------------
*/

function father_get_the_excerpt($length = 0) {
    $excerpt = get_the_excerpt();
    if ($excerpt) {
        $excerpt = wp_strip_all_tags($excerpt);
        $excerpt = str_replace('[…]', '', $excerpt);
        $excerpt = trim($excerpt);
        if (absint($length) < strlen($excerpt)) {
            $excerpt = substr($excerpt, 0, absint($length));
            $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
            $excerpt .= '...';
        }
    }
    return $excerpt;
}

/*
--------------------------------------------------------------------------------
* Enqueue jQuery
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
        load_theme_textdomain('nine', get_template_directory() . '/languages');
        if ( ! isset($GLOBALS['content_width']) ) {
            $GLOBALS['content_width'] = 1920;
        }

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('responsive-embeds');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('editor-styles');
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

        register_nav_menus(array(
            'main_menu' => 'Main Menu',
            'mobile_menu' => 'Mobile Menu',

        ));

        add_theme_support('amp');
        add_theme_support('post-thumbnails');
        add_image_size('placeholder-img', 30, 30, true);
        set_post_thumbnail_size(480, 0);

        // Adds support for editor color palette
        add_theme_support('editor-color-palette', array(
            array(
                'name'  => esc_html__('Accent', 'nine'),
                'slug'  => 'accent',
                'color' => '#ff0000',
            ),
            array(
                'name'  => esc_html__('Dark', 'nine'),
                'slug'  => 'dark',
                'color' => '#000000',
            ),
            array(
                'name'  => esc_html__('Light', 'nine'),
                'slug'  => 'light',
                'color' => '#ffffff',
            ),
        ));

        // Support only standard post format
        add_theme_support('post-formats', array('standard', 'video', 'gallery'));

        // Add support for custom logo
        add_theme_support('custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array('site-title', 'site-description'),
        ));
    }
}
add_action('after_setup_theme', 'nine_theme', 1);

/*
--------------------------------------------------------------------------------
* Include Additional Files
* ------------------------------------------------------------------------------
*/


require get_template_directory() . '/admin/tgm/required-plugins.php';
require get_template_directory() . '/inc/post-info.php';
require get_template_directory() . '/inc/menu.php';
require get_template_directory() . '/inc/post-thumbnail.php';
require get_template_directory() . '/inc/social-media.php';
require get_template_directory() . '/inc/nine-functions.php';
require get_template_directory() . '/admin/demo-import.php';




if (function_exists('nine_core_activate')) {
    require(dirname(__FILE__) . '/admin/sample-config.php');
    require(dirname(__FILE__) . '/admin/meta-box.php');
}


if ( ! function_exists( 'nine_get_opt' ) ) {
    function nine_get_opt( $key, $default = null ) {
        $nine_theme = get_option("nine_theme");

        if ( isset( $nine_theme[$key] ) && ! empty( $nine_theme[$key] ) ) {
            return $nine_theme[$key];
        }

        return $default;
    }
}

/*
--------------------------------------------------------------------------------
* Enqueue Elementor Styles
* ------------------------------------------------------------------------------
*/

if ( ! function_exists( 'nine_styles_elementor' ) ) {
    function nine_styles_elementor() {
        if ( ! class_exists('Elementor\Plugin') ) {
            return;
        }

        if ( class_exists('\Elementor\Plugin') ) {
            $elementor = \Elementor\Plugin::instance();
            $elementor->frontend->enqueue_styles();
        }

        if ( class_exists('\ElementorPro\Plugin') ) {
            $elementor_pro = \ElementorPro\Plugin::instance();
            $elementor_pro->enqueue_styles();
        }

        $nine_theme = get_option("nine_theme");
        $template_ids = array_unique(array(
            nine_get_opt('header_template'),
            nine_get_opt('single_template'),
            nine_get_opt('archive_template'),
            nine_get_opt('category_template'),
            nine_get_opt('author_template'),
            nine_get_opt('search_template'),
            nine_get_opt('footer_template'),
            ));

        if ( ! empty($template_ids) ) {
            foreach ($template_ids as $template_id) {
                if ($template_id) {
                    if ( class_exists('\Elementor\Core\Files\CSS\Post') ) {
                        $css_file = new \Elementor\Core\Files\CSS\Post($template_id);
                    } elseif ( class_exists('\Elementor\Post_CSS_File') ) {
                        $css_file = new \Elementor\Post_CSS_File($template_id);
                    }
                    $css_file->enqueue();
                }
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'nine_styles_elementor');
