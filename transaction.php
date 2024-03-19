<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.html");
    exit;
}

// Retrieve submitted amount
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];

// Generate random transaction ID
$transaction_id = generateRandomString(8); // Adjust the length as needed

// Function to generate random string
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

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

// Prepare SQL statement to insert data into database
$email = $_SESSION['email']; // Assuming email is used as a unique identifier
$sql = "INSERT INTO transactions (transaction_id, amount, email, payment_method) VALUES ('$transaction_id', '$amount', '$email', '$payment_method')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Amount added successfully. Transaction ID: $transaction_id";
    header("Location: homepage.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

