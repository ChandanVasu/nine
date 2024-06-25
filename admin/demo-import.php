<?php

/**
 * Fetch import files from a JSON URL for One Click Demo Import.
 *
 * @return array Imported data from the JSON file or an empty array on failure.
 */
function ocdi_import_files_from_json_url() {
    $json_url = 'https://vasux.site/demo/data.json';
    
    // Fetch JSON data from URL
    $response = wp_remote_get($json_url);

    // Check if the request was successful
    if (is_wp_error($response)) {
        error_log('Failed to fetch JSON data: ' . $response->get_error_message());
        return [];
    }

    // Get the body of the response
    $json_data = wp_remote_retrieve_body($response);

    // Decode JSON data
    $import_data = json_decode($json_data, true);

    // Check if JSON decoding was successful
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON decode error: ' . json_last_error_msg());
        return [];
    }

    // Return the imported data
    return $import_data;
}

add_filter('ocdi/import_files', 'ocdi_import_files_from_json_url');

/**
 * Perform actions after import for One Click Demo Import.
 *
 * @param array $selected_import Selected import data.
 */
function nine_ocdi_after_import($selected_import) {
    // Assign menus to their locations
    $primary_menu_id = get_term_by('name', 'Main Menu', 'nav_menu')->term_id ?? null;
    set_theme_mod('nav_menu_locations', ['main_menu' => $primary_menu_id]);

    // Assign front page and posts page
    $front_page_id = get_page_by_title('Home')->ID ?? null;
    // $blog_page_id = get_page_by_title('Blog')->ID ?? null;

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id);
    // update_option('page_for_posts', $blog_page_id);
}

add_action('ocdi/after_import', 'nine_ocdi_after_import');

