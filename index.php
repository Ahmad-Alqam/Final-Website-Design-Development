<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NightScreens Cinema</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="icon" type="fav-icon" href="Assets/img/logo/Website_Logo-removebg-preview - Copy.png">
    <!-- Modifying the seach engines  -->
    <meta name="description"
        content="NightScreen Cinema: Experience the ultimate movie-watching experience with our diverse film selection, immersive technology, and cozy atmosphere.">
    <meta name="keywords"
        content="cinema, movies, now showing, coming soon, NightScreen Cinema, film, booking, IMAX, theaters">
    <meta name="author" content="NightScreen Cinema">
    <!--font awesom integration-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <li><a href="index.php"><i class="fas fa-home"></i></a></li>
                <li><a href="#NowShowing-btn">Now Showing</a></li>
                <li><a href="#comingsoon-section">Coming Soon</a></li>
                <li><a href="my_bookings.php">My Bookings</a></li>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#social-links">Contact Us</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <?php 
            session_start(); 
            if (isset($_SESSION['privilleged'])): ?>
                <!-- If the user is logged in -->
                <a href="logout.php" id="login-out" class="btn logout"  style="border:none; position:absolute; width:10%;">Logout</a>
            <?php else: ?>
                <!-- If the user is not logged in -->
                <a href="login.php" id="login-out" class="btn login" style="border:none; position:absolute; width:10%;">Login / Sign up</a>
            <?php endif; ?>
        </div>
        <div class="hamburger-menu" onclick="togglemenu()">&#9776;</div> 
    </nav>
</header>

    <!-- Slider Section -->
    <section id="home">
        <div id="slideshow">
            <article class="slide">
                <img src="Assets/img/bg/thor.jpeg" alt="Thor Movie Poster">
                <div class="description">
                    <h2>Thor</h2>
                    <p>Thor, a banished Asgardian prince, learns humility on Earth and reclaims his power to stop his
                        brother Loki's schemes.</p>
                </div>
            </article>
            <article class="slide">
                <img src="Assets/img/bg/batman (1).svg" alt="Batman Movie Poster">
                <div class="description">
                    <h2>Batman</h2>
                    <p>Batman battles crime in Gotham City while facing the Joker, a maniacal villain spreading chaos.
                    </p>
                </div>
            </article>
            <article class="slide">
                <img src="Assets/img/bg/joker.jpeg" alt="Joker Movie Poster">
                <div class="description">
                    <h2>Joker</h2>
                    <p>Arthur Fleck, a struggling outcast, spirals into madness, becoming the infamous Joker in a gritty
                        Gotham City.</p>
                </div>
            </article>
        </div>
    </section>

    <!-- Buttons container -->
    <div class="buttons">
        <!-- "Now Showing" button -->
        <button id="NowShowing-btn" class="btn active" onclick="showMovies('nowShowingMovies', this)">Now
            Showing</button>
        <!-- "IMAX Movies" button -->
        <button class="btn" onclick="showMovies('imaxMovies', this)">IMAX Movies</button>
    </div>

    <!-- Movie list container -->
    <section class="movie-section">
        <!-- Default "Now Showing" list is displayed -->
        <div id="nowShowingMovies" class="movie-list active">
            <article class="movie-item">
                <img src="Assets/img/movies/the-meg-2-the-trench.webp" alt="The Meg 2 Poster">
                <a href="book_now.php?name=The Meg 2" class="book-now-btn">Book Now</a>
                <h4>The Meg 2</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/spider-man-homecoming.webp" alt="Spiderman Homecoming Poster">
                <a href="book_now.php?name=Spiderman Home Coming" class="book-now-btn">Book Now</a>
                <h4>Spiderman Home Coming</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/shutter-island.webp" alt="Shutter Island Poster">
                <a href="book_now.php?name=Shutter Island" class="book-now-btn">Book Now</a>
                <h4>Shutter Island</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/no-time-to-die.webp" alt="No Time To Die Poster">
                <a href="book_now.php?name=No Time to Die" class="book-now-btn">Book Now</a>
                <h4>No Time To Die</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/prey (1).svg" alt="Prey Movie Poster">
                <a href="book_now.php?name=Prey" class="book-now-btn">Book Now</a>
                <h4>Prey</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/resident (1).svg" alt="Rebecca Movie Poster">
                <a href="book_now.php?name=Resident" class="book-now-btn">Book Now</a>
                <h4>Resident</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/joker (1).svg" alt="Joker Movie Poster">
                <a href="book_now.php?name=Joker" class="book-now-btn">Book Now</a>
                <h4>Joker</h4>
            </article>
        </div>
        <div id="imaxMovies" class="movie-list">
            <article class="movie-item">
                <img src="Assets/img/movies/extraction (1).svg" alt="Extraction Movie Poster">
                <a href="book_now.php?name=Extraction" class="book-now-btn">Book Now</a>
                <h4>Extraction</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/godfather (1).svg" alt="Godfather Movie Poster">
                <a href="book_now.php?name=Godfather" class="book-now-btn">Book Now</a>
                <h4>Godfather</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/godzilla-x-kong-the-new-empire.webp"
                    alt="Godzilla vs Kong: The New Empire Poster">
                    <a href="book_now.php?name=Godzilla vs Kong: The New Empire" class="book-now-btn">Book Now</a>
                    <h4>Godzilla-The New Empire</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/movies/american-psycho.webp" alt="American Psycho Poster">
                <a href="book_now.php?name=American Psycho" class="book-now-btn">Book Now</a>
                <h4>American Psycho</h4>
            </article>
        </div>
    </section>
    <hr class="section-divider">
    <section class="comingsoon-section" id="comingsoon-section">
        <h3>Coming Soon</h3>
        <div id="comingsoon" class="coming-soon">
            <article class="movie-item">
                <img src="Assets/img/upcoming/Smile.jpg" alt="Smile">
                <button class="movie-details-btn">See details!</button>
                <h4>Smile</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/upcoming/The Legend of Johnny Jones.jpg" alt="The Legend of Johnny Jones">
                <button class="movie-details-btn">See details!</button>
                <h4>The Legend of Johnny Jones</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/upcoming/Take-Cover-2024.png" alt="Take Cover">
                <button class="movie-details-btn">See details!</button>
                <h4>Take Cover</h4>
            </article>
            <article class="movie-item">
                <img src="Assets/img/upcoming/The-Lord-of-the-Rings-The-Rings-of-Power-2024-16262-25391.jpg"
                    alt="The Lord of the Rings - The Rings of Power">
                <button class="movie-details-btn">See details!</button>
                <h4>The Lord of the Rings - The Rings of Power</h4>
            </article>
        </div>
    </section>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#NowShowing-btn">Now Showing</a></li>
                    <li><a href="#comingsoon-section">Coming Soon</a></li>
                    <li><a href="my_bookings.php">My Bookings</a></li>
                    <li><a href="#about-us">About Us</a></li>
                    <li><a href="#social-links">Contact Us</a></li>
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

    <script src="script.js"></script>
</body>

</html>