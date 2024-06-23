<?php
/**
 * The single post template file
 *
 * This template is used to display single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nine
 */

get_header();

// Get the template ID and selected header from options
$nine_template_id = nine_get_opt('single_template');
$nine_template = nine_get_opt('single_select', 'single-one');

// Function to get the template part based on the selected header
if (!function_exists('nine_get_selected_single')) {
    function nine_get_selected_single($template) {
        $template_path = 'template/single-post/' . $template;
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
        if ($nine_template_id && function_exists('nine_display_core_content')) {
            $elementor_content = nine_display_core_content($nine_template_id);
            if ($elementor_content) {
                echo apply_filters('nine_header', $elementor_content);
                continue; // Move to the next post
            }
        }
        nine_get_selected_single($nine_template);
    endwhile;
else :
    echo '<p>No content found</p>';
endif;

get_footer();
?>
