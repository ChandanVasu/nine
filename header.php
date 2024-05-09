<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xo
 */

// Global Redux Framework options
$nine_theme = get_option("nine_theme");


// Retrieve the selected header template from Redux
$selected_header = isset($nine_theme['header_select']) ? $nine_theme['header_select'] : 'header-one';
$template_id = isset($nine_theme["header_template"]) ? $nine_theme["header_template"] : null;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header id="main-header">
    <?php
    if ($template_id) {
        // If there's a valid template ID, display the Elementor content
        $elementor_content = display_nine_core_content($template_id);
        if ($elementor_content) {
            echo $elementor_content;
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
                    get_template_part('template/header/header-three'); // Fallback to 'header-three'
                    break;
            }
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
                get_template_part('template/header/header-three'); // Fallback to 'header-three'
                break;
        }
    }
    ?>
</header>

