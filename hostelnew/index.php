<?php
session_start();

// Handle logout
if (isset($_GET['logout'])) {
    session_unset(); // Remove all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to homepage after logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>College Hostel</title>
    <link rel="stylesheet" href="styles.css"> <!-- External CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">HostelLife</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <!-- Dropdown for Hostel -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Hostel Name ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="boys-hostel.php">Boys Hostel</a></li>
                        <li><a href="girls-hostel.php">Girls Hostel</a></li>
                    </ul>
                </li>
                <li><a href="#facilities">Facilities</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <!-- Logout Button (Visible if the user is logged in) -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="?logout=true" class="logout-btn">Logout</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home" class="full-screen" style="background-color: #1a1a2e; color: white;">
        <div class="content">
            <h1 class="welcome-title">Welcome to HostelLife</h1>
            <p>Our hostel offers a comfortable, safe, and convenient living space for students. Whether you’re living here for a year or a semester, we ensure that you will have a comfortable and enjoyable stay.</p>
            <p>We offer fully furnished rooms, 24/7 security, recreational areas, and all the amenities you need to make your hostel experience the best it can be.</p>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="full-screen" style="background-color: #f3f3f3; color: #1a1a2e;">
        <div class="content">
            <h2>Our Hostel Facilities</h2>
            <p>We provide a wide range of facilities to ensure a comfortable and safe living environment for all our residents. Here are some of the key features:</p>
            <ul>
                <li>🛏️ **Fully Furnished Rooms**: Equipped with beds, study tables, chairs, and wardrobes.</li>
                <li>🔒 **24/7 Security**: The hostel has round-the-clock security personnel and surveillance cameras.</li>
                <li>🍽️ **Mess Facility**: Nutritious and delicious meals are provided to all students in the hostel mess.</li>
                <li>🧺 **Laundry Services**: Laundry services are available for the convenience of students.</li>
                <li>💻 **High-Speed Internet**: Fast and reliable internet access throughout the hostel premises.</li>
                <li>🏋️‍♂️ **Gym & Recreation**: A well-equipped gym and recreational facilities for relaxation and fitness.</li>
                <li>🏥 **Medical Assistance**: On-call medical staff and first aid facilities for emergencies.</li>
            </ul>
            <p>Our hostel is designed to meet all the needs of students, providing a perfect blend of comfort, safety, and convenience.</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="full-screen" style="background-color: #1a1a2e; color: white;">
        <div class="content">
            <h2>Hostel Gallery</h2>
            <p>Take a visual tour of our hostel! Here are some images of our rooms, facilities, and the overall environment:</p>
            <div class="gallery-images">
                <img src="3h.jpg" alt="Room" class="gallery-img">
                <img src="4h.jpg" alt="Lobby" class="gallery-img">
                <img src="m2.jpg" alt="Mess Hall" class="gallery-img">
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="full-screen" style="background-color: #f3f3f3; color: #1a1a2e;">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Feel free to get in touch with us for any inquiries, suggestions, or concerns. We are here to help!</p>
            <div>
                <p>📍 **Address**: ABC College Hostel, Main Campus Road, City Name</p>
                <p>📞 **Phone**: +91-9876543210</p>
                <p>📧 **Email**: hostel@college.edu</p>
                <p>🌍 **Website**: [www.hostellife.com](#)</p>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer style="background-color: #1a1a2e; color: white; padding: 20px 0;">
        <div class="footer-content">
            <p>&copy; 2025 HostelLife. All Rights Reserved.</p>
            <p>Follow us on social media: 
                <a href="#" target="_blank">Facebook</a> | 
                <a href="#" target="_blank">Instagram</a> | 
                <a href="#" target="_blank">Twitter</a>
            </p>
            <p>Our hostel is here to provide you with a safe and homely environment. For further details, visit us at ABC Campus or reach out via phone/email.</p>
            <p>Designed and Developed by the HostelLife Team</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
