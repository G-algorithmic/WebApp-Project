<?php
// Start session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve input values
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to validate user credentials
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // User authenticated, start session and fetch username
    $row = $result->fetch_assoc();
    $username = $row['full_name'];
    // User authenticated, start session and redirect to dashboard or another page
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['full_name'] = $username;
    header("Location: homepage.html"); // Redirect to dashboard page
} else {
    // Invalid credentials, redirect back to login page with error message
    $_SESSION['login_error'] = "Invalid email or password";
    header("Location: homepage.html"); // Redirect to login page
}

// Close connection
$conn->close();

