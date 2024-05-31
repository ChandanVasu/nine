document.addEventListener('DOMContentLoaded', function() {

    var adminBar= document.getElementById('wpadminbar');

    adminBar.addEventListener('mouseenter', function() {
        adminBar.style.zIndex= '999999999999';
    });

    adminBar.addEventListener('mouseleave', function() {
        adminBar.style.zIndex= '';
    });

});


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




 function closeHamburger() {
    const menu = document.querySelector('.nine-menu-mobile');

    const offcanvas = document.querySelector('.offcanvas-full');
    
    offcanvas.style.visibility = "visible"
    menu.style.display = 'block'; // Show the menu
    setTimeout(() => {
      menu.classList.add('visible'); // Add class to trigger the transition
    }, 10); // Small timeout to ensure display property takes effect before transition
  }
  
  function callHamburger() {
    const menu = document.querySelector('.nine-menu-mobile');
    const offcanvas = document.querySelector('.offcanvas-full');
    
    offcanvas.style.visibility = "hidden"

    menu.classList.remove('visible'); // Remove class to trigger the transition
    setTimeout(() => {
      menu.style.display = 'none'; // Hide the menu after transition completes
    }, 500); // Match the duration of the transition
  }