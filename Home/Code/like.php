<?php
session_start();
include('connection.php');

if(isset($_POST['like_btn'])) {
    $user_id = $_SESSION['auth_user_id'];
    $content_id = mysqli_real_escape_string($conn, $_POST['content_id']);
    $poster_id = mysqli_real_escape_string($conn, $_POST['poster_id']);
    
    $check_like_query = "SELECT * FROM like_tb WHERE content_id='$content_id' AND user_id='$user_id'";
    $check_like_result = mysqli_query($conn, $check_like_query);

    if(mysqli_num_rows($check_like_result) > 0) {
        echo 'You have already liked this content';
    } else {

        $insert_like = "INSERT INTO like_tb(content_owner_id, content_id, user_id, user_like) VALUES ('$poster_id', '$content_id', '$user_id', 1)";
        $like_conn = mysqli_query($conn, $insert_like);
        
        if($like_conn) {
          
            $update_content_like_query = "UPDATE content_tb SET content_like = content_like + 1 WHERE content_id='$content_id'";
            mysqli_query($conn, $update_content_like_query);

   
            $user_name = $_SESSION['authuser_name'];
            $notif_message = "$user_name Liked your Content";
            $notif_like = "INSERT INTO notification_tb (user_id, notif) VALUES ('$poster_id', '$notif_message')";
            mysqli_query($conn, $notif_like);

            echo 'Like added successfully';
        } else {
            echo 'Error inserting like';
        }
    }
}
?>
