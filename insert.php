<!DOCTYPE html>
<html>
<head>
    <title>Database Insert</title>
</head>
<body>
    <?php
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "personal_website");
    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    // Collect form data
    $name=$_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    // Insert data into the database
    $sql = "INSERT INTO messages (name,email, message) VALUES ('$name', $email','$message')";
    if (mysqli_query($conn, $sql)) {
        echo "<h3>Data stored in the database successfully.</h3>";
        echo nl2br("$name\n$email\n $message");
    } else {
        echo "ERROR: Sorry $sql. " . mysqli_error($conn);
    }
    // Close connection
    mysqli_close($conn);
    ?>

</body>
</html>
