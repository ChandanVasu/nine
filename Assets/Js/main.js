document.addEventListener('DOMContentLoaded', function() {
    // const headerElement = document.getElementById('main-header');

    // if (!headerElement) {
    //     console.error("Element with ID 'main-header' not found.");
    //     return;
    // }

    // const shadowStyle = 'rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px';
    
    // // Function to add or remove shadow based on scroll position
    // function handleScroll() {
    //     if (window.scrollY > 0) {
    //         headerElement.style.boxShadow = shadowStyle;
    //     } else {
    //         headerElement.style.boxShadow = 'none';
    //     }
    // }

    // // Add scroll event listener to trigger the function on scroll
    // window.addEventListener('scroll', handleScroll);

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
