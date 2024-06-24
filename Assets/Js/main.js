document.addEventListener('DOMContentLoaded', function() {

    var adminBar = document.getElementById('wpadminbar');
    
    if (adminBar) {
        adminBar.addEventListener('mouseenter', function() {
            adminBar.style.zIndex = '999999999999';
        });
    
        adminBar.addEventListener('mouseleave', function() {
            adminBar.style.zIndex = '';
        });
    }

});

document.addEventListener('DOMContentLoaded', function() {
    const gallery = document.querySelector('.post-format-gallery-thumbnail ul');
    const galleryItems = document.querySelectorAll('.post-format-gallery-thumbnail li');
    const dots = document.querySelectorAll('.gallery-dots .dot');

    if (!gallery || !galleryItems.length || !dots.length) {
        // console.error('Required elements are missing.');
        return;
    }

    let currentIndex = 0;
    const totalItems = galleryItems.length;

    function showImage(index) {
        if (!gallery) return;
        gallery.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach(dot => dot.classList.remove('active'));
        dots[index].classList.add('active');
    }

    function showNextImage() {
        currentIndex = (currentIndex + 1) % totalItems;
        showImage(currentIndex);
    }

    setInterval(showNextImage, 5000);
    showImage(currentIndex);
});

function closeHamburger() {
    const menu = document.querySelector('.nine-menu-mobile');
    if (!menu) return;

    menu.style.display = 'block'; // Show the menu
    setTimeout(() => {
        menu.classList.add('visible'); // Add class to trigger the transition
    }, 10); // Small timeout to ensure display property takes effect before transition
}

function callHamburger() {
    const menu = document.querySelector('.nine-menu-mobile');
    if (!menu) return;

    menu.classList.remove('visible'); // Remove class to trigger the transition
    setTimeout(() => {
        menu.style.display = 'none'; // Hide the menu after transition completes
    }, 500); // Match the duration of the transition
}

document.addEventListener('DOMContentLoaded', function() {
    // Select all menu items that have a sub-menu
    const menuItems = document.querySelectorAll('.menu-item-has-children');

    // Loop through each menu item
    menuItems.forEach(function(menuItem) {
        const anchor = menuItem.querySelector('a');
        if (anchor) {
            // Add the submenu-icon class to the <a> tag
            anchor.classList.add('submenu-icon');

            // Create a span element for the icon
            const icon = document.createElement('span');
            icon.classList.add('submenu-icon-span');
            anchor.appendChild(icon);

            // Add click event to the icon
            icon.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default action
                const submenu = menuItem.querySelector('.sub-menu');
                if (submenu) {
                    // Toggle the display property
                    if (submenu.style.display === 'block') {
                        submenu.style.display = 'none';
                    } else {
                        submenu.style.display = 'block';
                    }
                }
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {

    var websiteData = reduxOptions.sticky_hader;

    if (websiteData ==! 1) {
        
        var mainHeader = document.getElementById("main-header");
        if (mainHeader) {
            mainHeader.style.position = "relative";
        }

        var adminBarHeaders = document.querySelectorAll(".admin-bar #main-header");
        adminBarHeaders.forEach(function(header) {
            header.style.top = "0";
        });

        var sidebarTop = document.querySelectorAll("#sidebar");
        sidebarTop.forEach(function(header) {
            header.style.top = "20px";
        });

    }

});


