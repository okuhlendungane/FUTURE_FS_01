<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "personal_website");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Collect form data
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];

// Insert data into the database using prepared statements for security
$stmt = $conn -> prepare("INSERT INTO  messages (name, email, message) VALUES (?, ?, ?)");
$stmt -> bind_param("sss", $name, $email, $message);


    if ($stmt -> execute()){
        echo "Message send!";
        }
        else {
            echo "ERROR: " . $stmt -> error;
        }


// Close statement
$stmt -> close();

// Close connection
$conn -> close();
?>
