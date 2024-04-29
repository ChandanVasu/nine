<?php
// Use the correct global variable
global $redux_global;

// Check if the variable is set, and get the footer text
$footer_text = isset($redux_global['footer_text']) ? $redux_global['footer_text'] : __('All Rights Reserved.', 'nine-theme');
?>

<!-- Display in the footer -->
<footer>
    <div class="footer-content">
        <p><?php echo esc_html($footer_text); ?></p>
    </div>
</footer>

<!-- theme_get_option('footer_text'); -->