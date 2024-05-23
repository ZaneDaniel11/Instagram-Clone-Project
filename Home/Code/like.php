<?php
session_start();
include('connection.php');

if(isset($_POST['like_btn']))
{
    $user_id = $_SESSION['auth_user_id'];
    $content_id = mysqli_escape_string($conn,$_POST['content_id']);
    $content_like = mysqli_escape_string($conn,$_POST['content_like']);
    $poster_id = mysqli_escape_string($conn,$_POST['poster_id']);
    
    $like = $content_like + 1;


    $check_like_query = "SELECT * FROM like_tb WHERE content_id='$content_id' AND user_id='$user_id'";
    $check_like_result = mysqli_query($conn, $check_like_query);

    if(mysqli_num_rows($check_like_result) > 0) {

        $update_like_query = "UPDATE like_tb SET user_like='$like' WHERE content_id='$content_id' AND user_id='$user_id'";
        $update_like_conn = mysqli_query($conn, $update_like_query);
        if($update_like_conn) {
            $user_name = $_SESSION['authuser_name'];
            $notif_message = "$user_name Liked your Content";
            $notif_like = "INSERT INTO notification_tb (user_id,notif)VALUES('$poster_id','$notif_message')";
            $notif_conn = mysqli_query($conn,$notif_like);
        } else {
            echo ' error update';
        }
    } else {
        $insert_like = "INSERT INTO like_tb(content_owner_id,content_id,user_id,user_like) VALUES ('$poster_id','$content_id','$user_id','$like')";
        $like_conn = mysqli_query($conn, $insert_like);
        if($like_conn) {
            echo 'insert';
        } else {
            echo ' error insert';
        }
    }
}
?>
