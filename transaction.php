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
<<<<<<< HEAD
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Perform calculations and update balance
        $balance = $row['balance'] + $amount; // Update balance with the new amount
        // Update the user's balance in the database
        $update_sql = "UPDATE users SET balance = $balance WHERE email = '$email'";
        if ($conn->query($update_sql) === TRUE) {
            // Balance updated successfully
        } else {
            echo "Error updating balance: " . $conn->error;
        }
    }
} else {
    echo "0 results";
}

// Insert transaction data into 'transactions' table
$sql = "INSERT INTO transactions (transaction_id, amount, email, payment_method) 
VALUES ('$transaction_id', '$amount', '$email', '$payment_method')";
=======
$sql = "INSERT INTO transactions (transaction_id, amount, email, payment_method) VALUES ('$transaction_id', '$amount', '$email', '$payment_method')";
>>>>>>> ce4ad85f193e09e34ca19083e9e4bafebbedd2a3

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Amount added successfully. Transaction ID: $transaction_id";
<<<<<<< HEAD
    // Redirect to homepage after successful transaction
=======
>>>>>>> ce4ad85f193e09e34ca19083e9e4bafebbedd2a3
    header("Location: homepage.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

<<<<<<< HEAD


=======
>>>>>>> ce4ad85f193e09e34ca19083e9e4bafebbedd2a3
