const stars = document.querySelectorAll('.star');
const selectedRating = document.getElementById('selectedRating');

stars.forEach(star => {
    star.addEventListener('click', () => {
        const ratingValue = star.getAttribute('data-value');
        
        // Clear previous selections
        stars.forEach(s => s.classList.remove('selected'));
        
        // Highlight selected stars
        for (let i = 0; i < ratingValue; i++) {
            stars[i].classList.add('selected');
        }

        // Display selected rating
        selectedRating.textContent = `You rated this profile: ${ratingValue} star(s)`;
    });
});