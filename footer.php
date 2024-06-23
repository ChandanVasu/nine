<?php
/**
 * The footer template file
 *
 * This template is used to display the footer of the website.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nine
 */

$nine_get_opt = nine_get_opt('footer_text', 'Designed by VasuTheme - Newspaper WordPress Theme.');?>

<!-- Display in the footer -->
<footer>
    <div class="footer-content">
        <p><?php echo esc_html($nine_get_opt); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
