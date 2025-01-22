<?php
require("connect.php");


// Get the movie name from the query string
$movieName = isset($_GET['name']) ? urldecode($_GET['name']) : null;

// Fetch the selected film details
if ($movieName) {
    $stmt = $pdo->prepare("SELECT * FROM films WHERE name = :name");
    $stmt->execute(['name' => $movieName]);
    $film = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $film = null; // No movie selected
}

session_start(); // Ensure the session is started
// Initialize variables

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Get form input
    $user_id = $_SESSION['privilleged'] ?? null;
    if (!$user_id) {
        // Redirect to login page if not signed in
        header("Location: login.php");
        exit();
    } 
    $user_id = isset($_SESSION['privilleged']) ?? null;
    $film_id = $_POST['film_id'] ?? null;
    $movie_date = $_POST['movie-date'] ?? null;
    $movie_time = $_POST['movie-time'] ?? null;
    $seat = $_POST['seats-selection'] ?? null;

            // Insert booking into the database
            $stmt = $pdo->prepare("
                INSERT INTO bookings (user_id, film_id, movie_time, movie_date, seat) 
                VALUES (:user_id, :film_id, :movie_time, :movie_date, :seat)
            ");
            $stmt->execute([
                'user_id' => $user_id,
                'film_id' => $film_id,
                'movie_time' => $movie_time,
                'movie_date' => $movie_date,
                'seat' => $seat
            ]);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book now - NightScreens Cinema</title>
    <link rel="stylesheet" href="styles book-now.css">
    <link rel="icon" type="image/x-icon" href="Assets/img/logo/image-removebg-preview (1).png">
    <!-- Font Awesome Integration -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <header>
        <nav style="width:100%;">
            <div class="nav-left">
                <img src="Assets/img/logo/Website_Logo.png" alt="Logo">
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
            <div class="nav-right">
            <?php 
            if (isset($_SESSION['privilleged'])): ?>
                <!-- If the user is logged in -->
                <a href="logout.php" id="login-out" class="btn logout"  style="border:none; position:relative; width:0%;">Logout</a>
            <?php else: ?>
                <!-- If the user is not logged in -->
                <a href="login.php" id="login-out" class="btn login" style="border:none; position:relative; width:100%;">Login /<br>Sign up</a>
            <?php endif; ?>
           
        </div>
        <div class="hamburger-menu" onclick="togglemenu()">&#9776;</div> <!-- This represents the hamburger icon -->
        </nav>
    </header>

    <!-- Movie Details Section -->
    <section id="home">
        <div id="slideshow">
            <?php if ($film): ?>
            <article class="slide">
                <img src="Assets/img/bg/<?php echo htmlspecialchars($film['img']); ?>" 
                     alt="<?php echo htmlspecialchars($film['name']); ?> Poster">
                <div class="description">
                    <h2><?php echo htmlspecialchars($film['name']); ?></h2>
                    <p><?php echo htmlspecialchars($film['description']); ?></p>
                </div>
            </article>
            <?php else: ?>
            <p>No movie selected or movie not found.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Book Now Section -->
    <?php if ($film): ?>
    <section class="book-now-section">
        <h1>Book Your Ticket: <?php echo htmlspecialchars($film['name']); ?></h1>
        <div class="book-now-content">
            <!-- Cast Details -->
            <div class="cast">
                <h2>Casts:</h2>
                <ul>
                    <?php
                    $cast = explode(',', $film['cast']); 
                    foreach ($cast as $actor) {
                        echo "<li>" . htmlspecialchars(trim($actor)) . "</li>";
                    }
                    ?>
                </ul>
            </div>

            <form id="book-now-form" method="POST" action="#" style="display:contents;">
            <!-- Date and Time -->
            <div class="date-time">
                <h2>Date and Time</h2>
                <select id="movie-date" name="movie-date" required>
                    <option value="">Select Date</option>
                    <option>2024-12-19</option>
                    <option>2024-12-20</option>
                    <option>2024-12-21</option>
                    <option>2024-12-22</option>
                </select>

                <select id="movie-time" name="movie-time" required>
                    <option value="">Select Time</option>
                    <option>19:00</option>
                    <option>15:00</option>
                    <option>21:00</option>
                    <option>12:00</option>
                </select>

                <p id="payment" name="payment" style="width: fit-content;">
                    ⚠️ Caution: Only cash payments are supported.
                </p>
            </div>

            <!-- Seating -->
            <div class="seating-container">
                <h2>Seat Selection</h2><br>
                <h3>Screen</h3>
                <div class="row">
                    <div class="seat" id="A1"></div>
                    <div class="seat" id="A2"></div>
                    <div class="seat" id="A3"></div>
                    <div class="seat" id="A4"></div>
                </div>
                <div class="row">
                    <div class="seat" id="B1"></div>
                    <div class="seat" id="B2"></div>
                    <div class="seat" id="B3"></div>
                    <div class="seat" id="B4"></div>
                </div>
                <div class="row">
                    <div class="seat" id="C1"></div>
                    <div class="seat" id="C2"></div>
                    <div class="seat" id="C3"></div>
                    <div class="seat" id="C4"></div>
                </div>
                <div class="row">
                    <div class="seat" id="D1"></div>
                    <div class="seat" id="D2"></div>
                    <div class="seat" id="D3"></div>
                    <div class="seat" id="D4"></div>
                </div>
            </div>
        </div>
    </section>
    <!--return movie details -->
    <input type="hidden" name="film_id" value="<?php echo $film['id']; ?>">
    <input type="hidden" id="user_id" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
    <input type="hidden" name="seats-selection" id="seats-selection" value="">

    <!-- Book Now Button -->
    <section class="book-now-btn">
        <button id="book-now-btn">Book Now</button>
    </section>
                </form>
   <!-- Booking Confirmation -->
   <?php if ($bookingSuccess): ?>
        <p>Your booking was successful!</p>
    <?php elseif ($errorMessage): ?>
        <p>Error: <?php echo htmlspecialchars($errorMessage); ?></p>
    <?php endif; ?>
    <?php endif; ?>

    <footer>
        <div class="footer-container">
            <!-- About Us Section -->
            <div class="footer-up" id="about-us">
                <h3>About NightScreen Cinema</h3>
                <p>Step into a world of cinematic wonder at NightScreen Cinema. Our theater is dedicated to delivering
                    an unparalleled movie-watching experience for film enthusiasts of all tastes. Whether you're a fan
                    of the latest blockbusters, thought-provoking indie films, or timeless classics, we bring a diverse
                    selection of films that cater to all preferences.</p>
                <p>At NightScreen, we focus on creating an immersive environment, combining state-of-the-art projection
                    technology and crystal-clear sound with a cozy, welcoming atmosphere. Our comfortable seating
                    ensures that you can fully relax and enjoy every moment of your cinematic journey.</p>
                <p>Join us for special events, film festivals, and exclusive premieres, all designed to offer a truly
                    unique and unforgettable movie experience. Whether you're here for a date night, family outing, or a
                    solo escape, NightScreen Cinema is your destination for the best in entertainment.</p>
            </div>


            <!-- Quick Links Section -->
            <div class="footer-middle">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#NowShowing-btn">Now Showing</a></li>
                    <li><a href="index.php#comingsoon-section">Coming Soon</a></li>
                    <li><a href="my_bookings.php">My Bookings</a></li>
                    <li><a href="index.php#about-us">About Us</a></li>
                    <li><a href="index.php#social-links">Contact Us</a></li>
                </ul>
            </div>

            <!-- Social Media Section -->
            <div class="footer-right">
                <h3>Follow Us</h3>
                <ul class="social-links" id="social-links">
                    <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
                    <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
                </ul>
            </div>

            <!-- Logo Section -->
            <div class="logo-foot">
                <img src="Assets/img/logo/Website_Logo.png">
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 NightScreen Cinema. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="script book-now.js"></script>
</body>

</html>
