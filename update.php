<?php
require 'connect.php';

// Check if the form is submitted and the booking ID exists
if (isset($_POST['booking_id']) && !empty($_POST['booking_id'])) {
    // Sanitize inputs
    $booking_id = $_POST['booking_id'];  // Ensure booking_id is an integer
    $new_seats = $_POST['seats-selection'];  // Ensure no leading/trailing spaces in seat selection
    $new_date = $_POST['movie-date'];  // Date from the form
    $new_time = $_POST['movie-time'];  // Time from the form

    // Check if required fields are filled
    if (empty($new_seats) || empty($new_date) || empty($new_time)) {
        echo "All fields are required!";
        exit();
    }

    // Prepare the SQL UPDATE query
    $sql = "UPDATE bookings SET seat = :new_seats, movie_date = :new_date, movie_time = :new_time WHERE id = :booking_id";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':new_seats', $new_seats, PDO::PARAM_STR);
    $stmt->bindParam(':new_date', $new_date, PDO::PARAM_STR);
    $stmt->bindParam(':new_time', $new_time, PDO::PARAM_STR);
    $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);

    // Execute the query
    if ($stmt->execute()) {
        echo "Successfully updated";
        header('Location: my_bookings.php');  // Redirect to the bookings page after successful update
        exit();
    } else {
        // Error handling
        echo "Error updating the booking. Please try again.";
    }
} else {
    echo "No booking ID provided or invalid input.";
}

$pdo = null;
?>
