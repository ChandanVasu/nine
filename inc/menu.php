<?php

/**
 * Display the main menu.
 */
function nine_menu() {
    $menu_name = 'main_menu'; // Replace with your actual theme location name
    $menu_locations = get_nav_menu_locations();

    // Check if the menu location has a menu assigned to it
    if (isset($menu_locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($menu_locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        if ($menu_items && !empty($menu_items)) {
            // If menu has items, display it
            wp_nav_menu(array(
                'theme_location' => $menu_name,
                'menu_id'        => 'nav-main-menu',
                'container'      => 'div',
                'container_class'=> 'nav-main-container',
                'menu_class'     => 'nav-main-menu',
                'fallback_cb'    => false,
            ));
        } else {
            // If menu is empty, display message or link
            echo '<div class="nav-main-container">';
            echo '<p>' . esc_html__('No menu items found. ', 'nine') . '<a href="' . esc_url(admin_url('nav-menus.php?action=edit&menu=0')) . '">' . esc_html__('Create a menu', 'nine') . '</a>.</p>';
            echo '</div>';
        }
    } else {
        // If no menu is set for the location, display message or link
        echo '<div class="nav-main-container">';
        echo '<p>' . esc_html__('No menu assigned to this location. ', 'nine') . '<a href="' . esc_url(admin_url('nav-menus.php?action=edit&menu=0')) . '">' . esc_html__('Create a menu', 'nine') . '</a>.</p>';
        echo '</div>';
    }
}
