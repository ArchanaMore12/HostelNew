<?php
session_start();

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    include 'connection.php';

    // Query to check if the user exists
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $_SESSION['user_id'] = $result->fetch_assoc()['id']; // Set session variable
        header("Location: index.php"); // Redirect to home page after successful login
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        /* Internal CSS for Login Page */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
            box-sizing: border-box;
        }

        .login-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2f3c48;
            font-weight: 700;
        }

        .login-container input {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }

        .login-container input:focus {
            border-color: #1a73e8;
            outline: none;
            background-color: #ffffff;
        }

        .login-container button {
            width: 100%;
            padding: 14px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        .login-container button:hover {
            background-color: #007bb5;
        }

        .login-container p {
            font-size: 14px;
            color: #555;
            margin-top: 15px;
        }

        .login-container a {
            color: #1a73e8;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        /* Additional back button style */
        .back-button {
            width: 100%;
            padding: 14px;
            background-color: #e0e0e0;
            color: #333;
            border: none;
            border-radius: 8px;
            margin-top: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        .back-button:hover {
            background-color: #b0b0b0;
        }

        /* Ensures everything is perfectly centered */
        .login-container form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to Your Account</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Enter your email" required><br>
            <input type="password" name="password" placeholder="Enter your password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <form action="index.php" method="GET">
            <button type="submit" class="back-button">Back to Home</button>
        </form>
    </div>
</body>
</html>
