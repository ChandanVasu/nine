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


document.addEventListener('DOMContentLoaded', function() {
    function addMenuListeners(menuItems) {
        menuItems.forEach(function(item) {
            item.addEventListener('mouseenter', function() {
                const submenu = this.querySelector('.sub-menu');
                if (submenu) {
                    submenu.style.display = 'block';
                }
            });

            item.addEventListener('mouseleave', function() {
                const submenu = this.querySelector('.sub-menu');
                if (submenu) {
                    submenu.style.display = 'none';
                }
            });

            item.addEventListener('click', function(event) {
                const submenu = this.querySelector('.sub-menu');
                if (submenu) {
                    if (submenu.style.display === 'block') {
                        submenu.style.display = 'none';
                    } else {
                        submenu.style.display = 'block';
                    }
                    event.stopPropagation(); // Prevent event from bubbling up
                    event.preventDefault();  // Prevent default link behavior
                }
            });

            // Close submenu when clicking outside
            document.addEventListener('click', function() {
                const submenu = item.querySelector('.sub-menu');
                if (submenu) {
                    submenu.style.display = 'none';
                }
            });

            // Recursively add listeners to nested submenus
            const nestedMenuItems = item.querySelectorAll('.sub-menu .menu-item');
            if (nestedMenuItems.length > 0) {
                addMenuListeners(nestedMenuItems);
            }
        });
    }

    const topLevelMenuItems = document.querySelectorAll('.nav-main .menu-item');
    addMenuListeners(topLevelMenuItems);
});
