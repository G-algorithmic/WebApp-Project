<?php

$servername = "localhost";
$username = "root";
$password = "!InaccurateAngel15";
$database = "webapp";

$conn =  new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){


    $account_number = mt_rand(100000000000, 999999999999);
    
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $passport = $_POST['passportNo'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    //verify email
    $verify_query = mysqli_query($conn, "SELECT email from users WHERE email = '$email'" );

    if(mysqli_num_rows($verify_query) !=0){
        echo "<div class='message'>
        <p> This email already exists!</p></div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button>";

}
else{
    mysqli_query ($conn,"INSERT INTO users(fullName, email, passportNo, mobile, password, account_number)
     VALUES('$fullName','$email','$passport','$mobile','$password','$account_number')") or die("Error occured"); 

    echo "<div class='message'>
    <p>Registration successful!</p></div> <br>";
    echo "<a href='index.html'><button class='btn'>Login</button>";
}
}





