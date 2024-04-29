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
global $redux_global;

// Retrieve the selected header template from Redux
$selected_header = isset($redux_global['header_select']) ? $redux_global['header_select'] : 'header-one';

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
    // Load the appropriate header template from the subdirectory
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
            get_template_part('template/header/header-three'); // Fallback to 'header-one'
            break;
    }
    ?>
</header>


<script>
    
</script>