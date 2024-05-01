<?php
session_start();
include('connection.php');

if(isset($_POST['load_user']))
{
    $user_id = $_SESSION['auth_user_id'];
    $user_query = "SELECT *FROM users_tb WHERE user_id != '$user_id'";
    $user_conn = mysqli_query($conn,$user_query);

    $array_result = [];

    if (mysqli_num_rows($user_conn) > 0) {
        foreach ($user_conn as $row) {
            array_push($array_result, ['users' => $row]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_result);
    }
    else{
       echo 'shit Man';
    }
    
}

?>