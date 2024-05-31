<?php

$selected_header = nine_get_opt('header_select', 'header-one');
$template_id = nine_get_opt('header_template');

if ($template_id) {
    // If there's a valid template ID, display the Elementor content
    if (function_exists('display_nine_core_content')) {
        $elementor_content = display_nine_core_content($template_id);
        if ($elementor_content) {
            echo apply_filters('nine-header', $elementor_content);
        } else {
            // If no Elementor content, use the fallback logic
            switch ($selected_header) {
                case 'header-one':
                    get_template_part('template/header/header-one');
                    break;
                case 'header-two':
                    get_template_part('template/header/header-two');
                    break;
                case 'header-three':
                    get_template_part('template/header/header-three');
                    break;
                default:
                    get_template_part('template/header/header-one'); // Fallback to 'header-one'
                    break;
            }
        }
    } else {
        get_template_part('template/header/header-one');
    }
} else {
    // If no template ID, use the fallback logic
    switch ($selected_header) {
        case 'header-one':
            get_template_part('template/header/header-one');
            break;
        case 'header-two':
            get_template_part('template/header/header-two');
            break;
        case 'header-three':
            get_template_part('template/header/header-three');
            break;
        default:
            get_template_part('template/header/header-one'); // Fallback to 'header-one'
            break;
    }
}
?>
