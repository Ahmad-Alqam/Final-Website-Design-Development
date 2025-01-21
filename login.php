<?php
session_start();
require("connect.php");

$errorMessage = ""; // To store the error message

if (isset($_POST['login'])) {
    // SQL query to fetch the user based on email and password
    $sql = "SELECT * FROM users WHERE Email = :email AND Password = :password";
    $statement = $pdo->prepare($sql);

    // Retrieve and sanitize the input
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: plaintext, hashing recommended

    // Bind parameters to prevent SQL injection
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->bindParam(":password", $password, PDO::PARAM_STR);

    // Execute the query
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Login successful, set session variables
        $_SESSION['privilleged'] = $email;
        header("Location: index.php"); // Redirect to the home page
        exit();
    } else {
        // Login failed, set error message
        $errorMessage = "Invalid email or password.";
    }

    // Close the connection
    $pdo = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NightScreens Cinema</title>
    <link rel="stylesheet" href="styles-login.css">
    <link rel="icon" type="x-icon" href="Assets/img/logo/login icon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <header>
        <nav>
            <div class="nav-left">
                <img src="Assets/img/logo/Website_Logo.png" alt="NightScreen Cinema Logo">
            </div>
            <div class="nav-middle">
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i></a></li>
                    <li><a href="index.php#NowShowing-btn">Now Showing</a></li>
                    <li><a href="index.php#comingsoon-section">Coming Soon</a></li>
                    <li><a href="my_bookings.php">My Bookings</a></li>
                    <li><a href="index.php#about-us">About Us</a></li>
                    <li><a href="index.php#social-links">Contact Us</a></li>
                </ul>
            </div>
            <div class="hamburger-menu" onclick="togglemenu()">&#9776;</div>
        </nav>
    </header>

    <main>
        <section class="login-section">
            <div class="login-container">
                <h2>Login</h2>
                <form action="#" method="POST" class="login-form">
                    <?php if (!empty($errorMessage)): ?>
                        <div class="error-message" style="color:red;">
                            <?php echo htmlspecialchars($errorMessage); ?>
                        </div>
                    <?php endif; ?>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="submit-group">
                        <button type="submit" name="login" class="btn">Login</button>
                    </div>
                </form>
                <br>
                <p>Don’t have an account? <a href="sign_up.php" class="sign-up">Sign up here!</a></p>
            </div>
        </section>
    </main>
    <script src="script-login.js"></script>
</body>

</html>
