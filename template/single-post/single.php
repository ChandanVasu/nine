<?php

$selected_header = nine_get_opt('single_select', 'single-one');
$template_id = nine_get_opt('single_template');

// Function to get the template part based on the selected header
function get_selected_single($selected_header) {
    switch ($selected_header) {
        case 'header-two':
            get_template_part('template/single-post/single-two');
            break;
        case 'header-three':
            get_template_part('template/single-post/single-three');
            break;
        case 'header-one':
        default:
            get_template_part('template/single-post/single-one');
            break;
    }
}

if ($template_id) {
    if (function_exists('display_nine_core_content')) {
        $elementor_content = display_nine_core_content($template_id);
        if ($elementor_content) {
            echo apply_filters('nine-header', $elementor_content);
        } else {
            get_selected_single($selected_header);
        }
    } else {
        get_template_part('template/header/header-one');
    }
} else {
    get_selected_single($selected_header);
}
?>
