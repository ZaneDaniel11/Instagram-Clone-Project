<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "insta_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn) {
    echo 'Conneted Succesfully';
}
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        $_SESSION['user'] = $username;
        echo 'success';
    } else {
        echo 'error';
    }
} else {

    echo 'Invalid access';
}
?>
