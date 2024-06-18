<?php 
get_header(); 

$selected_header = nine_get_opt('category_select', 'single-one');
$template_id = nine_get_opt('category_template');

// Function to load the appropriate template part based on the selected header
function get_selected_single($header) {
    $template_path = 'template/archive/' . $header;
    
    // Check if the template part exists, otherwise fallback to 'post-one'
    if (file_exists(get_template_directory() . '/' . $template_path . '.php')) {
        get_template_part($template_path);
    } else {
        get_template_part('template/archive/post-one');
    }
}

// Check for Elementor content and load it if available
if ($template_id && function_exists('display_nine_core_content')) {
    $elementor_content = display_nine_core_content($template_id);
    if ($elementor_content) {
        echo apply_filters('nine-single', $elementor_content);
    } else {
        get_selected_single($selected_header);
    }
} else {
    get_selected_single($selected_header);
}

get_footer();
?>
