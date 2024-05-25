<?php
include('connection.php');
session_start();

if (isset($_POST['load-notif'])) {
    $user_id = $_SESSION['auth_user_id'];
    $load_notify = "SELECT *FROM notification_tb WHERE user_id = $user_id";
    $notif_connection = mysqli_query($conn, $load_notify);
    $array_result = [];

    if (mysqli_num_rows($notif_connection) > 0) {
        foreach ($notif_connection  as $row) {

            array_push($array_result, ['notif' => $row]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_result);
    } else {
        echo 'No notification';
    }
}
