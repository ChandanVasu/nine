document.addEventListener('DOMContentLoaded', function() {

// Get the WordPress admin bar
var adminBar = document.getElementById('wpadminbar');

// Apply styles when hovering over the admin bar
adminBar.addEventListener('mouseenter', function() {
    adminBar.style.zIndex = '999999999999';  // Ensures that it's on top of other elements
});

// Reset the styles when no longer hovering
adminBar.addEventListener('mouseleave', function() {
    adminBar.style.zIndex = '';  // Resetting to default
});

});

(function ($) {
    // Fetch the Redux color setting via PHP variable and set the body background color
    $(document).ready(function () {
        var bodyBgColor = "<?php echo esc_js($redux_options['body_bg_color']); ?>"; // Get Redux color

        if (bodyBgColor) {
            $('body').css('background-color', bodyBgColor); // Set the body background color
        }
    });
})(jQuery);

