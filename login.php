<?php

// Establish a connection to your MySQL database
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "webapp"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

<<<<<<< HEAD
/* Function to generate a random 12-digit number for account number*/
=======
// Function to generate a random 12-digit number for account number
>>>>>>> ce4ad85f193e09e34ca19083e9e4bafebbedd2a3
function generateRandomNumber() {
    return mt_rand(100000000000, 999999999999);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $idNumber = Intval($_POST['idNumber']);
    $mobile = intval($_POST['mobile']);
    $password = $_POST['password'];

    // Generate a random 12-digit number for the account
    $accountNumber = generateRandomNumber();

    // Insert data into the database
    $sql = "INSERT INTO users (full_name, email, id_number, mobile, password, account_number)
            VALUES ('$fullName', '$email', '$idNumber', '$mobile', '$password', '$accountNumber')";

    if ($conn->query($sql) === TRUE) {
        // Account created successfully

        $message = "Account created successfully. Your account number is: $accountNumber <br>
                    Return to log in <br>
                    <a href='index.html'>Login</a>";

        echo "<div style='margin-left:30%'>".$message."</div>";
 
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}

// Close the database connection
$conn->close();



