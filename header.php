<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nine
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr(get_bloginfo('charset')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header id="main-header">

<?php

$template_id = nine_get_opt('header_template');

// Function to load the appropriate header template
function load_header_template($template_id) {
    // Check if the template ID exists and the function is available
    if ($template_id && function_exists('display_nine_core_content')) {
        $elementor_content = display_nine_core_content($template_id);
        if ($elementor_content) {
            echo apply_filters('nine-header', $elementor_content);
            return;
        }
    }

    // Fallback to the default header template
    get_template_part('template/header/header-one'); // Default fallback
}

// Execute the function
load_header_template($template_id);

?>

</header>
