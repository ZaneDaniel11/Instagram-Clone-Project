<?php
include('connection.php');
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check user credentials
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Valid credentials, set session variable
        $_SESSION['user'] = $username;
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    // Redirect or handle invalid access
    echo 'Invalid access';
}
?>
