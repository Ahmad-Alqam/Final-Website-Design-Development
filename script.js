let currentSlide = 0;
const slides = document.querySelectorAll('#slideshow .slide');

function showSlide(index) {
    if (index >= slides.length) {
        currentSlide = 0;
    } else {
        currentSlide = index;
    }
    // (-) to move forward / 100% width 
    const newTransform = -currentSlide * 100;
    document.getElementById('slideshow').style.transform = `translateX(${newTransform}%)`;
}

// Show next/previous slides every 3 seconds
setInterval(() => {
    showSlide(currentSlide + 1);
}, 3000);

// Optionally: You can also trigger showSlide function on button clicks or other events.
// Function to show the movie list and update button styles
function showMovies(listId, button) {
    // Hide all movie lists
    const movieLists = document.querySelectorAll('.movie-list');
    movieLists.forEach(list => list.classList.remove('active'));

    // Deactivate all buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => btn.classList.remove('active'));

    // Show the selected movie list and activate the corresponding button
    document.getElementById(listId).classList.add('active');
    button.classList.add('active');
}



// // Toggle the display of the navigation menu when the hamburger icon is clicked
// // Get the hamburger menu and nav-middle elements
// // Select the hamburger menu and nav-middle
// const hamburgerMenu = document.querySelector('.hamburger-menu');
// const navMiddle = document.querySelector('.nav-middle ul');

// // Add an event listener to the hamburger menu
// hamburgerMenu.addEventListener('click', () => {
//     // Toggle the 'active' class to show/hide the navigation links
//     navMiddle.classList.toggle('active');
// });
function togglemenu() {
    const menu = document.querySelector('.nav-middle ul'); // Get the ul inside nav-middle
    menu.classList.toggle('active'); // Toggle the active class to show or hide the menu
}

// BOOK NOW BUTTONS
// document.getElementById('joker-book').addEventListener('click', function () {
//     window.location.href = "book now.php";
// });