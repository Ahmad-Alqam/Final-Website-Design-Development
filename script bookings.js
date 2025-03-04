// Attach event listeners to cancel buttons
document.querySelectorAll('.cancel-btn').forEach(button => {
    button.addEventListener('click', function () {
        // Get the booking ID from the button's data-id attribute
        const bookingId = this.getAttribute('data-id');

        // Set the value of the hidden input to the booking ID
        document.getElementById('cancel-booking-id').value = bookingId;
        document.getElementById('cancel-modal').style.display = 'block';

    });
});

// Function to close the cancel modal
function closeCancelModal() {
    document.getElementById('cancel-modal').style.display = 'none';
}

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

        // Log the value (optional)
        console.log("Selected Seat: " + seat.id);
        hiddenInput.value = seat.id;

    });
});
//edit modal
document.addEventListener('DOMContentLoaded', function () {
    // Get modal elements
    const editModal = document.getElementById('edit-modal');
    const closeModalButtons = document.querySelectorAll('.close-btn');
    const editButtons = document.querySelectorAll('.edit-btn');

    let currentBookingId;  // Variable to store the current booking ID being edited

    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            // currentBookingId = e.target.dataset.id;  // Get the booking ID
            // console.log('Editing booking with ID:', currentBookingId);

            // Open the modal 
            document.getElementById('edit-booking-id').value = currentBookingId;
            editModal.style.display = 'block';
        });
    });

});

function closeEditModal() {
    document.getElementById("edit-modal").style.display = "none";
}

document.getElementById("save").addEventListener("click", function () {
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
    alert(`Booking Confirmed!\nDate: ${movieDate}\nTime: ${movieTime}\nSeat: ${selectedSeat.id}`);
});





// Toggle the display of the navigation menu when the hamburger icon is clicked
const hamburgerMenu = document.querySelector('.hamburger-menu');
const navLinks = document.querySelector('.nav-middle ul');

hamburgerMenu.addEventListener('click', () => {
    navLinks.classList.toggle('show');
});

function togglemenu() {
    const menu = document.querySelector('.nav-middle ul'); // Get the ul inside nav-middle
    menu.classList.toggle('active'); // Toggle the active class to show or hide the menu
}
