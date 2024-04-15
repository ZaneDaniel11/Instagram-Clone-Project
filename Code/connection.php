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
?>
