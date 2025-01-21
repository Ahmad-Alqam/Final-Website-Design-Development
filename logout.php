<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['privilleged'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session to ensure complete logout
    session_destroy();
}

// Redirect to the login page
header("Location: login.php");
exit();
?>
