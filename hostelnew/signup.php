<?php
session_start();

// Handle signup form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    include 'connection.php';

    $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    if ($conn->query($query) === TRUE) {
        $_SESSION['user_id'] = $conn->insert_id; // Set session variable
        header("Location: login.php"); // Redirect to login page after successful signup
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <style>
        /* Internal CSS for Sign Up Page */
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

        .signup-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
            box-sizing: border-box;
        }

        .signup-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2f3c48;
            font-weight: 700;
        }

        .signup-container input {
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

        .signup-container input:focus {
            border-color: #1a73e8;
            outline: none;
            background-color: #ffffff;
        }

        .signup-container button {
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

        .signup-container button:hover {
            background-color: #007bb5;
        }

        .signup-container p {
            font-size: 14px;
            color: #555;
            margin-top: 15px;
        }

        .signup-container a {
            color: #1a73e8;
            text-decoration: none;
        }

        .signup-container a:hover {
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
        .signup-container form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Create Your Account</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Enter your email" required><br>
            <input type="password" name="password" placeholder="Create a password" required><br>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
        <form action="index.php" method="GET">
            <button type="submit" class="back-button">Back to Home</button>
        </form>
    </div>
</body>
</html>
