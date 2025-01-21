<?php
session_start();
require("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect data from form
    $First_Name = $_POST['first-name'];
    $Last_Name = $_POST['last-name'];
    $Email = $_POST['email'];
    $password = $_POST['password'];
    $Phone_number = $_POST['phone'];

    // Prepare SQL statement
    $sql = "INSERT INTO users (First_Name, Last_Name, Email, password, Phone_number) 
            VALUES (:First_Name, :Last_Name, :Email, :password, :Phone_number)";
    $statement = $pdo->prepare($sql);

    // Bind parameters to SQL query
    $statement->bindParam(":First_Name", $First_Name, PDO::PARAM_STR);
    $statement->bindParam(":Last_Name", $Last_Name, PDO::PARAM_STR);
    $statement->bindParam(":Email", $Email, PDO::PARAM_STR);
    $statement->bindParam(":password", $password, PDO::PARAM_STR);
    $statement->bindParam(":Phone_number", $Phone_number, PDO::PARAM_STR);
   
    if ($statement->execute()) {
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit(); // Make sure the script ends after the redirect
    } else {
        echo 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - NightScreens Cinema</title>
    <link rel="stylesheet" href="styles-signup.css">
    <link rel="icon" type="x-icon" href="Assets/img/logo/login icon.jpg">
    <!--font awesom integration-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Header with Navbar -->
    <header>
        <nav>
            <div class="nav-left">
                <img src="Assets/img/logo/Website_Logo.png" alt="NightScreen Cinema Logo">
            </div>
            <div class="nav-middle">
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i>
                            </i></a></li>
                    <li><a href="index.php#NowShowing-btn">Now Showing</a></li>
                    <li><a href="index.php#comingsoon-section">Coming Soon</a></li>
                    <li><a href="my_bookings.php">My Bookings</a></li>
                    <li><a href="index.php#about-us">About Us</a></li>
                    <li><a href="index.php#social-links">Contact Us</a></li>
                </ul>
            </div>
            <div class="hamburger-menu" onclick="togglemenu()">&#9776;</div> <!-- This represents the hamburger icon -->
        </nav>
    </header>

    <!-- Main Content: Sign-Up Section -->
    <main>
        <section class="signup-section">
            <div class="signup-container">
                <h1>Sign Up</h1>
                <form action="#" method="POST" class="signup-form">
                    <!-- First Name and Last Name in one row -->
                    <fieldset>
                        <div class="input-group">
                            <div class="input-box">
                                <label for="first-name">First Name</label>
                                <input type="text" id="first-name" name="first-name" required>
                            </div>
                            <div class="input-box">
                                <label for="last-name">Last Name</label>
                                <input type="text" id="last-name" name="last-name" required>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Email and Phone Number in one row -->
                    <fieldset>
                        <div class="input-group">
                            <div class="input-box">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="input-box">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Password -->
                    <fieldset>
                            <div class="input-box">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" required style="width:50%">
                            </div>
                        <div id="error" style="color: red; display: none;">Passwords do not match!</div>

                    </fieldset>

                    <!-- Submit Button -->
                    <div class="submit-group">
                        <button type="submit" class="btn">Sign Up</button>
                    </div>

                    <!-- Sign In Link -->
                    <p>Already have an account? <a class="sign-in" href="login.php">Sign in here!</a></p>
                </form>
            </div>
        </section>
    </main>
    <script src="script signup.js"></script> <!--Link to your external JS file -->

</body>

</html>