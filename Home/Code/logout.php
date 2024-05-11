<?php
session_start();
// Log out
unset($_SESSION['auth_user_id']);
unset($_SESSION['authuser_name']);

$_SESSION['status'] = "Logout Successfully";

header("Location: ../login.php");
exit();
