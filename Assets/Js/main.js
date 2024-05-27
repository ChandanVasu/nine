document.addEventListener('DOMContentLoaded', function() {

    var adminBar= document.getElementById('wpadminbar');

    adminBar.addEventListener('mouseenter', function() {
        adminBar.style.zIndex= '999999999999';
    });

    adminBar.addEventListener('mouseleave', function() {
        adminBar.style.zIndex= '';
    });

});

(function($) {

    $(document).ready(function() {
        var bodyBgColor= "<?php echo esc_js($redux_options['body_bg_color']); ?>";

        if (bodyBgColor) {
            $('body').css('background-color', bodyBgColor);
        }
    });
})(jQuery);

document.addEventListener('DOMContentLoaded', function() {
    const gallery= document.querySelector('.post-format-gallery-thumbnail ul');
    const galleryItems= document.querySelectorAll('.post-format-gallery-thumbnail li');
    let currentIndex= 0;
    const totalItems= galleryItems.length;

    function showNextImage() {
        currentIndex=(currentIndex + 1) % totalItems;
        gallery.style.transform= `translateX(-${currentIndex * 100}%)`;
    }

    setInterval(showNextImage, 3000);
});