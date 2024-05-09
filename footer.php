<?php
global $nine_theme;

// Check if 'footer_text' is defined using isset() and not empty
$footer_text = (isset($nine_theme['footer_text']) && !empty($nine_theme['footer_text'])) ? $nine_theme['footer_text'] : 'VasuTheme All Rights Reserved';
?>

<!-- Display in the footer -->
<footer>
    <div class="footer-content">
        <p><?php echo esc_html($footer_text); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
