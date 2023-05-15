<?php 
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "loginadminuser1";
    $conn = mysqli_connect("localhost", "root", "","loginadminuser1");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>