<?php
/**
 * The single post template file
 *
 * This template is used to display single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nine
 */

get_header();

// Get the template ID and selected header from options
$template_id = nine_get_opt('single_template');
$nine_template = nine_get_opt('single_select', 'single-one');

// Function to get the template part based on the selected header
if (!function_exists('get_selected_single')) {
    function get_selected_single($nine_template) {
        $template_path = 'template/single-post/' . sanitize_file_name($nine_template);
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
    ?>
    <div class="nine-single-post">
        <?php
        while (have_posts()) : the_post();
            if ($template_id && function_exists('display_nine_core_content')) {
                $elementor_content = display_nine_core_content($template_id);
                if ($elementor_content) {
                    echo apply_filters('nine_single', $elementor_content); // Assume content is properly escaped in filter
                    continue; // Move to the next post
                }
            }
            get_selected_single($nine_template);
        endwhile;
        ?>
    </div>
    <?php
else :
    ?>
    <p><?php esc_html_e('No content found', 'nine'); ?></p>
    <?php
endif;

get_footer();
?>
