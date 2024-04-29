<?php
session_start();
include('connection.php');

if (!empty($_POST)) {
    $contentId = mysqli_real_escape_string($conn, $_POST['content_id']);
    $name = mysqli_real_escape_string($conn, $_POST['content']);
    $user_id = $_SESSION['auth_user_id'];

    $sql_query = "UPDATE content_tb SET content='$name' WHERE content_id='$contentId' AND user_id='$user_id'";
    $update_conn = mysqli_query($conn, $sql_query);

    if ($update_conn) {
      echo '<script>location.reload();</script>';
    } else {
        echo 'Error updating content: ' . mysqli_error($conn);
    }
} else {
    echo "No data received.";
}
?>
