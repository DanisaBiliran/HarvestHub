document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('#infoNavigation a');
    const infoDivs = document.querySelectorAll('#infoDivsContainer > div');

    // show selected content
    function showContent(targetId) {
        infoDivs.forEach(div => {
            div.style.display = div.id === targetId ? 'block' : 'none';
        });
        
        // Update active link appearance
        links.forEach(link => {
            link.classList.remove('active'); // Remove active class from all links
            if (link.getAttribute('data-target') === targetId) {
                link.classList.add('active'); // Add active class to the clicked link
            }
        });
    }

    // Set default content(gen info)
    showContent('GenInformation');

    // Add click event listeners to each link
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default anchor behavior
            showContent(this.getAttribute('data-target')); // Show corresponding content
        });
    });
});


//FOR LOGOUT
function confirmLogout() {
    const userConfirmed = confirm("Are you sure you want to logout?");
    
    if (userConfirmed) {
        window.location.href = 'homepage.html'; // Change this to the actual homepage users see when they are not logged in
    }
}