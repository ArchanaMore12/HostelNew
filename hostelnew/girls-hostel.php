<?php
session_start();

// Check if the user is logged in. If not, redirect to login page.
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_to'] = 'boys-hostel.php'; // Save the target page URL
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Boys Hostel</title>
    <style>
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

/* Navbar Styling */
.navbar {
    background-color: #1a1a2e;
    padding: 25px 0;
    position: sticky;
    top: 0;
    z-index: 999;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.navbar .container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 40px;
}

.logo {
    color: #ffffff;
    font-size: 30px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Nav Links */
.nav-links {
    list-style: none;
    display: flex;
    gap: 35px;
    margin: 0;
    padding: 0;
}

.nav-links li {
    position: relative;
}

.nav-links li a {
    color: #ffffff;
    text-decoration: none;
    font-weight: 500;
    font-size: 18px;
    padding: 10px 14px;
    border-radius: 6px;
    transition: background-color 0.3s ease;
    display: block;
}

.nav-links li a:hover {
    background-color: #e94560;
}

/* Section Styling */
section {
    padding: 60px 20px;
    text-align: center;
    margin-bottom: 60px;
}

section h1, section h2 {
    font-size: 36px;
    color: #1a1a2e;
    margin-bottom: 20px;
}

section p {
    font-size: 18px;
    line-height: 1.8;
}

/* Welcome Section */
#welcome {
    background-image: url('images/boys-hostel.jpg');
    background-size: cover;
    background-position: center;
    color: black;
    padding: 80px 20px;
    text-align: center;
    height: 400px;
}

#welcome h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

/* Room Info Section */
#info {
    background-color: #f3f3f3;
}

.room-info {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
    flex-wrap: wrap;
}

.room-info div {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 30%;
    margin: 10px;
}

.room-info img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Fee Structure Section */
#fees {
    background-color: rgb(97, 107, 165);
    color: white;
}

.fees-table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    margin-top: 20px;
}

.fees-table th, .fees-table td {
    padding: 15px;
    text-align: center;
}

.fees-table th {
    background-color: #1a1a2e;
}

/* Mess Section */
#mess {
    background-color: #f9f9f9;
    padding: 60px 20px;
}

.mess-info {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.mess-day {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    gap: 20px;
    flex-wrap: wrap;
}

.mess-day img {
    width: 200px;
    height: auto;
    border-radius: 10px;
    flex-shrink: 0;
}

.mess-day-content {
    flex: 1;
    text-align: left;
}

.mess-day-content h3 {
    margin-top: 0;
    font-size: 24px;
    margin-bottom: 10px;
    color: #1a1a2e;
}

.mess-day-content ul {
    list-style-type: disc;
    padding-left: 20px;
    margin: 0;
}

.mess-day-content li {
    margin-bottom: 8px;
    font-size: 16px;
    color: #333;
}

/* Day-specific Background Colors */
.monday    { background-color: #fdebd0; }
.tuesday   { background-color: #d6eaf8; }
.wednesday { background-color: #d5f5e3; }
.thursday  { background-color: #f9e79f; }
.friday    { background-color: #f5b7b1; }
.saturday  { background-color: #e8daef; }
.sunday    { background-color: #aed6f1; }

/* Hostel Timings Section */
#timings {
    background-color: #ffffff;
    padding: 60px 20px;
}

/* Facilities Section */
#facilities {
    background-color: rgb(97, 107, 165);
    color: white;
    padding: 60px 20px;
}

.facility-list {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.facility-list div {
    background-color: #1a1a2e;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 25%;
    margin: 10px;
}

.facility-list img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Footer Section */
footer {
    background-color: #1a1a2e;
    color: white;
    padding: 20px 0;
    text-align: center;
}

footer a {
    color: #e94560;
    text-decoration: none;
    margin: 0 5px;
}

footer a:hover {
    text-decoration: underline;
}

/* Global Image Styling (if needed elsewhere) */
img {
    width: 30%;
    height: auto;
    margin-bottom: 20px;
}
</style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">HostelLife</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="boys-hostel.php">Boys Hostel</a></li>
                <li><a href="girls-hostel.php">Girls Hostel</a></li>
                <li><a href="#fees">Fees</a></li>
                <li><a href="#mess">Mess</a></li>
                <li><a href="#facilities">Facilities</a></li>
                <li><a href="#timings">Timings</a></li>
            </ul>
        </div>
    </nav>

    <!-- Welcome Section -->
    <section id="welcome">
        <div>
            <h1>Welcome to the Girls Hostel</h1>
            <p>We provide safe, comfortable, and affordable accommodation for Girls at our hostel.</p>
            <img src="5h.jpg" alt="hostel">
        </div>
    </section>

    <!-- Available Rooms Section -->
    <section id="info">
        <h2>Available Rooms</h2>
        <p>Our Girl Hostel has a variety of rooms available for students. Below are the details:</p>
        <div class="room-info">
            <div>
                <img src="hostel.png" alt="Room Image">
                <h3>Total Rooms</h3>
                <p>50 Rooms</p>
            </div>
            <div>
                <img src="download.jpg" alt="Room Image">
                <h3>Total Students</h3>
                <p>400 Students</p>
            </div>
            <div>
                <img src="download.jpg" alt="Room Image">
                <h3>Students per Room</h3>
                <p>8 Students per room</p>
            </div>
        </div>
    </section>

    <!-- Fee Structure Section -->
    <section id="fees">
        <h2>Fee Structure</h2>
        <table class="fees-table">
            <thead>
                <tr>
                    <th>Fee Category</th>
                    <th>Amount (INR)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Room Rent (Per Month)</td>
                    <td>₹3000</td>
                </tr>
                <tr>
                    <td>Mess Fee (Per Month)</td>
                    <td>₹2000</td>
                </tr>
                <tr>
                    <td>Security Deposit</td>
                    <td>₹5000</td>
                </tr>
                <tr>
                    <td>Other Charges</td>
                    <td>₹500</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Mess Section -->
    <section id="mess">
        <h2>Mess Menu</h2>
        <div class="mess-info">
            <div class="mess-day monday">
                <h3>Monday</h3>
                <img src="monday.jpg" alt="Monday Mess">
                <ul>
                    <li>Breakfast: Poha, Tea</li>
                    <li>Lunch: Daal Tadka, Rice</li>
                    <li>Dinner: Chapati, Sabzi</li>
                </ul>
            </div>
            <div class="mess-day tuesday">
                <h3>Tuesday</h3>
                <img src="tuesday.jpg" alt="Tuesday Mess">
                <ul>
                    <li>Breakfast: Sandwich, Juice</li>
                    <li>Lunch: Pulao, Raita</li>
                    <li>Dinner: Chapati, Aloo Gobi</li>
                </ul>
            </div>
            <div class="mess-day wednesday">
                <h3>Wednesday</h3>
                <img src="wednesday.jpg" alt="Wednesday Mess">
                <ul>
                    <li>Breakfast: Dosa, Chutney</li>
                    <li>Lunch: Khichdi, Curd</li>
                    <li>Dinner: Rice, Mixed Veg</li>
                </ul>
            </div>
            <div class="mess-day thursday">
                <h3>Thursday</h3>
                <img src="thursday.jpg" alt="Thursday Mess">
                <ul>
                    <li>Breakfast: Paratha, Curd</li>
                    <li>Lunch: Rajma, Rice</li>
                    <li>Dinner: Chapati, Daal Tadka</li>
                </ul>
            </div>
            <div class="mess-day friday">
                <h3>Friday</h3>
                <img src="friday.jpg" alt="Friday Mess">
                <ul>
                    <li>Breakfast: Poha, Tea</li>
                    <li>Lunch: Biryani, Salad</li>
                    <li>Dinner: Vegetable Pulao, Chapati</li>
                </ul>
            </div>
            <div class="mess-day saturday">
                <h3>Saturday</h3>
                <img src="saturday.jpg" alt="Saturday Mess">
                <ul>
                    <li>Breakfast: Upma, Tea</li>
                    <li>Lunch: Chole, Rice</li>
                    <li>Dinner: Chapati, Aloo Matar</li>
                </ul>
            </div>
            <div class="mess-day sunday">
                <h3>Sunday</h3>
                <img src="sunday.jpg" alt="Sunday Mess">
                <ul>
                    <li>Breakfast: Omelette, Bread</li>
                    <li>Lunch: Paneer, Roti</li>
                    <li>Dinner: Chapati, Methi Thepla</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Hostel Timings Section -->
    <section id="timings">
        <h2>Hostel Timings</h2>
        <ul>
            <li>In-Time: 10:00 AM</li>
            <li>Check-out Time: 7:00 PM</li>
            <li>Quiet Hours: 10:00 PM to 7:00 AM</li>
        </ul>
    </section>

    <!-- Facilities Section -->
    <section id="facilities">
        <h2>Facilities Provided</h2>
        <div class="facility-list">
            <div>
                <h3>Wi-Fi</h3>
                <p>24/7 free high-speed Wi-Fi access in all areas.</p>
            </div>
            <div>
                <h3>Pure Drinking Water</h3>
                <p>Access to filtered drinking water throughout the hostel.</p>
            </div>
            <div>
                <h3>Hot Water</h3>
                <p>Hot water supply available from 6:00 AM to 9:00 AM.</p>
            </div>
            <div>
                <h3>Cleaning</h3>
                <p>Regular cleaning services for the rooms and common areas.</p>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 HostelLife | All Rights Reserved</p>
        <p><a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms & Conditions</a></p>
    </footer>

</body>
</html>
