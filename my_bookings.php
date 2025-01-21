<?php
session_start(); // Start the session
require 'connect.php'; // Include database connection file

// Check if the user is logged in
if (!isset($_SESSION['privilleged'])) {
    header('Location: login.php');
    exit();
}


// Query to fetch bookings for the logged-in user
$sql = "
    SELECT 
        b.id AS booking_id,
        f.name AS movie_name,
        f.img AS movie_img,
        b.movie_date,
        b.movie_time,
        b.seat
    FROM 
        bookings b
    INNER JOIN 
        films f ON b.film_id = f.id
    
    ORDER BY 
        b.movie_date";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en" style="display:grid;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - NightScreens Cinema</title>
    <link rel="stylesheet" href="styles-bookings.css">
    <!--font awesom integration-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="x-icon" href="Assets/img/logo/image-removebg-preview.png">

</head>

<body>
    <!-- Navbar -->
    <header>
        <nav>
            <div class="nav-left">
                <img src="Assets/img/logo/Website_Logo.png" alt="Logo"> <!-- Replace with your logo image -->
            </div>
            <div class="nav-middle">
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i>
                            </i></a></li>
                    <li><a href="index.php#NowShowing-btn">Now Showing</a></li>
                    <li><a href="index.php#comingsoon-section">Coming Soon</a></li>
                    <li><a href="#">My Bookings</a></li>
                    <li><a href="index.php#about-us">About Us</a></li>
                    <li><a href="index.php#social-links">Contact Us</a></li>
                </ul>
            </div>
            <div class="nav-right">
            <?php 
            if (isset($_SESSION['privilleged'])): ?>
                <!-- If the user is logged in -->
                <a href="logout.php" id="login-out" class="btn logout"  style="border:none; position:absolute; width:10%;">Logout</a>
            <?php else: ?>
                <!-- If the user is not logged in -->
                <a href="login.php" id="login-out" class="btn login" style="border:none; position:absolute; width:10%;">Login / Sign up</a>
            <?php endif; ?>
        </div>
            <div class="hamburger-menu" onclick="togglemenu()">&#9776;</div> <!-- This represents the hamburger icon -->
        </nav>
    </header>

    <!--bookings section-->
    <section class="bookings-section">
        <div class="container">
            <h2>My Bookings</h2>
            <p>Here’s a list of your current reservations.</p>
            <div class="bookings-list">
                <?php if (!empty($bookings)): ?>
                    <?php foreach ($bookings as $booking): ?>
                        <div class="booking-item" id=<?= htmlspecialchars($booking['booking_id']) ?>>
                            <div class="booking-img">
                                <img src="Assets/img/bg/<?php echo htmlspecialchars($booking['movie_img']); ?>" alt="<?= htmlspecialchars($booking['movie_name']) ?> ">
                            </div>
                            <div class="booking-details">
                                <h3>Movie: <?= htmlspecialchars($booking['movie_name']) ?></h3>
                                <p><strong>Date:</strong> <?= htmlspecialchars($booking['movie_date']) ?></p>
                                <p><strong>Time:</strong> <?= htmlspecialchars($booking['movie_time']) ?></p>
                                <p><strong>Seat:</strong> <?= htmlspecialchars($booking['seat']) ?></p>
                            </div>
                            <div class="booking-actions">
                        <button class="edit-btn" data-id="<?= htmlspecialchars($booking['booking_id']) ?>">Edit</button>
                        <button class="cancel-btn" data-id="<?= htmlspecialchars($booking['booking_id']) ?>">Cancel</button>
                    </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No bookings found. Book your favorite movies now!</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Edit Modal -->
<div id="edit-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h3>Edit Booking</h3>
        <form id="edit-form" method="POST" action="update.php">
            <input type="hidden" name="booking_id" id="edit-booking-id" value="<?= htmlspecialchars($booking['booking_id']) ?>">

             <!-- Seating -->
             <div class="seating-container">
                <h3 style="color:black">Screen</h3>
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
            <label for="date">Date:</label>
            <select id="movie-date" name="movie-date" required>
                <option value="">Select Date</option>
                <option>2024-12-19</option>
                <option>2024-12-20</option>
                <option>2024-12-21</option>
                <option>2024-12-22</option>
            </select>

            <label for="Time">Time:</label>
            <select id="movie-time" name="movie-time" required>
                <option value="">Select Time</option>
                <option>19:00</option>
                <option>15:00</option>
                <option>21:00</option>
                <option>12:00</option>
            </select>
            <input type="hidden" name="seats-selection" id="seats-selection" value="">
            <input type="hidden" name="booking_id" id="edit-booking-id" value="<?= htmlspecialchars($booking['booking_id']) ?>">
            <button type="submit" id="save">Save Changes</button>
        </form>
    </div>
</div>


   <!-- Cancel Modal -->
<div id="cancel-modal" class="modal">
    <div class="modal-content">
        <h3>Are you sure you want to cancel this booking?</h3>
        <form method="POST" action="delete.php">
            <!-- Hidden input to store the booking ID -->
            <input type="hidden" name="booking_id" id="cancel-booking-id" value="<?= htmlspecialchars($booking['booking_id']) ?>">
            <button type="submit" id="confirm-cancel">Yes, Cancel</button>
            <button type="button" id="close-cancel" onclick="closeCancelModal()">No</button>
        </form>
    </div>
</div>



    <footer>
        <div class="footer-bottom">
            <p>&copy; 2024 NightScreen Cinema. All Rights Reserved.</p>
        </div>
    </footer>


    <script src="script bookings.js"></script>
</body>

</html>