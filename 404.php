<?php 
/**
 * The 404 template file
 *
 * This template is used to display the 404 of the website.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nine
 */
get_header(); 

$template_id = nine_get_opt('404_template');

// Function to load the appropriate header template
function load_404_template($template_id) {
    // Check if the template ID exists and the function is available
    if ($template_id && function_exists('display_nine_core_content')) {
        $elementor_content = display_nine_core_content($template_id);
        if ($elementor_content) {
            echo apply_filters('nine-404', $elementor_content);
            return;
        }
    }

    // Fallback to the default header template
    get_template_part('template/home/404'); // Default fallback
}

// Execute the function
load_404_template($template_id);

get_footer();
?>
