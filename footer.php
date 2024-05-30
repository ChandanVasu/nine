<?php

$footer_text = nine_opt_check('footer_text', ' All Rights Reserved');
?>

<!-- Display in the footer -->
<footer>
    <div class="footer-content">
        <p><?php echo esc_html($footer_text); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
