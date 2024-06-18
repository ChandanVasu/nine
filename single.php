<?php
get_header();

// Get the template ID and selected header from options
$template_id = nine_get_opt('single_template');
$nine_template = nine_get_opt('single_select', 'single-one');

// Function to get the template part based on the selected header
if (!function_exists('get_selected_single')) {
    function get_selected_single($nine_template) {
        $template_path = 'template/single-post/' . $nine_template;
        if (locate_template($template_path . '.php')) {
            get_template_part($template_path);
        } else {
            // Default fallback template
            get_template_part('template/single-post/single-one');
        }
    }
}

// Check if there are posts
if (have_posts()) :
    while (have_posts()) : the_post();
        if ($template_id && function_exists('display_nine_core_content')) {
            $elementor_content = display_nine_core_content($template_id);
            if ($elementor_content) {
                echo apply_filters('nine-header', $elementor_content);
                continue; // Move to the next post
            }
        }
        get_selected_single($nine_template);
    endwhile;
else :
    echo '<p>No content found</p>';
endif;

get_footer();
?>
