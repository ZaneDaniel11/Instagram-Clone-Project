<?php
session_start();
include('connection.php');

// Load User
if (isset($_POST['load_user'])) {
    $user_id = $_SESSION['auth_user_id'];
    $user_query = "SELECT *FROM users_tb WHERE user_id != '$user_id'";
    $user_conn = mysqli_query($conn, $user_query);

    $array_result = [];

    if (mysqli_num_rows($user_conn) > 0) {
        foreach ($user_conn as $row) {
            array_push($array_result, ['users' => $row]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_result);
    } else {
        echo 'shit Man';
    }
}

// Function for Follow Btn
if (isset($_POST['follow_btn'])) {
    $user_id = $_SESSION['auth_user_id'];
    $followers_id = mysqli_escape_string($conn, $_POST['userid']);

    $insert_followers_query = "INSERT INTO follow_tb (users_id,followers_id)VALUES('$user_id','$followers_id')";

    $follow_conn_insert = mysqli_query($conn, $insert_followers_query);

    if ($follow_conn_insert) {
        $user_name = $_SESSION['authuser_name'];
        $notif_message = "$user_name Follow you";
        $notif_like = "INSERT INTO notification_tb (user_id,notif)VALUES('$followers_id','$notif_message')";
        $notif_conn = mysqli_query($conn,$notif_like);
    } else {
        echo 'BOLOK';
    }
}
