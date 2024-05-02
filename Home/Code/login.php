<?php
session_start();
include('connection.php');

if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users_tb WHERE username='$username' AND password = '$password' LIMIT 1";

    $login_query_run = mysqli_query($conn, $login_query);



    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_array($login_query_run);

        $user_id = $userdata['user_id'];
        $username = $userdata['name'];

        $_SESSION['auth_user_id'] = $user_id;
        $_SESSION['authuser_name'] = $username;

        $_SESSION['status'] = "Login Successfully";
        header('Location: ../Home.php');
        exit();
    } else {

        $_SESSION['status'] = "Invalid Email Or Password";
        header('Location:../Home/login2.php');
        exit();
    }
}
