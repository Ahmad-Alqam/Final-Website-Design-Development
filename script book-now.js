// Select all seats
const seats = document.querySelectorAll('.seat');
let selectedSeat = null; // To keep track of the selected seat element
const hiddenInput = document.getElementById('seats-selection'); // Hidden input

// Add click event listener to each seat
seats.forEach((seat) => {
    seat.addEventListener('click', () => {
        // Remove 'selected' class from the previously selected seat
        if (selectedSeat) {
            selectedSeat.classList.remove('selected');
        }

        // Add 'selected' class to the clicked seat
        seat.classList.add('selected');

        // Update the selectedSeat variable
        selectedSeat = seat;

        // Display the value of the selected seat

        // Log the value (optional)
        console.log("Selected Seat: " + seat.id);
        hiddenInput.value = seat.id;

    });
});



// Handle the "Book Now" button click event
document.getElementById("book-now-btn").addEventListener("click", function () {
    const movieDate = document.getElementById("movie-date").value.trim(); // Get and trim the show date
    const movieTime = document.getElementById("movie-time").value.trim(); // Get and trim the show time
    // Ensure the seat is selected and all fields are filled
    if (!selectedSeat && !movieDate && !movieTime) {
        alert("Please fill out all the fields.")
    }
    else if (!selectedSeat) {
        alert("Please select a seat.");
        return;
    }
    else if (!movieDate) {
        alert("Please select a show date.");
        return;
    }
    else if (!movieTime) {
        alert("Please select a show time.");
        return;
    }

    // If all fields are valid, confirm the booking
    alert(`Booking Details:\nDate: ${movieDate}\nTime: ${movieTime}\nSeat: ${selectedSeat.id}`);
});


function togglemenu() {
    const menu = document.querySelector('.nav-middle ul'); // Get the ul inside nav-middle
    menu.classList.toggle('active'); // Toggle the active class to show or hide the menu
}