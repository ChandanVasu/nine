<?php
global $nine_theme;
?>

<!-- Display in the footer -->
<footer>
    <div class="footer-content" style="background-color: <?php echo esc_attr($nine_theme['body_bg_color']); ?>;">
        <p><?php echo esc_html($nine_theme['footer_text']); ?></p>
    </div>
</footer>


<!-- theme_get_option('footer_text'); -->
