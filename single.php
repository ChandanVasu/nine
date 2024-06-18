<?php
get_header(); 

$selected_style = nine_get_opt('single_select', 'single-one');
$template_id = nine_get_opt('single_template');

// Function to load the appropriate single post template
function load_single_template($style, $template_id) {
    $template_path = 'template/single-post/' . $style;

    // Check if Elementor content exists and is valid
    if ($template_id && function_exists('display_nine_core_content')) {
        $elementor_content = display_nine_core_content($template_id);
        if ($elementor_content) {
            echo apply_filters('nine-header', $elementor_content);
            return;
        }
    }

    // Fallback to the selected style template or default to 'single-one'
    if (file_exists($template_path . '.php')) {
        get_template_part($template_path);
    } else {
        get_template_part('template/single-post/single-one'); // Default fallback
    }
}

// Check if there are posts
if (have_posts()) :
    while (have_posts()) : the_post();
        load_single_template($selected_style, $template_id);
    endwhile;
else :
    echo '<p>No content found</p>';
endif;

get_footer();
?>
