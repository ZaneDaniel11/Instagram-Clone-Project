<?php
session_start();
// Check username/email and password
$username = $_POST['username'];
$password = $_POST['password'];

// Validate credentials (e.g., check against database)
if ($username === 'example' && $password === 'password') {
    $_SESSION['user'] = $username; // Set session variable
    echo 'success';
} else {
    echo 'error';
}
?>
