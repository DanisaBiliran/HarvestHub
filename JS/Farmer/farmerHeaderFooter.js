// Function to load the header
function loadHeader() {
    fetch('http://localhost/HarvestHub/FARMER/farmerHeader.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('header').innerHTML = data;
        })
        .catch(error => console.error('Error loading header:', error));
}

// Function to load the footer
function loadFooter() {
    fetch('http://localhost/HarvestHub/BOTH/footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footer').innerHTML = data;
        })
        .catch(error => console.error('Error loading footer:', error));
}

// Load the header and footer when the page loads
window.onload = function() {
    loadHeader();
    loadFooter();
};