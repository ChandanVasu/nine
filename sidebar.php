<?php/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nine
 */
?>
<aside id="sidebar" class="widget-area">
    <?php if (is_active_sidebar('main-sidebar')) : ?>
        <?php dynamic_sidebar('main-sidebar'); ?>
    <?php else : ?>
        <p>No widgets added to this sidebar yet.</p>
    <?php endif; ?>
</aside>
