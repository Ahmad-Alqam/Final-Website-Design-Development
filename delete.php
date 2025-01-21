<?php
require 'connect.php'; // Include the database connection

// Cancelling booking
if (isset($_POST['booking_id'])) {
    // Get the booking ID from the POST request
    $booking_id = $_POST['booking_id'];
    echo 'Booking ID: ' . $booking_id; // Debugging

    // Prepare the SQL DELETE query
    $sql = "DELETE FROM bookings WHERE id = :booking_id";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind the booking_id parameter
    $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);

    // Execute the query
    if ($stmt->execute()) {
        echo "booking .$booking_id. cancelled"; // Debugging
        // Redirect to the bookings page after successful cancellation
        header('Location: my_bookings.php'); 
        exit();
    } else {
        // If there's an error
        echo "Error canceling the booking.";
    }
} else {
    echo "No booking ID provided.";
}
?>
