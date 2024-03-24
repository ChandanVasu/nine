<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
--------------------------------------------------------------------------------
* Add frontend style 
* ------------------------------------------------------------------------------
*/

function enqueue_custom_styles() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/main.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


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


function enqueue_custom_icon() {
    wp_enqueue_script('custom-icon', get_template_directory_uri() . '/Assets/icon.svg', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_icon');
