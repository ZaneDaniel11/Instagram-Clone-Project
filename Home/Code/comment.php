<?php
session_start();
include('connection.php');
// Comment submit

if (isset($_POST['comment_submit'])) {
    $content_id = mysqli_real_escape_string($conn, $_POST['content_id']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $user = $_SESSION['auth_user_id'];

    $insert_comment_sql = "INSERT INTO comment_tb (content_id,user_id,comment)VALUES('$content_id','$user','$comment')";

    $connection = mysqli_query($conn, $insert_comment_sql);

    if ($connection) {
        $user_name = $_SESSION['authuser_name'];
        $notif_message = "$user_name Comment on your Content";
        $notif_like = "INSERT INTO notification_tb (user_id,notif)VALUES('$followers_id','$notif_message')";
        $notif_conn = mysqli_query($conn,$notif_like);
    } else {
        echo 'shit';
    }
}

// Shoow Comment
if (isset($_POST['show_comment_btn'])) {
    $comment = mysqli_real_escape_string($conn, $_POST['show_comment']);

    $show_comment_query = "SELECT *FROM comment_tb WHERE content_id = '$comment' ";

    $connection = mysqli_query($conn, $show_comment_query);

    $array_comment_result = [];

    if (mysqli_num_rows($connection) > 0) {
        foreach ($connection as $row) {
            $user = $row['user_id'];
            $view_reply = "SELECT *FROM users_tb WHERE user_id = '$user' LIMIT 1";

            $view_user = mysqli_query($conn, $view_reply);

            array_push($array_comment_result, ['comments' => $row, 'user' => $view_user]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_comment_result);
    }
}


// Delete Comment
if (isset($_POST['delete_comment'])) {
    $delete_comment = mysqli_real_escape_string($conn, $_POST['delete_comment_id']);

    $delete_comment_sql = "DELETE FROM comment_tb WHERE comment_id = '$delete_comment' ";

    $delete_connection = mysqli_query($conn, $delete_comment_sql);

    if ($delete_connection) {
        echo 'Shesh';
    } else {
        echo 'Nigga';
    }
}

// Edit Comment
if (isset($_POST['edit_comment_submit'])) {
    $comment_id = mysqli_real_escape_string($conn, $_POST['comment_id']);
    $comment =  mysqli_real_escape_string($conn, $_POST['edited_comment']);

    $sql = "UPDATE comment_tb SET comment = '$comment' WHERE comment_id = '$comment_id' ";

    $conn = mysqli_query($conn, $sql);

    if ($conn) {
        echo 'Shit';
    }
}
